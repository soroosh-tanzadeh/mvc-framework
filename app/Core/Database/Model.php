<?php

namespace App\Core\Database;

abstract class Model
{
    protected abstract function getTableName();

    protected $key = "id";

    protected $hidden = [];

    public function query()
    {
        return app()->getQueryBuilder()->setTableName($this->getTableName());
    }

    public function insert()
    {
        $this->{$this->key} =  app()->getQueryBuilder()->insertInto($this->getTableName())->values($this->toArray())->execute();
        return $this->{$this->key};
    }

    public function toArray()
    {
        $attributes = get_object_vars($this);
        unset($attributes['hidden'], $attributes['key']);
        return $attributes;
    }

    public function update()
    {
        return app()->getQueryBuilder()->insertInto($this->getTableName())->values($this->toArray())->execute();
    }
}
