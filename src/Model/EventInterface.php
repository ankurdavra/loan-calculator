<?php

namespace App\Model;

interface EventInterface
{
    public function loanMaxAmount();

    public function calculateInterest($startDate, $endDate);
}
