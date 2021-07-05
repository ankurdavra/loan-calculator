<?php

namespace App\Model;

use App\Entity\Investor;
use App\Entity\Tranches;

class LoanCalculation implements EventInterface
{
    private $investor;

    private $tranche;

    public function __construct(Investor $investor, Tranches $tranche)
    {
       $this->investor = $investor;
       $this->tranche = $tranche;
    }

    public function loanMaxAmount()
    {
       return ($this->tranche->getMaxAmount() - $this->investor->getLoanAmount());
    }

    public function calculateInterest($startDate, $endDate)
    {

       $daysMonth = $this->getDaysInMonth($this->getMonth($startDate), $this->getYear($startDate));

       $diff = strtotime($endDate) - strtotime( $this->investor->getLoanStartDate()->format('Y-m-d'));

       $daysInvested = abs(round($diff / 86400));

       $dailyInterstRate = number_format($this->tranche->getInterestType() / $daysMonth, 2,
           '.', '');

       $investedPeriodInterestRate = $dailyInterstRate * $daysInvested;

       $earnedInterest = ($this->investor->getLoanAmount() / 100 * $investedPeriodInterestRate);

       $interestData = $this->investor->getInvestorName() . ' recieves ' . $earnedInterest . ' in their wallet';

       return $interestData;
    }

    private function getMonth($date): int
    {
        $time = strtotime($date);
        $month = date("m",$time);
        return $month;
    }

    private function getYear($date): int
    {
        $time = strtotime($date);
        $year = date("Y",$time);
        return $year;
    }

    private function getDaysInMonth($month, $year): int
    {
        return cal_days_in_month(CAL_GREGORIAN,$month,$year);
    }
}
