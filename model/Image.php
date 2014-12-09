<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author kristopher.king
 */
class Image {
    
    private $id;
    private $name;
    private $ext;
    private $source;
    private $userId;
    
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getExt() {
        return $this->ext;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setExt($ext) {
        $this->ext = $ext;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getSource() {
        return $this->source;
    }

    public function setSource($source) {
        $this->source = $source;
    }


    
}
