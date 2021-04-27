<?php

namespace App\Entity;

use App\Repository\LoanningRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoanningRepository::class)
 */
class Loanning
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="loannings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lender;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="borrower")
     * @ORM\JoinColumn(nullable=false)
     */
    private $borrower;

    /**
     * @ORM\ManyToMany(targetEntity=Book::class, inversedBy="loannings")
     */
    private $book;

    /**
     * @ORM\ManyToMany(targetEntity=Disc::class, inversedBy="loannings")
     */
    private $Disc;

    /**
     * @ORM\ManyToMany(targetEntity=Movie::class, inversedBy="loannings")
     */
    private $movie;

    /**
     * @ORM\ManyToMany(targetEntity=Game::class, inversedBy="loannings")
     */
    private $game;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $loan_date;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $back_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ongoing;

    public function __construct()
    {
        $this->book = new ArrayCollection();
        $this->Disc = new ArrayCollection();
        $this->movie = new ArrayCollection();
        $this->game = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLender(): ?User
    {
        return $this->lender;
    }

    public function setLender(?User $lender): self
    {
        $this->lender = $lender;

        return $this;
    }

    public function getBorrower(): ?User
    {
        return $this->borrower;
    }

    public function setBorrower(?User $borrower): self
    {
        $this->borrower = $borrower;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    public function addBook(Book $book): self
    {
        if (!$this->book->contains($book)) {
            $this->book[] = $book;
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        $this->book->removeElement($book);

        return $this;
    }

    /**
     * @return Collection|Disc[]
     */
    public function getDisc(): Collection
    {
        return $this->Disc;
    }

    public function addDisc(Disc $disc): self
    {
        if (!$this->Disc->contains($disc)) {
            $this->Disc[] = $disc;
        }

        return $this;
    }

    public function removeDisc(Disc $disc): self
    {
        $this->Disc->removeElement($disc);

        return $this;
    }

    /**
     * @return Collection|Movie[]
     */
    public function getMovie(): Collection
    {
        return $this->movie;
    }

    public function addMovie(Movie $movie): self
    {
        if (!$this->movie->contains($movie)) {
            $this->movie[] = $movie;
        }

        return $this;
    }

    public function removeMovie(Movie $movie): self
    {
        $this->movie->removeElement($movie);

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGame(): Collection
    {
        return $this->game;
    }

    public function addGame(Game $game): self
    {
        if (!$this->game->contains($game)) {
            $this->game[] = $game;
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        $this->game->removeElement($game);

        return $this;
    }

    public function getLoanDate(): ?\DateTimeInterface
    {
        return $this->loan_date;
    }

    public function setLoanDate(\DateTimeInterface $loan_date): self
    {
        $this->loan_date = $loan_date;

        return $this;
    }

    public function getBackDate(): ?\DateTimeInterface
    {
        return $this->back_date;
    }

    public function setBackDate(?\DateTimeInterface $back_date): self
    {
        $this->back_date = $back_date;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */

    public function updateLoanDate()
    {
        if ($this->getLoanDate() === null) {

            $this->setLoanDate(new \DateTimeImmutable);
        }

        $this->setBackDate(new \DateTimeImmutable);
    }

    public function getOngoing(): ?bool
    {
        return $this->ongoing;
    }

    public function setOngoing(bool $ongoing): self
    {
        $this->ongoing = $ongoing;

        return $this;
    }
}
