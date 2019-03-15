<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\presentation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\presentationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class presentationController extends Controller
{

    public function addAction(Request $request){


        $presentation = new presentation();
        $presentation->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(new presentationType(), $presentation);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            /*$presentation->getPath()->upload();*/
            $em = $this->getDoctrine()->getManager();
            $presentation->upload();
            /*var_dump($presentation);
            die('ici');*/
            $em->persist($presentation);
            $em->flush();

            return $this->redirect($this->generateUrl('presentation_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:presentation/presentationAdd.html.twig', array('form'=>$formView));

    }


    public function listAction (){


            $repository = $this->getDoctrine()->getRepository('redeBundle:presentation');
            $presentation = $repository->findAll();

            return $this->render('redeBundle:BackViews:presentation/presentationList.html.twig', array('presentation'=>$presentation));



    }

    public function editAction(Request $request,presentation $presentation,$id)
    {

        $presentation->setUpdateddAt(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new presentationType(),$presentation);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $presentation->upload();
            $em->flush();


            return $this->redirect($this->generateUrl('presentation_list'));

        }


        return $this->render('redeBundle:BackViews:presentation/presentationEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }



    public function deleteAction(presentation $presentation){

        $em = $this->getDoctrine()->getManager();
        $em->remove($presentation);
        $em->flush();


        return $this->redirect($this->generateUrl('presentation_list'));

    }



}