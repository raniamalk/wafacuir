<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller;


use redemaroc\redeBundle\Entity\avis;
use redemaroc\redeBundle\Entity\produit;
use redemaroc\redeBundle\Form\produitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\avisType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class avisController extends Controller
{

    public function addAction(Request $request){
        $em =$this->getDoctrine()->getManager();
        /*$produit=$em->getRepository('redeBundle:produit')->findAll();*/

        /*$produit = $this->getProduit();*/
        /*if(!$produit){
            throw $this->createNotFoundException('ce produit n\'existe pas');
        }*/
        /*var_dump($produit);
        die('test');*/
//
//        $produit = $this->getProduit();


        $avis = new avis();
        $avis->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(new avisType(), $avis);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            /*$avis->setProduit($produit);*/

            $em->persist($avis);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success','Votre Avis a été envoyer !');
            return $this->redirect($this->generateUrl('produit_page'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:FrontViews:avisAdd.html.twig', array('form'=>$formView));

    }


    public function listAction (){


            $repository = $this->getDoctrine()->getRepository('redeBundle:avis');
            $avis = $repository->findAll();

            return $this->render('redeBundle:BackViews:avis/avisList.html.twig', array('avis'=>$avis));



    }

    public function editAction(Request $request,avis $avis,$id)
    {

        $avis->setUpdateddAt(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new avisType(),$avis);



        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){

            $em->flush();


            return $this->redirect($this->generateUrl('avis_list'));

        }


        return $this->render('redeBundle:BackViews:avis/avisEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }



    public function deleteAction(avis $avis){

        $em = $this->getDoctrine()->getManager();
        $em->remove($avis);
        $em->flush();


        return $this->redirect($this->generateUrl('avis_list'));

    }



}