title: The Stack View is a Liar
date: 2020-03-16 23:36:27
slug: the-stack-view-is-a-liar
categories: Xcode,Programming,macOS Development
og_description: Today I lost about four hours debugging what I thought was a bizarre bug due to my own ignorance. Here's the story.
og_image: /wp-content/uploads/2020/03/threethings-view-debug-scaled.jpeg
og_image_alt: Xcode visual debugger showing the bug and my out of control view hierarchy.
---
...Firing up Xcode’s wonderful view debugger, however, completely blew my mind and shattered any remaining self-confidence I had as an app developer. And then nearly an hour later I’m really questioning everything I thought I knew about ones and zeroes until a google search leads me to this page. And, sure enough, my bug is spelled out right there.
---
Today I lost about four hours debugging what I thought was a bizarre bug due to my own ignorance. Now, I don’t want to be too hard on myself  - no one can be an expert in every nook and cranny of a tech stack as large as AppKit. But, still, this one <em>really</em> knocked me on my butt when I realized my mistake.

Tonight I tweeted <a href="https://twitter.com/tylerhall/status/1239734350532546565">this</a>...

> In today's exciting episode of Tyler is a Professional Software Developer™...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/stackview-commit.jpg" width="1344" height="216" />

The bug I was running into happened when I dragged an <code>NSTextField</code> out of an <code>NSStackView</code> and dropped it elsewhere in the window. In the gif below you’ll see that after the drop completes, the <code>NSTextField</code> lingers behind - continuing to duplicate each time I drag  and drop it.

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/stackview-drag1.2020-03-16-22_14_06.gif" width="450" height="373" />

Note: Only the <em>original</em> <code>NSTextField</code> is draggable. The copies left behind don’t accept mouse events.

So, I start debugging this. My first thought is there’s some sort of race condition happening because when I drop the <code>NSTextField</code>, the change persists to my Core Data stack - which does the usual <code>NSManagedObjectContext</code> merge dance and then posts a notification letting the other views in the window know there’s new data and they should refresh. (I don’t know if that’s the proper way to do it, but it’s how I approached it in this situation.)

That notification → refresh isn’t necessarily anything crazy or complex, but once the change finishes persisting to Core Data, my CloudKit code picks up the new data and pushes it up to the customer’s iCloud account. I don’t just do a push to CloudKit, though. The data model for this app is very, very tiny. So, I’m saving myself some added complexity and just doing an actual two-way sync each time. And, of course, when the sync completes - 💥 - my views are told to reload any additional changes from the sync session.

I’ve messed up code like this plenty of times before and I’m hoping my first instinct is correct and I’m somehow maybe adding an extra copy of the <code>NSTextField</code> twice to the <code>NSStackView</code>?

Here’s the pertinent code. It removes any existing tasks from the <code>NStackView</code> and then loops through the new data adding a view for each item back into the stack view.

<pre><code>        monthDayView.clearTasks()
        for t in tasks {
            let taskView = t.taskView()
            monthDayView.stackView.addArrangedSubview(taskView)
        }
</code></pre>

Heres’ the implementation for <code>clearTasks()</code> above:

<pre><code>    func clearTasks() {
        for view in stackView.arrangedSubviews {
            stackView.removeArrangedSubview(view)
        }
    }
</code></pre>

<em>(For the seasoned <code>NSStackView</code> readers out there who can already see the bug in my code, please hold your laughter while I explain the next frustrating hour of my evening in excruciating detail...)</em>

Seems safe enough, right? But still, my eyes don’t lie. There’s clearly a duplicate <code>NSTextField</code> hanging around. Let’s dig deeper.

I start with the app in this state:

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/stackview-bug-count.png" width="2240" height="1844" />

I add this debugging code to confirm if the stack views really do or do not have the number of arranged views I’m expecting:

<pre><code>print(monthDayView.stackView.arrangedSubviews.count)
</code></pre>

In the screenshot above, March 18 is the “real” item, and the other three are the weird zombie copies. For each of those views, the above debugging code gives me these results:

<ul>
<li>March, 18: <code>1 views</code> <em>OK!</em></li>
<li>March, 10: <code>0 views</code> <em>wtf?</em></li>
<li>March, 16: <code>0 views</code> 💩</li>
<li>March, 24: <code>0 views</code> 🥃</li>
</ul>

Um? That seems...wrong? Those extra views are clearly still there.

Firing up Xcode’s wonderful view debugger, however, completely blew my mind and shattered any remaining self-confidence I had as an app developer...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/threethings-view-debug-scaled.jpeg" width="2560" height="1880" />

There's not just <em>one</em> extra <code>NSTextField</code> hanging about. There. Are. <em>Thirty</em>. Of them.

Clearly at this point I am missing something incredibly obvious and foundational about the situation and frameworks in order for my (I think) relatively simple code to be breaking this badly. Let’s start from first principles and re-read the documentation.

Relatively speaking, <code>NSStackView</code>  is a newish part of AppKit. It’s only been around since Mac OS X (<em>not</em> macOS) 10.9 Mavericks. Regardless, in the seven years since then, I haven’t ever really used it <em>that</em> often. I know it’s there and a nice tool to have available, but I’m just not super familiar with it. And as you’ll soon see, even less so than I thought.

I’m reading through Apple’s documentation in Xcode and I finally stumble upon <code>removeArrangedSubview(_:)</code>...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/stackview-docs.png" width="2356" height="1406" />

I think <em>that’s strange for a seven year old API, but ok</em> and keep browsing.

Nearly an hour later I’m really questioning everything I thought I knew about ones and zeroes until a google search leads me to <a href="https://www.hackingwithswift.com/read/31/4/removing-views-from-a-uistackview-with-removearrangedsubview">this page</a>. And, sure enough, my bug is spelled out right there:

> However, using <code>removeArrangedSubview()</code> <strong>doesn’t</strong> remove the view altogether – it keeps the view in memory, which is helpful if you plan to re-add it later on because you can avoid recreating it. Here, though, we actually want to remove the web view and destroy it entirely, and that can be done with a call to <code>removeFromSuperview()</code> instead.

Holleeee crap. I never knew stack views worked that way. (Thanks, <a href="https://twitter.com/twostraws">Paul</a>!) I mean, wow. That is a very basic misunderstanding on my part. So, I add one additional line of code:

<pre><code>    func clearTasks() {
        for view in stackView.arrangedSubviews {
            stackView.removeArrangedSubview(view)
            view.removeFromSuperview()
        }
    }
</code></pre>

and 💥 it works. Not only does it work, but it also fixes a number of other peripheral bugs that I had logged but not investigated yet.

Anyway, I hope this excessively long post has enough keywords stuffed into it so that anyone else facing the same problem can find it.

But, last point. Why didn’t Apple’s documentation mention this very important detail? More so, why isn’t that method documented <em>at all</em>?

Ha, well. Turns out, they <em>did</em> document it. My empty screenshot above is from Xcode’s documentation browser. However, if you go to <a href="https://developer.apple.com/documentation/appkit/nsstackview/1488925-removearrangedsubview">the same documentation on the developer website</a> you’ll see...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/stackview-web-docs.png" width="2504" height="2138" />

Well played, Apple.