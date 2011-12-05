<p><div style="float:left;margin:3px;"><a title="Image View" href="<?php echo $this->urlWriter->urlFor('app', array('app' => 'ansel', 'action' => 'screenshots')) ?>">
<img alt="Image View" src="<?php echo $GLOBALS['host_base']?>/images/screenshots/ansel/2/imageview-thumb.jpg" /></a></div>

<p>Ansel is a full featured photo management application. With it, you can create
any number of galleries and subgalleries, share galleries among other Horde
users or even make them public. You can upload images either one at a time, as a
zip archive, upload them via Windows XP's "Publish to Web", or use one of the
available export plugins (see below). Once in Ansel, you can browse your images, download
originals, view galleries as a slideshow, add comments to images, send an
'ecard' to a friend, and more. You can crop, resize and perform other image
maniputlation functions.  You can even have Ansel try to detect faces in your
photos. Ansel will read and store EXIF data associated with uploaded images and
can even auto rotate your images to the proper position if the image contains
the proper EXIF properties.</p>

<div style="float:right;margin:3px;"><a href="screenshots/index.php" title="Polaroid Style Gallery View">
<img alt="Polaroid Style Gallery View" src="<?php echo $GLOBALS['host_base']?>/images/screenshots/ansel/2/polaroidstacks-thumb.jpg" /></a></div>

<p>As mentioned above,
<a href="<?php echo $this->urlWriter->urlFor(array('controller' => 'download', 'action' => 'app', 'app' =>'ansel'))?>">
export plugins</a> are available for both iPhoto and Aperture.
Both Ansel versions 1.x and 2.x are supported by these uploaders. All metadata
is retained during export, including keywords. You can create new galleries
directly from the plugin, as well as browse a gallery's thumbnails so you can
what images have been previously uploaded. You may configure multiple Ansel
servers as well.</p>

<p>Ansel supports photo and gallery tagging - allowing you to browse your photos by
tags just like you were browsing a directory. You can also choose to have
certain EXIF tags automatically added to an image on upload. As of Ansel 1.1,
geotagging is included. Geotags can be obtained from existing EXIF location data
or can be added directly in Ansel via Google Maps integration.</p>

<div style="float:left;margin:3px;"><a href="screenshots/index.php" title="iPhoto Plugin">
<img alt="iPhoto Plugin" src="<?php echo $GLOBALS['host_base']?>/images/screenshots/ansel/plugin-thumb.png" /></a></div>

<p>Mulitple gallery themes are available. You can create thumbnails that have
rounded corners with shadows, sharp corners with shadows, or even make your
thumbnails look like Polaroids! Image viewing can use a lightbox-type overlay
on the gallery page, or can be a seperate image view page that can display
image attributes, comments and other types of information.</p>

<p>There are multiple ways to organize your photos within galleries. You can create
subgalleries to further organize photos and you can also have Ansel
automatically display a gallery's photos to you grouped by date.</p>

<p>Ansel supports mulitiple ways to access your photos from outside of Ansel. There
are mutlitple types of RSS feeds available, including most recently added images
for a particular user, gallery or tag. The ability to embed widgets of your
photos into external websites, such as blogs, is also available.</p>

<p>For developers, Ansel also offers an external api that may be accessed via
Horde's RPC server or directly through the Horde Registry.  There are api
methods that make it extremely easy to embed gallery views on your own website.
</p>

<p>If you are interested in helping develop Ansel, or just want to ask questions
and keep an eye on its progress, be sure to join our
<a href="http://www.horde.org/mail">mailing list!</a></p>