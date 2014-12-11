<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author richard.lovell
 */
class Uploader {

    private $fileArrName;
    /* pass filetypes as array values e.g.: $file_types=new
      array("image/jpeg","image/png","text/html") etc.. */
    
    const ROOT_PATH = "images/userimages/";
    
    private $folderPath;
    private $type;
    const JPEG_TYPE = "image/jpeg";
    const GIF_TYPE = "image/gif";
    const PNG_TYPE = "image/png";
    const PDF_TYPE = "application/pdf";

    /* Constructor accepts the name of FILE array, file types array and folder path */

    function Uploader($fileArrName, $username) {
        $this->fileArrName = $fileArrName;
        $this->folderPath = self::ROOT_PATH."/".$username;
    }

    /* this is the main function that tells you the status/errors */
    function upload() {
        if ($_FILES[$this->fileArrName]['name']) {
            /* we will enter into following block, only if there was a problem */
            
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
                
                return false;
            }
// CHECK IF THE TEMP FILE IS AVAILABLE
            if (is_uploaded_file($_FILES[$this->fileArrName]['tmp_name'])) {
		
	$this->createDirectory($this->folderPath);
        
	
		
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
                    
// reset the filepath
                    $file_path = ($this->folderPath) ? $this->folderPath . "/" . $new_name : $new_name;
                }
// moving the temporary file to our desired location
                if (move_uploaded_file($_FILES[$this->fileArrName]
                                ['tmp_name'], $file_path)) {
// Check if it is available
                    if (file_exists($file_path)) {
                        
                        
                    } 
                }
            }// end of check if temporary file available
            
        }// end of if file name available
        
    }
    
    private function createDirectory($folderPath){
	    // CHECK IF THE Folder EXISTS, if not create one//
                if ($folderPath) {
                    if (!is_dir($folderPath)) {
// creating a folder
                        $old_umask = umask(0); // clear umask
//path/name , permissions
                        if (!mkdir($folderPath, 0777, true)) {
                           
                            return false;
                        }
//Now set the umask to the way it was
                        umask($old_umask);
                    }
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



// end of function is_uploaded
}

// end of upload class

