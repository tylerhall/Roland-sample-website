title: So, uh, I think Catalina 10.15.4 Broke SSH?
date: 2020-03-31 00:12:33
slug: so-uh-i-think-catalina-10154-broke-ssh
categories: macOS,Server
og_description: SSH'ing into a server with a high port number via its domain name is broken in macOS Catalina 10.15.4.
---
I was completely at my wit’s end and feeling like I had lost my mind until about a half hour ago. And I don’t know what difference connecting via a hostname versus an IP address would make when specifically using a non-standard port above a certain threshold. I’m not even going to go into it. I don’t want to end up on Hacker News again bitching about Catalina. I just hope I’ve stuffed this post with enough keywords so that anyone else searching on Google might come across the answer.
---
I was completely at my wit’s end and feeling like I had lost my mind until about a half hour ago. Let me start from the beginning...

I don’t have an exact date, but within the last week I realized that I was unable to <code>ssh</code> into my primary web server - the one that runs my <a href="https://clickontyler.com">business website</a>, activation server, etc. It’s sort of the linchpin for my tiny software company. When it goes down, I get worried.

At first I thought maybe the server was down? I hadn’t received any alerts, so I did a quick check. And, yes, it was still up and running and serving web traffic. Ok, did <code>sshd</code> somehow become unresponsive? I login through the <a href="https://www.linode.com">Linode</a> control panel and restart the service. Still can’t login.

It’s odd. I don’t get a connection refused. Not even a timeout. It just...hangs.

<img class="alignnone size-full" src="{{site_cdn}}/wp-content/uploads/2020/03/ssh1.png" width="1241" height="311" />

That’s the <code>ssh</code> output with the verbose flag. Nothing. I waited 10+ minutes and it never timed out or produced any other output.

I reboot the server itself and the problem persists.

Then, I notice some more oddities. I’m able to connect using <a href="https://binarynights.com">ForkLift</a> - my FTP client, which connects via SFTP. Also, <a href="http://sequelpro.com">SequelPro</a> is able to connect to MySQL via <code>ssh</code> as well.

And then things get even stranger. This is all happening on my iMac. I try connecting from my laptop, and it works. My MacBook Pro is at home right next to my iMac, which is refusing to login. They’re both on the same wifi and thus the same IP. So, it can’t be that my home IP address got mistakenly banned somehow.

Next, I <code>ssh</code> into a different server and then hop to the problematic one. It connects without any trouble. At this point I’m thinking maybe the permissions on my local private key got screwed up. So, I blow away <code>~/.ssh</code> and recreate all of my keys from a backup. Still can’t login.

Ok. I think about it for a few minutes and then - aha! - I have an Ubuntu virtual machine running on this iMac inside <a href="https://www.parallels.com">Parallels</a>. I’ll <code>ssh</code> into it and then try and connect. That will rule out if there’s just something odd about my iMac’s LAN IP. (To be clear, my home network is perfectly ordinary. Just a cable modem and a router.) So, I login to the VM, try and connect, and it works fine.

At this point here’s what I’ve found:

<ul>
<li>My iMac is the only machine that cannot login.</li>
<li>I’ve connected successfully from behind the same public IP using a laptop, a virtual machine, <em>and</em> my iPhone and iPad.</li>
<li>I’ve verified my <code>ssh</code> keys are correct and have the appropriate permissions.</li>
<li>I <em>can</em> connect to other servers from the problematic machine - both at the same hosting provider (Linode) and others (AWS and DigitalOcean).</li>
<li>I <em>can</em> connect from my iMac if I jump through any other server, first.</li>
</ul>

I start trying to think what could possibly be different about this one machine. And then it dawns on me. This all started around the time I updated my iMac to 10.15.4. My laptop is still on 10.15.3 - and, of course, the virtual machine isn’t macOS at all.

Totally grasping for straws I google for “10.15.4 ssh” and find <a href="https://discussions.apple.com/thread/251226509">this top result</a> on the Apple discussion forums:

> Catalina 10.15.4 SSH port &#62; 8192 does not work when using server name instead of IP
> 
> This issue started just after upgrading to macOS Catalina 10.15.4.
> 
> After that update I am no longer able to open a SSH connection to a port greater than 8192 using server name (instead of IP). Yes, I do change the port on the server side prior to every test.

That can’t possibly be real?

Up until this point, I was connecting via a saved hostname defined in my <code>~/.ssh/config</code>, which let me login simply by tying <code>ssh some-server</code>. So, I tried <code>ssh ip-address -p9944</code> and it worked! (That server runs on an alternate <code>ssh</code> port.)

Ok. Time to narrow this down a bit further. I changed the server to listen on standard port 22 and tried connecting via the hostname once again.

Holy crap, it worked.

The user in the Apple forums was right. At least in my case, my one server that happened to be running on a non-standard <code>ssh</code> port above 8192 will not connect from Catalina 10.15.4 when using the hostname instead of the IP address.

Just to verify, I boot up a Mojave and Catalina (10.15.3) VM on the same iMac. They both connect fine, while the host machine continues to fail.

The internals of this is all so incredibly above my head I have no idea what the underlying problem might be. Am I and this one other forum poster just doing something totally bizarre yet the same? This <code>ssh</code> setup has been working for <em>years</em> for me until just the last week. I would love to be proven wrong and told I’m an idiot. But I don’t know what difference connecting via the hostname versus the IP address would make when specifically using a non-standard port above a certain threshold.

It just....<em>sigh</em>.

I’m not even going to go into it. I don’t want to end up on Hacker News again bitching about Catalina. I just hope I’ve stuffed this post with enough keywords so that anyone else searching on Google might come across the answer.