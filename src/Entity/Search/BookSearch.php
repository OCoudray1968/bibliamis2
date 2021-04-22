<?php

namespace App\Entity\Search;





use Doctrine\Common\Collections\ArrayCollection;

class BookSearch
{
    /**
     * @var int|null
     */
    private $depositary;

    /**
     * @var string|null
     */
    private $author;

    /**
     * @var ArrayCollection
     */
    private $genders;

    public function __construct()
    {
        $this->genders = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getDepositary(): ?int
    {
        return $this->depositary;
    }

    /**
     * @param int|null $depositary
     * @return BookSearch
     */
    public function setDepositary(int $depositary): BookSearch
    {
        $this->depositary = $depositary;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string|null $author
     * @return BookSearch
     */
    public function setAuthor(string $author): BookSearch
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getGenders(): ArrayCollection
    {
        return $this->genders;
    }

    /**
     * @param ArrayCollection $genders
     */
    public function setGenders(ArrayCollection $genders): void
    {
        $this->genders = $genders;
    }





}