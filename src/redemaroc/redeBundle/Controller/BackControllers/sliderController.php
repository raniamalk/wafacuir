<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\slider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\sliderType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class sliderController extends Controller
{

    public function addAction(Request $request){


        $slider = new slider();
        $form = $this->createForm(new sliderType(), $slider);

        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager(); /*var_dump($slider);die('here');*/
            $slider->upload();

            $em->persist($slider);
            $em->flush();

            return $this->redirect($this->generateUrl('slider_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:slider/sliderAdd.html.twig', array('form'=>$formView));

    }


    public function listAction (){

            $repository = $this->getDoctrine()->getRepository('redeBundle:slider');
            $slider = $repository->findAll();

            return $this->render('redeBundle:BackViews:slider/sliderList.html.twig', array('slider'=>$slider));

    }

    public function editAction(Request $request,slider $slider,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new sliderType(),$slider);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $slider->upload();
            $em->flush();


            return $this->redirect($this->generateUrl('slider_list'));

        }


        return $this->render('redeBundle:BackViews:slider/sliderEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }



    public function deleteAction(slider $slider){

        $em = $this->getDoctrine()->getManager();
        $em->remove($slider);
        $em->flush();


        return $this->redirect($this->generateUrl('slider_list'));

    }



}