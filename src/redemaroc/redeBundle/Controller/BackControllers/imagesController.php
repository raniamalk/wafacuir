<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\images;
use redemaroc\redeBundle\Entity\avis;
use redemaroc\redeBundle\Form\avisType;
use redemaroc\redeBundle\Form\imagesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class imagesController extends Controller
{

    public function addAction(Request $request){


        $images = new images();
        $images->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(new imagesType(), $images);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $images->upload();
            $em->persist($images);
            $em->flush();

            return $this->redirect($this->generateUrl('images_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:images/imagesAdd.html.twig', array('form'=>$formView));
    }


    public function ListAction(){


        $repository=$this->getDoctrine()->getRepository('redeBundle:images');
        $images=$repository->findAll();

        return $this->render('redeBundle:BackViews:images/imagesList.html.twig',array('images'=>$images));

    }


    public function deleteAction(images $images){

        $em = $this->getDoctrine()->getManager();
        $em->remove($images);
        $em->flush();

        return $this->redirect($this->generateUrl('images_list'));

    }


    public function editAction(Request $request,images $images,$id)
    {

        $images->setUpdateddAt(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new imagesType(),$images);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $images->upload();
            $em->flush();


            return $this->redirect($this->generateUrl('images_list'));

        }


        return $this->render('redeBundle:BackViews:images/imagesEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }











}