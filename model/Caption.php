<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caption
 *
 * @author kristopher.king
 */
class Caption {
    private $id;
    private $text;
    private $userId;
    private $imageId;
    
    
    public function getId() {
        return $this->id;
    }

    public function getText() {
        return $this->text;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getImageId() {
        return $this->imageId;
    }

    public function setId($id) {
        $this->id = (int)$id;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setImageId($imageId) {
        $this->imageId = $imageId;
    }

}
