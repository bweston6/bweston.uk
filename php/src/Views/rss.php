<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
  <channel>
    <title>Blog | Ben Weston</title>
    <link>https://bweston.uk</link>
    <description>The 'anti-content' website.</description>
    <language>en-gb</language>
    <docs>https://www.rssboard.org/rss-specification</docs>
    <webMaster>me@bweston.uk (Ben Weston)</webMaster>

    <?php foreach (array_reverse($posts) as $post) : ?>
    <item>
      <title><?= $post["front_matter"]['title'] ?></title>
      <link>https://bweston.uk/post/<?= $post["slug"] ?></link>
      <description><![CDATA[<?= $post["result"] ?>]]></description>
			<author><?= $post["front_matter"]["author"] ?></author>
			<guid><?= $post["slug"] ?></guid>
			<pubDate><?= (new DateTime($post["front_matter"]["date"])->format(DateTime::RFC822)) ?></pubDate>
    </item>
		<?php endforeach; ?>
  </channel>
</rss>
