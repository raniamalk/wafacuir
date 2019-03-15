<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\home;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\homeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class homeController extends Controller
{

    public function addAction(Request $request){


        $home = new home();
        $form = $this->createForm(new homeType(), $home);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($home);
            $em->flush();

            return $this->redirect($this->generateUrl('home_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:home/homeAdd.html.twig', array('form'=>$formView));

    }


    public function listAction (){


            $repository = $this->getDoctrine()->getRepository('redeBundle:home');
            $home = $repository->findAll();

            return $this->render('redeBundle:BackViews:home/homeList.html.twig', array('home'=>$home));



    }

    public function editAction(Request $request, home $home, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new homeType(),$home);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $em->flush();


            return $this->redirect($this->generateUrl('home_list'));

        }


        return $this->render('redeBundle:BackViews:home/homeEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }



    public function deleteAction(home $home){

        $em = $this->getDoctrine()->getManager();
        $em->remove($home);
        $em->flush();


        return $this->redirect($this->generateUrl('home_list'));

    }



}