<?php

namespace App\Entity\Search;

class DiscSearch
{
    /**
     * @var int|null
     */
    private $depositary;

    /**
     * @var string|null
     */
    private $artist;

    /**
     * @return int|null
     */
    public function getDepositary(): ?int
    {
        return $this->depositary;
    }

    /**
     * @param int|null $depositary
     * @return DiscSearch
     */
    public function setDepositary(int $depositary): DiscSearch
    {
        $this->depositary = $depositary;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getArtist(): ?string
    {
        return $this->artist;
    }

    /**
     * @param string|null $artist
     * @return DiscSearch
     */
    public function setArtist(string $artist): DiscSearch
    {
        $this->artist = $artist;
        return $this;
    }


}