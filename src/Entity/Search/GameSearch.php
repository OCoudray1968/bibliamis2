<?php

namespace App\Entity\Search;

use Doctrine\Common\Collections\ArrayCollection;

class GameSearch
{
    /**
     * @var int|null
     */
    private $depositary;

    /**
     * @var string|null
     */
    private $title;

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
     * @return GameSearch
     */
    public function setDepositary(int $depositary): GameSearch
    {
        $this->depositary = $depositary;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return GameSearch
     */
    public function setTitle(string $title): GameSearch
    {
        $this->title = $title;
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