<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



if (!empty($_FILES)){


// If the file name is available first upload it
        if ($_FILES['myfile']['name']) {
            /* the upload constructor accepts FILE array name, array accepted file types and
              destination folder name */
            /* For our example myfile is the name of FILE array
              Accepted file types are jpeg and gif
              The folder is images */
            
            $username = "Quaid";
            
            
            $upload = new Uploader("myfile", $username);
            /* is uploaded functions returns file name if successful or false if there was any
              problem */
            $filePath = $upload->upload();
            if ($filePath && $upload->getType() != Uploader::PDF_TYPE) {
                echo $filePath . " Uploaded <br />";

            } 
        } 

}