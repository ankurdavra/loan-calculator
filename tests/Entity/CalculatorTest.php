<?php

namespace Tests\App\Entity;

use App\Entity\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testCalculator()
    {
        $calculator = new Calculator();
        $calculator->setFirstNumber(10);
        $calculator->setSecondNumber(10);
        $calculator->setOperand("add");
        $calculator->setOutput("20");
        $calculator->setCreated("2021-06-21 09:00:00");

        $this->assertEquals(10, $calculator->getFirstNumber());
        $this->assertEquals(10, $calculator->getSecondNumber());
        $this->assertEquals('add', $calculator->getOperand());
        $this->assertEquals('20', $calculator->getOutput());
        $this->assertEquals('2021-06-21 09:00:00', $calculator->getCreated());

    }
}
