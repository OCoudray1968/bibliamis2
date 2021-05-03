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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="loannings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $borrower;

    /**
     * @ORM\ManyToOne(targetEntity=Book::class, inversedBy="loannings")
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity=Disc::class, inversedBy="loannings")
     */
    private $Disc;

    /**
     * @ORM\ManyToOne(targetEntity=Movie::class, inversedBy="loannings")
     */
    private $movie;

    /**
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="loannings")
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


    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;
        return $this;
    }

    public function getDisc(): ?Disc
    {
        return $this->Disc;
    }

    public function setDisc(?Disc $Disc): self
    {
        $this->Disc = $Disc;
        return $this;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        $this->movie = $movie;
        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;
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
