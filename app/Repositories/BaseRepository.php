<?php

namespace App\Repositories;

use Ci4Orm\Repository\Repository;

class BaseRepository extends Repository {



    /**
     * @inheritDoc
     */
    private function fetch(array $filter = [], $columns = [], $stdClass = false, &$associated = []){

    }

    /**
     * @inheritDoc
     */
    private function setToEntity($results, &$associated = []){

    }

}