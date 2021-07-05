<?php

namespace Tests\App\Entity;

use App\Entity\Investor;
use PHPUnit\Framework\TestCase;
use DateTime;

class InvestorTest extends TestCase
{
    public function testInvestor()
    {
        $investor = new Investor();

        $loanDate = new DateTime('2008-08-03 00:00:00');
        $investor->setInvestorName('test');
        $investor->setWallet(100);
        $investor->setLoanAmount(500);
        $investor->setLoanStartDate($loanDate);

        $this->assertSame('test', $investor->getInvestorName());
        $this->assertSame(100.0, $investor->getWallet());
        $this->assertSame(500, $investor->getLoanAmount());
        $this->assertSame($loanDate, $investor->getLoanStartDate());
    }
}
