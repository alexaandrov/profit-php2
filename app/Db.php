<?php

namespace App;

class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=php2.local', 'root', '');
    }

    public function execute($sql, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        return $res;
    }

    public function query($sql, $class, array $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
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