<?php

namespace App\Entity\Search;

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


}