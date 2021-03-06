title: DefaultApp
date: 2020-03-14 10:41:09
slug: default-app-for-mac-ios
categories: Xcode,Indie Business,Open Source,iOS Development,macOS Development
og_description: DefaultApp is an open source starting point – a template - that I use quickly spin up new macOS projects.
og_image: /wp-content/uploads/2020/03/defaultapp-prefs-about.png
og_image_alt: Screenshot of DefaultApp
---
DefaultApp is an open source starting point – a template. I maintained it in Objective-C for over a decade before finally porting it to Swift in 2018. Anytime I start a new app – big or small, whether or not it’s something I plan on releasing publicly or if it’s just a small prototype or utility app I’m building for myself – I start with this project.

With DefaultApp I can go from initial idea to writing actual code in thirty seconds.

That said, I would't use this as the basis for a billion dollar corporation’s enterprise app. Or with a team of “100 engineers” “solving hard problems”. But if you’re a one-person development shop or a team of just two or three engineers building a typical macOS shoebox or document based app? Please take a look.
---
So, I made a new app. Sort of. It's called <a href="https://github.com/tylerhall/DefaultApp"><em>DefaultApp</em></a>, and here it is...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/defaultapp-mwc.png" width="1700" height="1322" />

Very minimalist, right? Here's a screenshot of the Preferences and About windows...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/defaultapp-prefs-about.png" width="2275" height="1334" />

And that's the whole app. It's not something you can actually use or do anything with. Instead, it's an app you can build something new <em>with</em>.

<a href="https://github.com/tylerhall/DefaultApp"><em>DefaultApp</em> is an open source starting point</a> - a template. I maintained it in Objective-C for over a decade before finally porting it to Swift in 2018. Anytime I start a new app - big or small, whether or not it's something I plan on releasing publicly or if it's just a small prototype or utility app I'm building for myself - I start with this project.

I very much build software in fits and spurts while running off the adrenaline of a new idea. And if I just want to quickly try out an idea, the time from <code>Xcode → New Project</code> to getting all my usual settings and dependencies in place to where I can actually <em>start</em> working on whatever I have in mind is thirty minutes full of friction, busy work, and me cursing myself every time I screw up some dumb little configuration detail. And when my brain is running at a thousand miles per hour thinking about the possibilities of what I want to build, that half hour of just getting to the point where I can get started is excruciating and a motivation killer.

But with <em>DefaultApp</em> I can go from initial idea to writing actual code in thirty <em>seconds</em>.

Every major web framework has a <a href="https://create-react-app.dev">project</a> <a href="https://guides.rubyonrails.org/getting_started.html#creating-the-blog-application">like</a> <a href="https://expressjs.com/en/starter/generator.html">this</a> already. This is nothing new. <em>DefaultApp</em> is basically a glorified "Hello World" project but with my own highly-opinionated choices and foundational level code snippets included to help get things moving quickly.

You can read the details of the project in the <a href="https://github.com/tylerhall/DefaultApp/blob/master/README.md">README</a>, but here's the <a href="https://www.urbandictionary.com/define.php?term=TLDR">tl;dr</a> of what's included:

