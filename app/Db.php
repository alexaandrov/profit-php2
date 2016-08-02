<?php

namespace App;

use \App\Exceptions\Db as DbException;

class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:host=localhost;dbname=php2.local', 'root', '');
        } catch (\PDOException $e) {
            throw new DbException($e->getMessage());
        }
    }

    public function execute($sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (! $res) {
            throw new DbException('Допущена ошибка в запросе!');
        }
        return $res;
    }

    public function query($sql, $class, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (! $res) {
            throw new DbException('Допущена ошибка в запросе!');
        }
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

    public function queryArray($sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (false !== $res) {
            return $sth->fetchAll();
        }
        return [];
    }
}