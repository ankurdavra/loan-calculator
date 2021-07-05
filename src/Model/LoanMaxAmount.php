<?php

namespace App\Model;

use App\Entity\Investor;
use App\Entity\Tranches;

class LoanMaxAmount implements EventInterface
{
    private $investor;

    private $tranche;

    public function __construct(Investor $investor, Tranches $tranche)
    {
       $this->investor = $investor;
       $this->tranche = $tranche;
    }

    public function calculate()
    {
       return ($this->tranche->getMaxAmount() - $this->investor->getLoanAmount());
    }
}
