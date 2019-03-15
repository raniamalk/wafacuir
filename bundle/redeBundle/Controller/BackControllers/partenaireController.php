<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\partenaire;
use redemaroc\redeBundle\Form\partenaireType;
use redemaroc\redeBundle\Form\produitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class partenaireController extends Controller
{

    public function addAction(Request $request){


        $partenaire = new partenaire();
        $form = $this->createForm(new partenaireType(), $partenaire);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $partenaire->upload();

            $em->persist($partenaire);
            $em->flush();

            return $this->redirect($this->generateUrl('partenaire_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:partenaire/partenaireAdd.html.twig', array('form'=>$formView));
    }


    public function ListAction(){


        $repository=$this->getDoctrine()->getRepository('redeBundle:partenaire');
        $partenaire=$repository->findAll();

        return $this->render('redeBundle:BackViews:partenaire/partenaireList.html.twig',array('partenaire'=>$partenaire));

    }


    public function deleteAction(partenaire $partenaire){

        $em = $this->getDoctrine()->getManager();
        $em->remove($partenaire);
        $em->flush();

        return $this->redirect($this->generateUrl('partenaire_list'));

    }


    public function editAction(Request $request,partenaire $partenaire,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new partenaireType(),$partenaire);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $partenaire->upload();

            $em->flush();


            return $this->redirect($this->generateUrl('partenaire_list'));

        }


        return $this->render('redeBundle:BackViews:partenaire/partenaireEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }








}