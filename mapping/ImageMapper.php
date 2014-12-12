<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageMapper
 *
 * @author kristopher.king
 */
final class ImageMapper {
    
        private function __construct() {
    }

    /**
     * Maps array to the given {@link Image}.
     * <p>
     * Expected properties are:
     * <ul>
     *   <li>id</li>
     *   <li>name</li>
     *   <li>ext</li>
     *   <li>source</li>
     *   <li>UserId</li>
     * </ul>
     * @param Image $image
     * @param array $properties
     */
    public static function map(Todo $image, array $properties) {
        if (array_key_exists('id', $properties)) {
            $image->setId($properties['id']);
        }
        if (array_key_exists('name', $properties)) {
            $image->setName($properties['name']);
        }
        if (array_key_exists('ext', $properties)) {
            $image->setExt($properties['ext']);
        }
        if (array_key_exists('source', $properties)) {
            $image->setSource($properties['source']);
        }
        if (array_key_exists('userId', $properties)) {
            $image->setUserId($properties['userId']);
        }

    }

    
}
