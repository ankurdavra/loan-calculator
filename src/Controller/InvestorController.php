<?php

namespace App\Controller;

use App\Entity\EntityHelper\CreateInvestorRequest;
use App\Entity\Investor;
use App\Entity\Tranches;
use App\Form\InvestorForm;
use App\Model\LoanMaxAmount;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class InvestorController extends AbstractController
{
    /**
     * @Route("/investor", name="investor")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function investorFormAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        // create an instance of an empty CreateInvestorRequest
        $createInvestorRequest = new CreateInvestorRequest();
        $investor = new Investor();
        $tranche = new Tranches();
        $loanMaxAmount = new LoanMaxAmount($investor, $tranche);
        $form = $this->createForm(InvestorForm::class, $createInvestorRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $investor->setInvestorName($createInvestorRequest->investor_name);
            $investor->setLoanAmount($createInvestorRequest->loan_amount);
            $investor->setLoanStartDate($createInvestorRequest->loan_start_date);

            $tranche->setTrancheType($createInvestorRequest->tranche_type);
            $tranche->setMaxAmount($loanMaxAmount->calculate());
            $tranche->setInterestType($tranche->getInterestType());

            $result = $entityManager->getRepository(Tranches::class)
                ->findMaxAmountByTrancheType($createInvestorRequest->tranche_type);

            if($result <> NULL) {
                $trancheAmount = ($result->getMaxAmount() - $investor->getLoanAmount());
                if ($trancheAmount <= 0 ) {
                    return $this->render('investor/investor.html.twig', array(
                            'form' => $form->createView(),
                            'result' => $investor->getInvestorName()
                                . ' can not be added as Tranche ' . $createInvestorRequest->tranche_type
                                . ' has got ' . $tranche->getMaxAmount()
                        )
                    );
                }
            }

            $entityManager->persist($investor);
            $entityManager->persist($tranche);
            $entityManager->flush();

            return $this->render('investor/investor.html.twig', array(
                    'form' => $form->createView(),
                    'result' => 'Investor has been added successfully'
                )
            );
        }

        return $this->render('investor/investor.html.twig', array('form' => $form->createView()));
    }
}
