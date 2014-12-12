<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$dao = new ImageDao();




$images = array();

$image = new Image();
$image->setSource("images/userimages/Quaid/14 - 1 (1).gif");
$image->setName("name");
$image->setExt("extension");
$image->setUserId("user id");
$image->setId(111);
        
$images [0]=$image;


        

