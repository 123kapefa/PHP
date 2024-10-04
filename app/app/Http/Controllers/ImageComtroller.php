<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageComtroller extends Controller
{
    public function image (Request $request) {
//        $image = imagecreatetruecolor (500, 300);
//        $gray = imagecolorallocate ($image, 128, 128, 128);
//        $red = imagecolorallocate ($image, 128, 0, 0);
//        $white = imagecolorallocate ($image, 255, 255, 255);
//        imagefill ($image, 1, 1, $gray);
//
//        imagefilledrectangle ($image, 20, 10, 260, 65, $red);
//
//        imagettftext($image, 24, 0, 50, 50, $white,
//            '/app/public/fonts/font1.ttf',
//            'Hello world!'
//        );

        $image1 = imagecreatefromjpeg ('/app/public/images/image2.jpeg');
        list($w1, $h1) = getimagesize ('/app/public/images/image2.jpeg');

        $image2 = imagecreatefromjpeg ('/app/public/images/image3.jpeg');
        list($w2, $h2) = getimagesize ('/app/public/images/image3.jpeg');

        imagecopyresampled ($image1, $image2, 0, 0, 0, 0, $w1 / 2, $h1 / 2, $w2, $h2);

        ob_start ();
        imagepng ($image1);
        $imageData = ob_get_contents ();
        ob_end_clean ();

        return response ($imageData)
            ->withHeaders ([
                'Content-disposition' => 'attachment; filename=ImageName.png',
                'Content-type' => 'image/png'
            ]);
    }
}
