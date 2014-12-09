<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



// If the file name is available first upload it
        if ($_FILES['myfile']['name']) {
            /* the upload constructor accepts FILE array name, array accepted file types and
              destination folder name */
            /* For our example myfile is the name of FILE array
              Accepted file types are jpeg and gif
              The folder is images */
            $upload = new Uploader("myfile", "images");
            /* is uploaded functions returns file name if successful or false if there was any
              problem */
            $filePath = $upload->upload();
            if ($filePath && $upload->getType() != Uploader::PDF_TYPE) {
                echo $filePath . " Uploaded <br />";
// Successfully uploaded so resize now.
                /* resize_image constructor accepts source image path/name, dimension of new
                  image, destination folder name and prefix for new resized image */
                $image = new ImageResizer($filePath, 100, "thumb_images", "thumb");
                /* the resize function returns false if there was any problem else returns
                  true */
                if ($image->resize()) {
                    echo "SUCCESSFULLY RESIZED <br />";
                    echo "<img src=\"".$filePath."\"/>";
                    echo "<img src=\"".$image->getFullPath()."\"/>";
                } else {
                    echo "ERROR : UNABLE TO RESIZE<br />";
                }
            } else {
                echo "Unable to upload file - SEE the ERROR ABOVE?<br />";
            }
        } else {
            echo "Please select a file to upload<br />";
        }

