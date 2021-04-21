<?php

namespace App\Entity;

use App\Repository\GenderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenderRepository::class)
 */
class Gender
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\OneToMany (targetEntity=Book::class, mappedBy="gender", orphanRemoval=true)
     */
    private $books;
    /**
     * @ORM\OneToMany (targetEntity=Disc::class, mappedBy="gender", orphanRemoval=true)
     */
    private $discs;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->discs = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }


    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        $this->books->removeElement($book);

        return $this;
    }
    /**
     * @return Collection|Disc[]
     */
    public function getDiscs(): Collection
    {
        return $this->discs;
    }

    public function addDisc(Disc $disc): self
    {
        if (!$this->discs->contains($disc)) {
            $this->discs[] = $disc;
        }

        return $this;
    }

    public function removeDisc(Disc $disc): self
    {
        $this->discs->removeElement($disc);

        return $this;
    }
}
