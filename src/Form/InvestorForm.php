<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InvestorForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('investor_name', ChoiceType::class, array(
                'choices' => array(
                    'investor1' => 'Investor 1',
                    'investor2' => 'Investor 2',
                    'investor3' => 'Investor 3',
                    'investor4' => 'Investor 4'
                )
            ))
            ->add('tranche_type', ChoiceType::class, array(
                'choices' => array(
                    'A' => 'A',
                    'B' => 'B'
                )
            ))
            ->add('loan_amount')
           ->add('loan_start_date', DateType::class, [
               // renders it as a single text box
               'widget' => 'single_text',
           ])
            ->add('Submit', SubmitType::class);
    }
}
