<?php

namespace Tests\App\Entity;

use App\Entity\Investor;
use PHPUnit\Framework\TestCase;

class InvestorTest extends TestCase
{
    public function testInvestor()
    {
        $investor = new Investor();
        $investor->setInvestorName('test');
        $investor->setWallet(100);
        $investor->setLoanAmount(500);
    }
}
