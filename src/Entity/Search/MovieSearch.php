<?php

namespace App\Entity\Search;

use Doctrine\Common\Collections\ArrayCollection;

class MovieSearch
{
    /**
     * @var int|null
     */
    private $depositary;

    /**
     * @var string|null
     */
    private $director;

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
     * @return MovieSearch
     */
    public function setDepositary(int $depositary): MovieSearch
    {
        $this->depositary = $depositary;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDirector(): ?string
    {
        return $this->director;
    }

    /**
     * @param string|null $director
     * @return MovieSearch
     */
    public function setDirector(string $director): MovieSearch
    {
        $this->director = $director;
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