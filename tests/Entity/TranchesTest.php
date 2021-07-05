<?php

namespace Tests\App\Entity;

use App\Entity\Investor;
use App\Entity\Tranches;
use PHPUnit\Framework\TestCase;

class TranchesTest extends TestCase
{
    public function testInvestor()
    {
        $tranche = new Tranches();
        $investor = new Investor();
        $investor->setInvestorName('test');

        $tranche->setTrancheType('A');
        $tranche->setMaxAmount(100);
        $tranche->setInterestType('');
        $tranche->setInvestor($investor);

        $this->assertSame('A', $tranche->getTrancheType());
        $this->assertSame(100.0, $tranche->getMaxAmount());
        $this->assertSame(3, $tranche->getInterestType());
        $this->assertSame($investor, $tranche->getInvestor());
    }
}
