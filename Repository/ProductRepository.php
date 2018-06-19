<?php

namespace Repository;

/**
 * Class ProductRepository
 * @package Repository
 *
 * @todo реализовать модель для получения данных.
 *
 */
class ProductRepository extends BaseRepository {

    public function findByUuid(string $uuid){
        return $this->source->findByUuid($uuid);
    }

    public function findList(){
        return $this->source->findList();
    }

}