<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\upload;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\uploadType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class uploadController extends Controller
{

    public function addAction(Request $request){


        $upload = new upload();
        $form = $this->createForm(new uploadType(), $upload);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $upload->upload();

            $em->persist($upload);
            $em->flush();

            return $this->redirect($this->generateUrl('upload_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:upload/uploadAdd.html.twig', array('form'=>$formView));

    }


    public function listAction (){


            $repository = $this->getDoctrine()->getRepository('redeBundle:upload');
            $upload = $repository->findAll();

            return $this->render('redeBundle:BackViews:upload/uploadList.html.twig', array('upload'=>$upload));

    }

    public function editAction(Request $request,upload $upload,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new uploadType(),$upload);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $upload->upload();
            $em->flush();


            return $this->redirect($this->generateUrl('upload_list'));

        }


        return $this->render('redeBundle:BackViews:upload/uploadEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }



    public function deleteAction(upload $upload){

        $em = $this->getDoctrine()->getManager();
        $em->remove($upload);
        $em->flush();


        return $this->redirect($this->generateUrl('upload_list'));

    }



}