<?php

namespace App\Entity\Search;

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


}