<?php
namespace vendor\storage;

abstract class Storage
{
    /**
     * @return string
     */
    abstract protected function getCollectionName();

    public function __construct()
    {
        $this->storage = new \MongoClient();
        $db = $this->storage->selectDB(DB_NAME);
        $this->collection = $db->selectCollection($this->getCollectionName());
    }

    /**
     * @param $object
     */
    public function insert($object)
    {
        $this->collection->insert($object);
    }
} 