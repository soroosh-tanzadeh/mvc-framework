<?php

namespace App\Core\Database;

use App\Core\Database\QueryBuilder\Queries\Select;
use App\Core\Database\QueryBuilder\Query;
use App\Core\Database\QueryBuilder\Structure;

abstract class Model
{
    protected static abstract function getTableName();

    protected static $key = "id";

    protected $hidden = [];

    private boolean $saved;

    public function __construct(array $data = [], $saved = false)
    {
        $this->save = $saved;
        if (isAssoc($data)) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    public static function findByKey($id)
    {
        return app()->getQueryBuilder()->from(static::getTableName(), null)->asObject(static::class)->where(static::$key . " = ?", $id)->fetch();
    }

    public static function query(): Select
    {
        return app()->getQueryBuilder()->from(static::getTableName(), null)->asObject(static::class);
    }

    // public function

    public function save()
    {
        if ($this->saved) {
            $this->{static::$key} = app()->getQueryBuilder()->insertInto(static::getTableName())->values($this->toArray())->execute();
        } else {
            app()->getQueryBuilder()->update(static::getTableName())->set($this->toArray())->execute();
        }
        return $this->{$this::$key};
    }

    public function toArray()
    {
        $attributes = get_object_vars($this);
        unset($attributes['hidden'], $attributes['key']);
        return $attributes;
    }
}
