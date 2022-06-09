<?php

namespace App\Repositories;

use Ci4Common\Libraries\CurlLib;
use Ci4Orm\Repository\Repository;
use DateTime;

class BaseRepository extends Repository {

    const DUMMYAPI_APP_ID = '62a201fc7ba2a908170c8e0f';
    const DUMMYAPI_URL = 'https://dummyapi.io/data/v1/';

    /**
     * @inheritDoc
     */
    private function fetch(string $path, array $filter = [], $columns = [], $stdClass = false, &$associated = []){

        $curl = new CurlLib(self::DUMMYAPI_URL . $path);
        $curl->method('GET');
        $curl->httpVersion();
        $curl->addHeader('app-id', self::DUMMYAPI_APP_ID);
        $resultString = $curl->exec();
        $results = json_decode($resultString);
        return $this->setToEntity($results->data);
    }

    /**
     * convert all result to intended entity
     *
     * @param stdClass[] $results
     * @return array;
     */
    private function setToEntity($results, &$associated = [])
    {
        $objects = [];
        foreach ($results as $key => $result) {
            $obj = new $this->entityClass();

            foreach ($this->props['props'] as $key => $value) {
                // if (!is_null($result->$key)) {
                $method = 'set' . $key;
                if (!$value['isEntity']) {
                    if (!is_null($result->$key)) {
                        if ($value['type'] != 'DateTime') {
                            if ($value['type'] == 'boolean') {
                                $obj->$method((bool)$result->$key);
                            }

                            $obj->$method($result->$key);
                        } else {
                            $newDate = new DateTime($result->$key);
                            $obj->$method($newDate);
                        }
                    }
                } else {
                    if (isset($value['foreignKey'])) {
                        $foreignKey = $value['foreignKey'];
                        if (!is_null($result->$foreignKey)) {
                            $associated[$value['foreignKey']][] = $result->$foreignKey;
                            $obj->constraints[$value['foreignKey']] = $result->$foreignKey;
                        }
                    }
                }
            }
            $objects[] = $obj;
        }

        $newAssociated = [];
        foreach ($associated as $key => $value) {
            $newAssociated[$key] = array_unique($associated[$key]);
        }

        $associated = $newAssociated;

        return $objects;
    }

    /**
     * Get all data
     *
     * @param array $params
     * @return array
     */
    public function get(string $path, array $params = []){
        return $this->fetch($path, $params);
    }

    public function post(string $path, array $body){
        $curl = new CurlLib(self::DUMMYAPI_URL . $path);
        $curl->method('POST');
        $curl->httpVersion();
        $curl->addHeader('app-id', self::DUMMYAPI_APP_ID);
        $curl->addHeader('Content-Type', 'application/json');
        $curl->body($body);
        $resultString = $curl->exec();
        $results = json_decode($resultString);
        return $results;
    }

    public function put(string $path, array $body){
        $curl = new CurlLib(self::DUMMYAPI_URL . $path);
        $curl->method('PUT');
        $curl->httpVersion();
        $curl->addHeader('app-id', self::DUMMYAPI_APP_ID);
        $curl->addHeader('Content-Type', 'application/json');
        $curl->body($body);
        $resultString = $curl->exec();
        $results = json_decode($resultString);
        return $results;
    }


    public function delete(string $path){
        $curl = new CurlLib(self::DUMMYAPI_URL . $path);
        $curl->method('DELETE');
        $curl->httpVersion();
        $curl->addHeader('app-id', self::DUMMYAPI_APP_ID);
        $curl->addHeader('Content-Type', 'application/json');
        $resultString = $curl->exec();
        $results = json_decode($resultString);
        return $results;
    }

}