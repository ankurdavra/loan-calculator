<?php
namespace App\Entity\EntityHelper;

use Symfony\Component\Validator\Constraints as Assert;

class CreateInvestorRequest
{

    /**
     * @Assert\NotBlank()
     * @var string
     */
    public $investor_name;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    public $tranche_type;

    /**
     * @Assert\NotBlank()
     * @var float
     */
    public $loan_amount;

    /**
     * @Assert\NotBlank()
     * @var string
     */
    public $loan_start_date;

}
