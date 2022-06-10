<?php

namespace App\Repositories;

use Ci4Common\Libraries\CurlLib;
use Ci4Orm\Repository\Repository;
use DateTime;
use stdClass;

class BaseRepository extends Repository {

    const DUMMYAPI_APP_ID = '62a201fc7ba2a908170c8e0f';
    const DUMMYAPI_URL = 'https://dummyapi.io/data/v1/';

    /**
     * @inheritDoc
     */
    private function fetch(string $path, array $filter = [], $columns = [], $stdClass = false, &$associated = []){

        $query = "?" . http_build_query($filter);
        $curl = new CurlLib(self::DUMMYAPI_URL . $path . $query);
        $curl->method('GET');
        $curl->httpVersion();
        $curl->addHeader('app-id', self::DUMMYAPI_APP_ID);
        $resultString = $curl->exec();
        $results = json_decode($resultString);
        $data = $this->setToEntity($results->data);
        return [
          'data' => $data,
          'additional' => [
            'page' => $results->page,
            'total' => $results->total,
            'limit' => $results->limit
          ]
        ];
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
                    if (isset($result->$key) && !is_null($result->$key)) {
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
    public function get(string $path, array $params = [], &$additionalReturnData = null) {
        $data = $this->fetch($path, $params);
        $additionalReturnData = $data['additional'];
        return $data['data'];
    }

    /**
     * Post data to end point
     *
     * @param string $path
     * @param array $body
     * @return stdClass
     */
    public function post(string $path, array $body): stdClass{
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

    /**
     * update existing data
     *
     * @param string $path
     * @param array $body
     * @return stdClass
     */
    public function put(string $path, array $body): stdClass{
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

    /**
     * delete a data
     *
     * @param string $path
     * @param array $body
     * @return stdClass
     */
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

    public function getById(string $path){

        $curl = new CurlLib(self::DUMMYAPI_URL . $path);
        $curl->method('GET');
        $curl->httpVersion();
        $curl->addHeader('app-id', self::DUMMYAPI_APP_ID);
        $resultString = $curl->exec();
        $results = json_decode($resultString);
        $data = $this->setToEntity([$results]);
        return $data[0];
    }

}