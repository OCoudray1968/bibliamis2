<?php

namespace App\Entity;

use Monolog\DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;
use App\Entity\Traits\Timestampable;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 * @ORM\Table(name="books")
 * @ORM\HasLifecycleCallbacks
 */
class Book
{
    use Timestampable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

     /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

   
    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

   
}
