<?php

namespace App\Controller;

use App\Form\InvestorForm;
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
        $form = $this->createForm(InvestorForm::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /*$result = $calculator->performCalculation();

            $entityManager = $this->getDoctrine()->getManager();

            $calculatorEntity->setFirstNumber($calculatorEntity->getFirstNumber());
            $calculatorEntity->setSecondNumber($calculatorEntity->getSecondNumber());
            $calculatorEntity->setOperand($calculatorEntity->getOperand());
            $calculatorEntity->setOutput($result);
            $now = date('Y-m-d H:i:s');
            $calculatorEntity->setCreated($now);

            $entityManager->persist($calculatorEntity);

            $entityManager->flush();*/

            return $this->render('investor/investor.html.twig', array(
                    'form' => $form->createView(),
                    'result' => ''
                )
            );
        }

        return $this->render('investor/investor.html.twig', array('form' => $form->createView()));
    }
}
