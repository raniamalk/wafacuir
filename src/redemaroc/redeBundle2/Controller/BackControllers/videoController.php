<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\videoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class videoController extends Controller
{

    public function addAction(Request $request){


        $video = new video();
        $form = $this->createForm(new videoType(), $video);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();

            return $this->redirect($this->generateUrl('video_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:video/videoAdd.html.twig', array('form'=>$formView));

    }


    public function listAction (){

            $repository = $this->getDoctrine()->getRepository('redeBundle:video');
            $video = $repository->findAll();

            return $this->render('redeBundle:BackViews:video/videoList.html.twig', array('video'=>$video));

    }

    public function editAction(Request $request,video $video,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new videoType(),$video);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $em->flush();


            return $this->redirect($this->generateUrl('video_list'));

        }


        return $this->render('redeBundle:BackViews:video/videoEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }



    public function deleteAction(video $video){

        $em = $this->getDoctrine()->getManager();
        $em->remove($video);
        $em->flush();


        return $this->redirect($this->generateUrl('video_list'));

    }



}