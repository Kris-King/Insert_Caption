<?php


// data for template
$image = Utils::getImageByGetId();
//$tooLate = $todo->getStatus() == Todo::STATUS_PENDING && $todo->getDueOn() < new DateTime();



$dao = new CaptionDao();




$captions = array();

$caption = new Caption();
$caption->setImageId(111);
$caption->setText("'Wheel beats Man...hahaha'");
$caption->setId("caption id");
$caption->setUserId("user id");

$captions [0]=$caption;

$caption = new Caption();
$caption->setImageId(111);
$caption->setText("America's Most Wanted: A Wheel");
$caption->setId("caption id");
$caption->setUserId("user id");

$captions [1]=$caption;

$caption = new Caption();
$caption->setImageId(111);
$caption->setText("Wheel 1 | Soldier 0");
$caption->setId("caption id");
$caption->setUserId("user id");

$captions [2]=$caption;

$caption = new Caption();
$caption->setImageId(111);
$caption->setText("Soldiers outwitted by Wheel");
$caption->setId("caption id");
$caption->setUserId("user id");

$captions [3]=$caption;

