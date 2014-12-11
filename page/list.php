<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$dao = new ImageDao();




$images = array();

$image = new Image();
$image->setSource("images/userimages/Quaid/Soviet_T-34_with_desant_rushing_into_village.jpg");
$image->setName("name");
$image->setExt("extension");
$image->setUserId("user id");

$images [0]=$image;

$image = new Image();
$image->setSource("images/userimages/Quaid/F-14.jpg");
$image->setName("name");
$image->setExt("extension");
$image->setUserId("user id");
        
$images [1]=$image;

$image = new Image();
$image->setSource("images/userimages/Quaid/155mm-GMC-M12-France-1944.jpg");
$image->setName("name");
$image->setExt("extension");
$image->setUserId("user id");
        
$images [2]=$image;


        

