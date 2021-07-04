<?php

namespace App\Entity;

use App\Repository\TranchesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TranchesRepository::class)
 */
class Tranches
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
    private $tranche_type;

    /**
     * @ORM\Column(type="integer")
     */
    private $interestType;

    /**
     * @ORM\Column(type="float")
     */
    private $maxAmount = 1000;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrancheType(): ?string
    {
        return $this->tranche_type;
    }

    public function setTrancheType(string $tranche_type): self
    {
        $this->tranche_type = $tranche_type;

        return $this;
    }

    public function getInterestType()
    {
        return $this->interestType;
    }

    public function setInterestType($interestType): void
    {
        if ($interestType == 'A') {
            $interestType = 3;
        }

        if ($interestType == 'B') {
            $interestType = 6;
        }

        $this->interestType = $interestType;
    }

    public function getMaxAmount(): ?float
    {
        return $this->maxAmount;
    }

    public function setMaxAmount(float $maxAmount): self
    {
        $this->maxAmount = $maxAmount;

        return $this;
    }
}
