<?php

namespace App;

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
        if (! $this->isNew()) {
            return;
        }
        $columns = [];
        $values = [];
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            }
            $columns[] = $key;
            $values[':'.$key] = $value;
        }
        $sql = 'INSERT INTO ' . static::TABLE .
            ' (' . implode(', ', $columns) . ')
            VALUES (' . implode(', ', array_keys($values)) . ');';

        $db = Db::instance();
        $db->execute($sql, $values);
    }

    public static function deleteById($id)
    {
        if (! static::findById($id)) {
            return false;
        }
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $params = [':id' => $id];

        $db = Db::instance();
        $db->execute($sql, $params);
        return true;
    }

    public function update($data)
    {
        $sql = 'UPDATE ' . static::TABLE . ' SET text=:text, title=:title
        WHERE id=:id';

        $values = [
            ':id'    => $data['id'],
            ':text'  => $data['text'],
            ':title' => $data['title']
        ];

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

    /**
     * @param int $id
     * @return object or bool false
     */
    public static function findById(int $id)
    {
        $db = Db::instance();

        if (empty($id) || $id < 1) {
            return false;
        }

        $data = $db->query(
            'SELECT * FROM ' . static::TABLE .
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

//    @todo Добавить общее свойство id и общий метод getId()