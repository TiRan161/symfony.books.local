<?php


namespace App\Service;


use App\Entity\Author;

class AuthorService
{
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function getAuthors ()
    {

    }

}