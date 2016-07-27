<?php

namespace App\Models;

use App\Model;

class News extends Model
{
    const TABLE = 'news';

    protected $id;

    protected $author_id;

    protected $title;

    protected $text;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    public function getAuthor()
    {
        if (isset($this->author_id)) {
            $author = Author::findById($this->author_id);
            return $author[0];
        }
    }
}