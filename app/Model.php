<?php

namespace App;

use App\Exceptions\Db as DbException;

abstract class Model
{
    const TABLE = '';

    protected $id;

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }
        $columns = [];
        $values = [];
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $columns[] = $key;
            $values[':' . $key] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE .
            ' (' . implode(', ', $columns) . ')
            VALUES (' . implode(', ', array_keys($values)) . ');';

        $db = Db::instance();

        return $db->execute($sql, $values);
    }

    public function update()
    {
        if ($this->isNew()) {
            return;
        }
        $columns = [];
        $values = [];
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                $values[':' . $key] = $value;
                continue;
            }
            $columns[] = $key;
            $values[':' . $key] = $value;
        }

        for ($i = 0; $i < count($columns); $i++) {
            switch ($i) {
                case 0:
                    $sql = 'UPDATE ' . static::TABLE . ' SET ' . $columns[$i] . '=:' . $columns[$i] . ', ';
                    continue;
                case count($columns) - 1:
                    $sql .= $columns[$i] . '=:' . $columns[$i] . ' WHERE id=:id';
                    continue;
                default:
                    $sql .= $columns[$i] . '=:' . $columns[$i] . ', ';
            }
        }

        $db = Db::instance();
        return $db->execute($sql, $values);
    }

    public static function findAll()
    {
        $db = Db::instance();

        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function deleteById($id)
    {
        if (!static::findById($id)) {
            return false;
        }

        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $params = [':id' => $id];
        $db = Db::instance();

        return $db->execute($sql, $params);
    }

    /**
     * @param int $id
     * @return object or bool false
     */
    public static function findById(int $id)
    {
        $db = Db::instance();

        if (empty($id) || $id < 1) {
            return null;
        }
//
        $data = $db->query(
            'SELECT * ROM ' . static::TABLE .
            ' WHERE id=:id',
            static::class,
            [':id' => $id]
        );

        if ($data) {
            return $data[0];
        } else {
            return false;
        }

    }
}