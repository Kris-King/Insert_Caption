<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$dao = new ImageDao();




$images = array();

$image = new Image();
$image->setSource("images/userimages/Quaid/Events_Battles.jpg");
$image->setName("name");
$image->setExt("extension");
$image->setUserId("user id");

$images [0]=$image;

$image = new Image();
$image->setSource("images/userimages/Quaid/14 - 1.gif");
$image->setName("name");
$image->setExt("extension");
$image->setUserId(101);
        
$images [1]=$image;

$image = new Image();
$image->setSource("images/userimages/Quaid/14 - 1 (1).gif");
$image->setName("name");
$image->setExt("extension");
$image->setUserId("user id");
$image->setId(111);
        
$images [2]=$image;


        

