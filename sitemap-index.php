<?php /* Template Name: Sitemap Index */

header('Content-type:application/xml');

?>
<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php

$root=get_site_url();

$subsites = get_sites();
foreach( $subsites as $subsite ) {
	echo '	<sitemap>';
	echo '		<loc>' . $root . get_object_vars($subsite)["path"] . 'sitemap.xml</loc>';
	echo '		<lastmod>' . get_object_vars($subsite)["last_updated"] . '</lastmod>';
	print '	</sitemap>';
}

?>

</sitemapindex>
