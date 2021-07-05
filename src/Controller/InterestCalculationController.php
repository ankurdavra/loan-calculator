<?php

namespace App\Controller;

use App\Entity\Investor;
use App\Entity\Tranches;
use App\Model\LoanCalculation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class InterestCalculationController extends AbstractController
{
    /**
     * @Route("/calculate-interest", name="interest")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function interestCalculateAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $startDate ='2020-10-01';
        $endDate = '2020-10-31';

        $interestCalculation = [];

        $investors= $entityManager->getRepository(Investor::class)
            ->findInvestorByDate($startDate, $endDate);

        foreach ($investors as $investor) {

            $tranche = $entityManager->getRepository(Tranches::class)
                ->findTrunchesByInvestor($investor);

            $loanCalculation = new LoanCalculation($investor, $tranche);

            $interestCalculation = $loanCalculation->calculateInterest($startDate, $endDate);
        }

        return $this->render('interest/interest.html.twig', array(
                    'result' => $interestCalculation
                )
            );

    }
}
