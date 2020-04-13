title: Spotish for macOS
date: 2020-03-25 01:19:33
slug: spotish-for-macos
categories: Drafts.app,macOS Development,Click On Tyler
---
Spotish is a dead-simple Mac menu bar app for Spotify – there are many like it, but this one is mine. Here’s why.
---
I know I <a href="https://tyler.io/rebudget/">keep</a> <a href="https://tyler.io/three-things-today/">referring</a> to <a href="https://twitter.com/tylerhall/status/1220804819667111941">this tweet of mine from last year</a>...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/bespoke-tweet-1.png" width="1125" height="812" />

> One day I will get around to either releasing or open sourcing the dozen or so bespoke, one-off Mac apps I’ve built just for myself.
> 
> Today is not that day.

The reason for that is because I really do have a backlog of random, one-off Mac apps that I’ve built over the years just for myself. Most of them are small utilities that do a very specific thing that make my life easier. While <a href="https://www.patreon.com/tylerhall">others are more ambitious</a>. In any case, it’s another week, we’re all stuck inside, so here’s another app that I built two years ago.

It’s called <a href="https://gum.co/UoYGv">Spotish</a>.

It’s a dead-simple and slightly dumb Mac menu bar app for Spotify - there are many like it, but this one is mine. Here’s why.

I’ve probably tried a dozen open source, free, and/or inexpensive Spotify “mini players” - many of them on the Mac App Store. But I’m picky, and none of them behaved exactly the way I wanted. Here’s what I’m after...

I hardly ever listen to <em>my</em> music with Spotify or any other streaming service. The music I care about - my collection of 40,000 mp3s dating back to CDs I ripped in high school and have since carried across twenty different computers - are all stored on a file server at home and available wherever I am via <a href="https://www.plex.tv">Plex</a> or <a href="https://prism-music.app">Prism</a>. If I’m listening to <em>my</em> music, I know exactly what’s playing at any given moment. I’m sure you do, too. There’s no surprises.

But I use Spotify, and <a href="https://tyler.io/missing-rdio-and-making-the-best-of-apple-music-with-shortcuts/">previously Rdio and Apple Music</a>, for <em>discovery</em>. I’m constantly streaming playlists of recommended artists and albums I’ve never heard before - always listening for something new.

Given that finding something new and amazing is my number one reason for using any streaming service, I’m constantly pausing what I’m doing and breaking my flow to quickly glance and see what I’m listening to. And nowadays there is. So. Much. Friction. just to see what is currently playing.

Every music service uses their own awful website disguised as a desktop app. Even on my iMac Pro - and <em>especially</em> on an underpowered laptop - checking the current track feels equivalent to launching Creative Suite in the 2000s. I just want to see the song title - not launch a entire instance of Chromium.

So, for a long time I used various 3rd party apps to keep a floating window of artwork on my desktop. Some were really nice. But they were always a pain in the ass to reveal. I’d typically have to ⌘-tab through twenty open apps just to bring it to the front. And it always bothered my obsessive compulsive nature having an extra window cluttering up my screen when I prefer to only have windows belonging to the current task visible. (Yes, I’m crazy.)

Anyway, like any good developer who practices <a href="https://mobile.twitter.com/tylerhall/status/1139962457995251712">Hate Driven Development</a>, I decided to build a Spotify mini player that behaves exactly how I want. Here’s a screenshot:

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/spotish-bar1.jpeg" width="1501" height="183" />

Everything I want to know - right there in the menu bar...

<ul>
<li>Artist</li>
<li>Album title</li>
<li>Song title</li>
</ul>

Yes, the text is nearly incomprehensibly tiny, but I dig it. It crams all the pertinent info into a small space and it makes me happy because I can glance up the menu bar at any time no matter what I’m doing or what context I’m in.

But if that font makes your eyes bleed (I get it), you can add/remove song items in any combination. So, just the artist and album names?

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/spotish-bar2.jpeg" width="1501" height="183" />

Or just the song title?

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/spotish-bar3.jpeg" width="1501" height="183" />

Spotish does some other nice things, too, besides just displaying the song info. The background animates to show the song’s progress...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/spotish-progreses.gif" width="1304" height="174" />

Click to view the album artwork...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/spotish-artwork.jpeg" width="1501" height="782" />

Clicking the image will launch Spotify and display the song in the context of its album.

Or, you can control-click (right click) the menu bar item to play / pause Spotify directly.

And, of course, there’s a few preferences to tweak to your liking...

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/spotish-prefs.png" width="1104" height="868" />

But my favorite feature? The one that really makes my geek gears turn? Spotish integrates with <a href="https://getdrafts.com">Drafts.app</a>.

Shift-click on the menu bar item and Spotish will create a new draft in Drafts with all of the current song’s info as well as a shareable link to its page on spotify.com

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/spotish-drafts.2020-03-25-00_26_57.gif" width="600" height="548" />

It’s a fast and completely frictionless way for me to bookmark or remember songs I want to take a closer look at later. (Yes, Spotify lets you ❤️ songs. And you could always add it to a “Listen To” playlist. But this is faster for me and fits my personal workflow better as I often want to <em>do something</em> with the song’s info as opposed to merely just liking it.)

<h2>🎵 🎉</h2>

So, that’s <a href="https://gum.co/UoYGv">Spotish</a>. I love having it in my menu bar. Maybe you will, too?

If you’d like to give it a spin, I’m trying something new. <a href="https://gum.co/UoYGv">Pay-what-you-want</a> and you’ll get a download link in your email as well as future app updates.

One dollar? Works for me.

$1,337? That’d be cool, too.

Whatever amount you’d like to contribute to Spotish’s future development, if you’re not happy, just let me know and I’ll refund your purchase.

<p style="text-align:center;">
<script src="https://gumroad.com/js/gumroad.js"></script>
<a class="gumroad-button" href="https://gum.co/UoYGv" target="_blank" rel="noopener noreferrer">Buy Spotish Now</a>
</p>

Questions? Comments? Feedback? <a href="https://tyler.io/about/">I'd love to hear it</a>.