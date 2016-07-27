<?php

namespace App\Tests;

require __DIR__ . '/../../autoload.php';

Use App\Db;
use App\Singleton;

class DbTest extends \PHPUnit_Framework_TestCase
{
    use Singleton;

    private $db;

    private $sql = 'SELECT * FROM user WHERE id=:id';

    private $data = [':id' => 1];

    private $testClassName = '\App\Models\User';

    public function __construct()
    {
        $this->db = Db::instance();
    }

    public function testDbExecute()
    {
        $this->assertTrue($this->db->execute($this->sql, $this->data));
    }

    public function testDbPrepare()
    {
        $this->assertFalse(empty(
            $this->db->query(
                $this->sql,
                $this->testClassName,
                $this->data
                )
            )
        );
    }
}