<ul>
<li>It builds a native macOS app targeting 10.14 Mojave and 10.15 Catalina.</li>
<li>A hardened-runtime target ready for Notarization and designed to be distributed directly to your customers.</li>
<li>A second, duplicate target that is Sandboxed and ready for distribution via the Mac App Store.</li>
<li>Conditional build flags that let you differentiate between debug and production builds as well as Mac App Store and direct to consumer builds.</li>
<li>It also builds an iOS companion app target for iOS 13 with shared code between the two platforms.</li>
<li>Default <code>NSWindowController</code>s for a primary app window and Preferences window are wired up and ready to go. They're also built using <code>xib</code>s because storyboards on macOS are dumb.</li>
<li>The app is <a href="https://en.wikipedia.org/wiki/AppleScript"><code>AppleScript</code></a> enabled by default and includes a sample <a href="https://developer.apple.com/library/archive/documentation/LanguagesUtilities/Conceptual/MacAutomationScriptingGuide/AboutScriptingTerminology.html"><code>.sdef</code></a> scripting dictionary because you can pry <code>AppleScript</code> support out of my cold, dead hands.</li>
<li>Two <a href="https://github.com/tylerhall/DefaultApp/blob/master/macOS/Models/Outlines/OutlineItem.swift">helper</a> <a href="https://github.com/tylerhall/DefaultApp/blob/master/macOS/Models/Outlines/RootItem.swift">classes</a> that make building a typical <a href="https://developer.apple.com/documentation/appkit/cocoa_bindings/navigating_hierarchical_data_using_outline_and_split_views?language=objc">macOS source list</a> easy.</li>
<li>A few <a href="https://github.com/tylerhall/DefaultApp/tree/master/macOS/UI">common controls and <code>NSView</code> subclasses</a> that I find myself using in nearly every project.</li>
<li>Sane Xcode defaults for settings such as <a href="https://developer.apple.com/documentation/bundleresources/information_property_list/nsapptransportsecurity?language=objc">enabling insecure HTTP requests in web views</a> but not in the rest of the app and also making the project compatible with <a href="https://developer.apple.com/library/archive/qa/qa1827/_index.html"><code>agvtool</code></a>. Little things such as those that are helpful but nearly impossible to google unless you know what you don't know.</li>
<li>Pre-configured to <a href="https://sparkle-project.org">check for app updates with Sparkle</a>. (And in the Mac App Store target, Sparkle is completely removed to appease the App Review gods.)</li>
<li>A fair amount of other miscellaneous code and helper <code>extension</code>s that always come up and no one wants to write from scratch each time.</li>
<li>Pre-written <a href="https://github.com/tylerhall/DefaultApp/blob/master/Podfile"><code>Podfile</code></a> and <a href="https://github.com/tylerhall/DefaultApp/blob/master/Cartfile"><code>Cartfile</code></a>s that include the usual open source libraries I include in all of my projects. (I would have migrated to the Swift Package Manager instead, but not everything is available through it yet.)</li>
</ul>

As I said above, the default settings and choices made in this project are my own <em>highly opinionated</em> way of doing things. And I'm well aware I approach things differently than other developers. As a solo dev running <a href="https://clickontyler.com">my own company</a>, my highest priorities are being pragmatic and efficient. So I make use of tools that allow me to move the fastest regardless of whether or not they're in vogue. I lean on open source projects that are reliable and cost effective for a small (no, tiny) software business.

My most popular GitHub repo is <a href="https://github.com/tylerhall/simple-php-framework">the Simple PHP Framework</a>. It contains code dating back to 2005 that was organically gathered and grouped together into a <em>foundation</em> that I still use to this day to build all of my websites with. Would I use it to build a giant online storefront or a complex backend API? Maybe? It's certainly been used in those situations before. But it's really aimed at single developers or small teams who want to get shit done fast and with minimal fuss.

I view <em>DefaultApp</em> as my equivalent project for macOS development. While it certainly works for me and serves as the basis for all of my apps, I don't know yet if it will work well for others the way my PHP framework has over the years. I guess what I'm saying is don't use this as the basis for a billion dollar corporation's enterprise app. Or with a team of "<a href="https://engineering.fb.com/data-infrastructure/messenger/">100 engineers</a>" "solving hard problems".

But if you're a one-person development shop or a team of just two or three engineers building a typical macOS shoebox or document based app? Please take a look. Or, if you're just getting your feet wet in Mac development and want to see how someone who's had moderate success† on the platform structures a new project, you might find it helpful - particularly the three classes related to implementing an <code>NSOutlineView</code>.

(†Sorry, that line just sounds so <em>arrogant</em> when I read it, but I'm not sure how else to put it. I've been writing Mac apps for seventeen years now, and despite my many (probably) unorthodox development practices, I <em>ship</em> consistently and earn a decent income. My 21 year-old self would never have believed I'd even reach the point I'm at now. Before I finally found <a href="https://books.google.com/books/about/Cocoa_Programming_for_Mac_OS_X.html?id=b8baAAAAMAAJ">the Hillegass book</a> on a bottom shelf in <a href="https://twitter.com/TonyBeast1957/status/1229408752828239873">Barnes &amp; Noble</a> in 2004, 2003 Tyler would have killed for an example project like this. Native Mac apps feel like a dying breed that are succumbing to <a href="https://twitter.com/neilsardesai/status/1130534027939725312">janky web views</a> and (mostly) awful Catalyst ports. If <em>DefaultApp</em> can help just one developer new to the platform get started, then I'll be ecstatic.)

Anyway, this is the first release of <em>DefaultApp</em>. I've got more old projects I've yet to comb through for other useful snippets to include, but this is nonetheless a good starting point for when you're building a simple to moderately complex Mac app or just want to create a quick prototype.

<a href="https://tyler.io/about/">Feedback</a>, <a href="https://github.com/tylerhall/DefaultApp/pulls">pull requests</a>, <a href="https://github.com/tylerhall/DefaultApp/issues">etc</a>. are very much welcome as always.