<?php

namespace app\tests;

use App\Models\News;

class NewsTest extends \PHPUnit_Framework_TestCase
{
    private $news;

    public function __construct()
    {
        $this->news = new News();
    }

    public function testFindAllNews()
    {
        assert(!empty($this->news->findAll()));
    }

    public function testFindByIdNews()
    {
        assert(!empty($this->news->findById(1)));
    }
}
