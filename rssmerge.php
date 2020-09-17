<?php 

header('Content-Type: application/rss+xml; charset=ISO-8859-1');
$xml=simplexml_load_file("http://www.rssmix.com/u/12005937/rss.xml") or die("Error: Cannot create object");

echo '<?xml version="1.0" encoding="utf-8" ?>'."\n";
?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" version="2.0">
<channel>
<generator>DLN RSS Merge</generator>
<title>All Shows on Destination Linux Network</title>
<link>http://destinationlinux.network/all-shows-feed</link>
<pubDate></pubDate>
<description>All shows of the Destination Linux Network combined into a single rss feed.</description>
<language>en</language>
<itunes:type>episodic</itunes:type>
<itunes:author>Destination Linux Network</itunes:author>
<itunes:summary>All shows of the Destination Linux Network combined into a single rss feed.</itunes:summary>
<itunes:image href=""/>
<itunes:explicit>no</itunes:explicit>
<itunes:owner>
<itunes:name>Destination Linux Network</itunes:name>
<itunes:email>mail@destinationlinux.network</itunes:email>
</itunes:owner>
<?php 

for ($i = 0; $i < count($xml->channel->item); $i++) {
  $ns_itunes = $xml->channel->item[$i]->children('http://www.itunes.com/dtds/podcast-1.0.dtd');
?>
<item>
    <title><?php echo $xml->channel->item[$i]->title; ?></title>
    <link><?php echo $xml->channel->item[$i]->link; ?></link>
    <itunes:episodeType xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"><?php echo $ns_itunes->episodeType; ?></itunes:episodeType>
    <itunes:author xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"><?php echo $ns_itunes->author; ?></itunes:author>
    <itunes:subtitle xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"><?php echo $ns_itunes->subtitle; ?></itunes:subtitle>
    <itunes:duration xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"><?php echo $ns_itunes->duration; ?></itunes:duration>
    <itunes:explicit xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"><?php echo $ns_itunes->explicit; ?></itunes:explicit>
    <itunes:image xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" href="<?php echo $ns_itunes->image->attributes()->href; ?>"/>
    <itunes:keywords xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"><?php echo $ns_itunes->keywords; ?></itunes:keywords>
    <description>
        <?php echo $xml->channel->item[$i]->description; ?>
    </description>
    <enclosure url="<?php echo $xml->channel->item[$i]->enclosure->attributes()->url; ?>" length="<?php echo $xml->channel->item[$i]->enclosure->attributes()->length; ?>" type="<?php echo $xml->channel->item[$i]->enclosure->attributes()->type; ?>"/>
    <pubDate><?php echo $xml->channel->item[$i]->pubDate; ?></pubDate>
    <guid isPermaLink="false"><?php echo $xml->channel->item[$i]->guid; ?></guid>
</item>
<?php 
}
 ?>
