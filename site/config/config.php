<?php


/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'K2-PERSONAL-48af201afdf1484fae4d6e3a41aa7340');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

// Set Projects as the homepage
c::set('home', 'projects');

c::set('debug', true);

// c::set('url', 'http://stage.lukecarlhartman.com/');

// favicon
c::set('panel.favicon', 'assets/images/favicon-16x16.png');



// HOOKS

kirby()->hook('panel.page.create', function ($page) {
    // auto-resize images on upload
    //   https://getkirby.com/docs/cookbook/handling-images-in-kirby/#auto-resize-images-on-upload

    kirby()->hook('panel.file.upload', 'resizeImage');
    kirby()->hook('panel.file.replace', 'resizeImage');

    function resizeImage($file)
    {
        // set a max. dimension
        $maxDimension = 1000;
        try {
            // check file type and dimensions
            if ($file->type() == 'image' and ($file->width() > $maxDimension or $file->height() > $maxDimension)) {

          // get the original file path
                $originalPath = $file->dir() . '/' . $file->filename();
                // create a thumb and get its path
                $resizedImage = $file->resize($maxDimension, $maxDimension);
                $resizedPath = $resizedImage->dir() . '/' . $resizedImage->filename();
                // replace the original image with the resized one
                copy($resizedPath, $originalPath);
                unlink($resizedPath);
            }
        } catch (Exception $e) {
            return response::error($e->getMessage());
        }
    }
});
