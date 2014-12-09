<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author kristopher.king
 */
class Uploader {

   private $fileArrName;
    /* pass filetypes as array values e.g.: $file_types=new
      array("image/jpeg","image/png","text/html") etc.. */
    
    private $folderPath;
    private $type;
    const JPEG_TYPE = "image/jpeg";
    const GIF_TYPE = "image/gif";
    const PNG_TYPE = "image/png";
    const PDF_TYPE = "application/pdf";

    /* Constructor accepts the name of FILE array, file types array and folder path */

    function Uploader($fileArrName, $folderPath) {
        $this->fileArrName = $fileArrName;
        
        $this->folderPath = $folderPath;
    }

    /* this is the main function that tells you the status/errors */
    function upload() {
        if ($_FILES[$this->fileArrName]['name']) {
            /* we will enter into following block, only if there was a problem */
            if ($_FILES[$this->fileArrName]['error']) {
                switch ($_FILES[$this->fileArrName]['error']) {
                    case 1: echo "Error : File exceeds maximum upload
file size<br />";
                        return false;
                        break;
                    case 2: echo "Error : File exceeds maximum upload
size<br />";
                        return false;
                        break;
                    case 3: echo "Error : Partially uploaded<br />";
                        return false;
                        break;
                    case 4: echo "Error : No file uploaded<br />";
                        return false;
                }
            } // END OF FILE ERROR
//Get the file type
            $this->type = trim(strtolower($_FILES[$this->fileArrName]['type']));
// count the number of file types given
            $types = count($this->getFileTypes());
            $wrong_type = 0; //initial wrong types=0
            foreach ($this->getFileTypes() as $ftype) {

// compare the file type with each allowed file type
                if (!strcmp($this->type, $ftype) == 0) {
// wrong file type so increase the wrong type */
                    $wrong_type++;
                }
            }
            /* if the total number of wrong_type == types then no match, so
              user provided some wrong file type */
            if ($wrong_type == $types) {
                echo "Error : WRONG FILE TYPE<br />";
                return false;
            }
// CHECK IF THE TEMP FILE IS AVAILABLE
            if (is_uploaded_file($_FILES[$this->fileArrName]['tmp_name'])) {
// CHECK IF THE Folder EXISTS, if not create one//
                if ($this->folderPath) {
                    if (!is_dir($this->folderPath)) {
// creating a folder
                        $old_umask = umask(0); // clear umask
//path/name , permissions
                        if (!mkdir($this->folderPath, 0777)) {
                            echo "Error : unable to create folder
" . $this->folderPath . " <br />";
                            return false;
                        }
//Now set the umask to the way it was
                        umask($old_umask);
                    }
                }
// store file name
                $file_name = $_FILES[$this->fileArrName]['name'];
// create file path
//if folder path is available add it, if not just add file name
                $file_path = ($this->folderPath) ? $this->folderPath . "/" .
                        $file_name : $file_name;
// Check if file already exists
                if (file_exists($file_path)) {
//File with the same name already exists, so give another name
// uniqid("string") will generate a unique number with the given prefix
// so we will get a prefix like CP265ee4a7...
                    $new_name = uniqid("CP") . $file_name;
                    echo "File $file_name already exists, File renamed
to $new_name
<br />";
// reset the filepath
                    $file_path = ($this->folderPath) ? $this->folderPath . "/" . $new_name : $new_name;
                }
// moving the temporary file to our desired location
                if (move_uploaded_file($_FILES[$this->fileArrName]
                                ['tmp_name'], $file_path)) {
// Check if it is available
                    if (file_exists($file_path)) {
                        echo "File $file_path uploaded successfully
<br />";
                        return $file_path;
                    } else {
                        echo "ERROR : Unable to Move file
$file_path, Rename the file and try again<br />";
                        return false;
                    }
                }
            }// end of check if temporary file available
            else {
                echo "ERROR : Temporary File not available <br />";
                return false;
            }
        }// end of if file name available
        else {
            echo "ERROR : File name not available<br />";
            return false;
        }
    }
    
    public function getFileTypes() {
        return array(
            self::GIF_TYPE,
            self::JPEG_TYPE,
            self::PNG_TYPE,
            self::PDF_TYPE
        );
    }

        
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }


}
