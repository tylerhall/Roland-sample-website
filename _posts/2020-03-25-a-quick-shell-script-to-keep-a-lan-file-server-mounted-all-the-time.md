title: A Quick Shell Script to Keep a LAN File Server Mounted All the Time
date: 2020-03-25 11:02:26
slug: a-quick-shell-script-to-keep-a-lan-file-server-mounted-all-the-time
categories: macOS,Nerdery,Bash / Shell Script
og_description: Here's a small shell script and launchd job for macOS that keeps a shared network drive mounted even after the network drops or disconnects.
og_image: /wp-content/uploads/2020/03/samba-eject-mount.gif
og_image_alt: Image of a shared network drive mounted in the Finder.
---
Now that we're all stuck at home practicing social distancing, my children's mood depends on their favorite TV shows and movies always being available during their iPad free time. And my sanity depends on not hearing the awful clicking noise of the external drive our video library is stored on while I'm working at my desk. Moving it to a networked file server running off a Raspberry Pi was simple enough and solved the problem. But after trying a few 3rd party apps to keep the network share always mounted, here's the simple shell script I wrote instead.
---
Backstory: All of my family’s movies and TV shows are streamed to our Apple TVs and my kids iPads using <a href="https://www.plex.tv">Plex</a> (unless they come from one of the streaming services). If you have young children, it is not acceptable for the internet to blip out, slow down, or for a favorite movie to be pulled due to licensing issues between international billionaires, so having a locally, always available copy is critical.

My setup has stayed pretty consistent the last few years. I keep Plex running on my iMac Pro, which is great because it’s always awake and online. Even better, it can handle multiple transcoding sessions without breaking a sweat. So even if both my kids are watching something on their devices and my wife on the TV, I can be working in Xcode and not even notice the iMac doing anything different. It works so well, in fact, that I even invited our parents and siblings to our Plex account so they can watch our library remotely.

The <em>only</em> downside to this setup is that all this content is stored on an 8TB external drive hanging off the back of the iMac. And that’s fine, except...it’s <em>loud</em>. We’re talking late 90s beige tower clicking hard drive loud. The noise hasn’t been an issue previously because my kids’ movie watching and my time at my desk only overlapped on the weekends. But now that schools are closed and the world is working from home, I can hear it chewing through data all damn day.

We don’t have a NAS and I don’t really want to buy or deal with one. So, I bought my first <a href="https://www.raspberrypi.org">Raspberry Pi</a>, <a href="https://pimylifeup.com/raspberry-pi-samba/">installed Samba</a>, and moved it and the noisy drive inside a bookcase next to the router. And because it’s hardwired and not going over wifi, LAN bandwidth isn’t an issue as the videos round trip from Plex on my iMac, to the Pi, then back to Plex, then to whatever device is being watched. <em>Yeeesh</em>.

But all that video and music being available to Plex requires macOS not lose the connection to the file server. You can make a share automatically mount at startup by dragging it to your user’s login items in System Preferences, but that doesn’t help if the connection randomly drops.

I found a few 3rd party solutions to keep network shares mounted - I paid for and gave <a href="https://automounter.app">this one</a> a try. It’s really nice! But at the end of the day that’s just one more app running in the background I didn’t want - two, if you count the extra <a href="https://automounter.app/helper/">helper app</a> you have to install so it can work around macOS’s sandboxing restrictions. (Not the developer’s fault.)

Anyway, I thought about it for a few minutes and realized I should have just written my own script to start with. Here’s <a href="https://gist.github.com/tylerhall/1ac0b787d1b7966fcf8bf554a13d42e5">the literal two lines of <code>bash</code> I ended up writing</a>:

<script src="https://gist.github.com/tylerhall/1ac0b787d1b7966fcf8bf554a13d42e5.js"></script>

That checks to see if the share is mounted (if the directory for it exists) and, if not, mounts it.

Throw that in a <code>cron</code> job every minute or so and 💥. Here's a quick recording of me manually ejecting the share and then having it immediately come back online:

<img src="https://tyler.io/wp-content/uploads/2020/03/samba-eject-mount.gif" alt="" width="150" height="150" class="alignnone size-thumbnail " />

For me, though, I transitioned to running all of my background jobs using <a href="https://www.launchd.info"><code>launchd</code></a> instead of <code>cron</code> a few years ago. It would be way too complicated to maintain all those <code>.plist</code>s by hand, so I use <a href="https://www.soma-zone.com/LaunchControl/">LaunchControl</a> to do it for me instead. Seriously, it’s fantastic. Go buy it.

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/Screen-Shot-2020-03-25-at-10.30.25-AM.png" width="2534" height="1952" />

<a href="https://gist.github.com/tylerhall/3140d820dbde8e02cb272584879d0656">Here’s the plist</a> if you’d like to add a similar <code>launchd</code> job:

<script src="https://gist.github.com/tylerhall/3140d820dbde8e02cb272584879d0656.js"></script>