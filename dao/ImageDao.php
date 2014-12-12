<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageDao
 *
 * @author kristopher.king
 */
final class ImageDao extends Dao {
        


    /**
     * Find all {@link Image}s by search criteria.
     * @return array array of {@link Image}s
     */
    public function find($search = null) {
        $result = array();
        foreach ($this->query($this->getFindSql($search)) as $row) {
            $image = new Image();
            ImageMapper::map($image, $row);
            $result[$image->getId()] = $image;
        }
        return $result;
    }



    /**
     * Save {@link Image}.
     * @param Image $image {@link Image} to be saved
     * @return Image saved {@link Image} instance
     */
    public function save(Image $image) {
        if ($image->getId() === null) {
            return $this->insert($image);
        }
        return $this->update($image);
    }

    /**
     * Delete {@link Image} by identifier.
     * @param int $id {@link Image} identifier
     * @return bool <i>true</i> on success, <i>false</i> otherwise
     */
    public function delete($id) {
        $sql = '
            UPDATE ic SET
                name = :name,
                ext = :ext,
                source = :source
            WHERE
                id = :id';
        $statement = $parent->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':name' => true,
            ':ext' => true,
            ':source' => true,
            ':id' => $id,
        ));
        return $statement->rowCount() == 1;
    }




    /**
     * @return Image
     * @throws Exception
     */
    private function insert(Image $image) {
        $now = new DateTime();
        $image->setId(null);
        $image->setName($now);
        $image->setExt($now);
        $sql = '
            INSERT INTO ic (id, name, ext, source, userId)
                VALUES (:id, :name, :ext, :source, :userId)';
        return $this->execute($sql, $image);
    }





    private function getParams(Image $image) {
        $params = array(
            ':id' => $image->getId(),
            ':name' => $image->getName(),
            ':ext' => $image->getExt(),
            ':source' => $image->getSource(),
            ':userId' => $image->getDueOn(),
        );
        
        return $params;
    }


}