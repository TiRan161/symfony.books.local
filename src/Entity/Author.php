<?php


namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class Author
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $surname;
    /** @var ArrayCollection */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Author
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return Author
     */
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getBooks(): ArrayCollection
    {
        return $this->books;
    }

    /**
     * @param ArrayCollection $books
     * @return Author
     */
    public function setBooks(ArrayCollection $books): self
    {
        $this->books = $books;
        return $this;
    }

    public function addBook (Book $book) :self
    {
        $books = $this->books;
        if (!$books->contains($book)) {
            $books->add($book);
        }
        return $this;
    }

    public function removeBook (Book $book) :self
    {
        $books = $this->books;
        if ($books->contains($book)) {
            $books->removeElement($book);
        }
        return $this;

    }
}