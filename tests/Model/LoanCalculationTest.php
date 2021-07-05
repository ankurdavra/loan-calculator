<?php

namespace Tests\App\Entity;

use App\Entity\Investor;
use App\Entity\Tranches;
use App\Model\LoanCalculation;
use PHPUnit\Framework\TestCase;
use DateTime;

class LoanCalculationTest extends TestCase
{
    public function testLoanMaxAmount()
    {
        $investor = new Investor();

        $loanDate = new DateTime('2008-08-03 00:00:00');
        $investor->setInvestorName('test');
        $investor->setWallet(100);
        $investor->setLoanAmount(500);
        $investor->setLoanStartDate($loanDate);

        $tranche = new Tranches();

        $tranche->setTrancheType('A');
        $tranche->setMaxAmount(1000);
        $tranche->setInterestType('');
        $tranche->setInvestor($investor);

        $loanCalculation = new LoanCalculation($investor, $tranche);

        $this->assertSame(500.0, $loanCalculation->loanMaxAmount());
    }

    public function testCalculateInterest()
    {
        $investor = new Investor();

        $startDate = '2020-10-01';
        $endDate = '2020-10-31';

        $loanDate = new DateTime('2020-10-20 00:00:00');
        $investor->setInvestorName('test');
        $investor->setWallet(100);
        $investor->setLoanAmount(500);
        $investor->setLoanStartDate($loanDate);

        $tranche = new Tranches();

        $tranche->setTrancheType('A');
        $tranche->setMaxAmount(1000);
        $tranche->setInterestType('');
        $tranche->setInvestor($investor);

        $loanCalculation = new LoanCalculation($investor, $tranche);

        $this->assertSame('test recieves 5.5 in their wallet', $loanCalculation->calculateInterest($startDate, $endDate));
    }
}
