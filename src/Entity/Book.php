<?php


namespace App\Entity;


use DateTime;

class Book
{
    /** @var integer */
    private $id;
    /** @var DateTime */
    private $createdAt;
    /** @var string */
    private $title;
    /** @var Author */
    private $author;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return Book
     */
    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Book
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     * @return Book
     */
    public function setAuthor(Author $author): self
    {
        $this->author = $author;
        return $this;
    }

}