<?php

namespace App\Entity;

use App\Repository\InvestorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvestorRepository::class)
 */
class Investor
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
    private $investor_name;

    /**
     * @ORM\Column(type="float")
     */
    private $wallet = 1000;

    /**
     * @ORM\Column(type="date")
     */
    private $loan_start_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvestorName(): ?string
    {
        return $this->investor_name;
    }

    public function setInvestorName(string $investor_name): self
    {
        $this->investor_name = $investor_name;

        return $this;
    }

    public function getWallet(): ?float
    {
        return $this->wallet;
    }

    public function setWallet(float $wallet): self
    {
        $this->wallet = $wallet;

        return $this;
    }

    public function getLoanStartDate(): ?\DateTimeInterface
    {
        return $this->loan_start_date;
    }

    public function setLoanStartDate(\DateTimeInterface $loan_start_date): void
    {
        $this->loan_start_date = $loan_start_date;
    }
}
