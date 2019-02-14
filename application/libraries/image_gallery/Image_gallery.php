<?php
/**
 * Created by PhpStorm.
 * User: coregen3
 * Date: 11/2/19
 * Time: 2:43 PM
 */
defined ('IMAGE_GALLERY_PATH') or exit('Image gallery basepath not set please set this in Constants file');

class Image_gallery
{
    function listing(){
        $CI =& get_instance();
        $path=IMAGE_GALLERY_PATH;
        $images=scandir(IMAGE_GALLERY_PATH);
        print_r($images);


    }

}