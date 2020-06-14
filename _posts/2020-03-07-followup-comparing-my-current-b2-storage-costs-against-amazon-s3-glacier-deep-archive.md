title: Followup: Comparing my Current B2 Storage Costs against Amazon S3 Glacier Deep Archive
date: 2020-03-07 11:29:58
slug: followup-comparing-my-current-b2-storage-costs-against-amazon-s3-glacier-deep-archive
categories: Backups,Amazon Web Services,Photography
og_description: This is a quick followup to my post from this week about backing up my family’s photos and home videos with Google Photos and B2.
---
This is a quick followup to my post from this week about backing up my family’s photos and home videos with Google Photos and B2. A reader asked why I use B2 over Amazon's cheaper S3 Glacier alternative. I started to reply directly, but then like everything I write, it kept growing. And then I thought my answer might be interesting to others as well. So, here you go...
---
This is a quick followup to my post from this week about <a href="https://tyler.io/my-familys-photo-and-video-library-backup-strategy-in-2020/">backing up my family's photos and home videos with Google Photos and B2</a>. A reader sent me the following question this morning:

> Nice article on photos backup! Have you considered amazon S3 glacier instead of B2? It should be cheaper and work with Arq , can I ask why you prefer B2?

I started to reply directly, but then like everything I write, it kept growing. And then I thought my answer might be interesting to others as well. So, here you go...

<hr />

> Hey. Glad you enjoyed the post. I've looked into <a href="https://aws.amazon.com/glacier/">Glacier</a> previously, but stick with B2 for a few reasons. Just specifically talking about my photos/videos (not my actual computer backups which I do use <a href="https://www.arqbackup.com">Arq</a> for)...
> 
> <a href="https://www.backblaze.com/b2/cloud-storage.html">B2</a> currently costs me $5/month. <a href="https://aws.amazon.com/blogs/aws/new-amazon-s3-storage-class-glacier-deep-archive/">Glacier Deep Archive</a> would be $1.80/month just for the storage.
> 
> However, assuming I'm doing <a href="https://calculator.s3.amazonaws.com/index.html">Amazon's complicated pricing math</a> correctly, in the event of a full recovery, getting all of my data out of B2 would be $10. But a restore from Glacier would be $90.
> 
> Do I expect to need to get all that data out very often? If ever? Hopefully not. And with my local backup and the fact the Google truly is super reliable despite me being paranoid, I haven't ever had to restore a single photo or video from B2 yet. It's purely my disaster recovery fallback.
> 
> So, in theory. It would cost an extra $80 to restore out of Glacier, but be $3.20 cheaper per month for storage. $80 / $3.20 means I could do a full restore once every two years and break even compared to B2. And if I never did do a restore, I'd save $76 over the course of those two years.
> 
> So now that I'm doing the math again, maybe Glacier <em>is</em> something to look into long-term as my storage needs keep rising. But, thankfully, I'm very fortunate that an extra $3/month doesn't bother me enough to invest the time into migrating and figuring out an alternative to <a href="https://www.backblaze.com/b2/docs/quick_command_line.html">B2's easy to use command line sync tool</a>. Does <a href="https://s3tools.org/s3cmd">s3cmd</a> offer similar functionality? Maybe? I've never looked to see if it does syncing. <em>Update: <a href="https://s3tools.org/s3cmd-sync">Yep, it does</a>. Nice.</em>
> 
> Anyway, given all of the above and also your initial mention about how Arq would work with S3/Glacier, I do want to point out that I'm not using Arq for my photos and videos.
> 
> I do use Arq to backup my computers because I love having a way to restore specific versions of my files. And Arq's restore UI works terrifically. It's <a href="https://tyler.io/gone/">saved my butt</a> a number of times.
> 
> Also, because of bandwidth constraints, I can't actually use Arq for my giant, monthly photo and video backup job. Arq is a Mac app - so I'd have to run it at home behind my Comcast connection, which has terrible upload speeds. Sure, it'd be doable. But it's way, way faster to go datacenter to datacenter, which means I need to use a different tool.
> 
> Speaking of which, as I said above, I've never needed to restore my photos from B2 yet. But I do frequently grab old files (sometimes 100s of GB) with Arq. That sort of access with Glacier isn't cost effective - B2 is way cheaper. Also, B2 gives me instant access to my files whereas Glacier might require waiting 12 hours.
> 
> Anyway, that's my calculus. I don't ever really foresee moving away from Arq + B2 unless Arq is discontinued or an even cheaper B2 competitor appears. But as my family archives keep growing and eventually cross into multiple TB, I may need to reconsider Glacier.

<em>Note: If I totally screwed up the Glacier pricing, I'd love to hear about it. I estimated the costs of archiving and restoring a flat 1TB.</em>
