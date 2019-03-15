<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\equipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\equipeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class equipeController extends Controller
{

    public function addAction(Request $request){


        $equipe = new equipe();
        $form = $this->createForm(new equipeType(), $equipe);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $equipe->upload();
            $em->persist($equipe);
            $em->flush();

            return $this->redirect($this->generateUrl('equipe_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:equipe/equipeAdd.html.twig', array('form'=>$formView));

    }


    public function listAction (){

            $repository = $this->getDoctrine()->getRepository('redeBundle:equipe');
            $equipe = $repository->findAll();

            return $this->render('redeBundle:BackViews:equipe/equipeList.html.twig', array('equipe'=>$equipe));

    }

    public function editAction(Request $request,equipe $equipe,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new equipeType(),$equipe);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $equipe->upload();
            $em->flush();


            return $this->redirect($this->generateUrl('equipe_list'));

        }


        return $this->render('redeBundle:BackViews:equipe/equipeEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }



    public function deleteAction(equipe $equipe){

        $em = $this->getDoctrine()->getManager();
        $em->remove($equipe);
        $em->flush();


        return $this->redirect($this->generateUrl('equipe_list'));

    }



}