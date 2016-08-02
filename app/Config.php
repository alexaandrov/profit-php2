<?php

namespace App;

class Config
{
    use Singleton;

    protected $configFile;

    protected $data;

    protected function __construct()
    {
        $this->configFile = __DIR__ . '/../config.php';
        $data = require $this->configFile;
        var_dump($data);
    }

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
        $db->execute($sql, $values);
    }
}