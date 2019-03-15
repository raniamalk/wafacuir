<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller;


use redemaroc\redeBundle\Entity\contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\contactType;
use Symfony\Component\HttpFoundation\Request;


class contactController extends Controller
{

    public function addAction(Request $request){


        $contact = new contact();
        $contact->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(new contactType(), $contact);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $contact->upload();
            $em->persist($contact);
            $em->flush();
            return $this->redirect($this->generateUrl('rede_homepage'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:FrontViews:contactAdd.html.twig', array('form'=>$formView));

    }


    public function listAction (){


            $repository = $this->getDoctrine()->getRepository('redeBundle:contact');
            $contact = $repository->findAll();

            return $this->render('redeBundle:BackViews:contact/contactList.html.twig', array('contact'=>$contact));



    }

    public function editAction(Request $request,contact $contact,$id)
    {

        $contact->setUpdatedAt(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new contactType(),$contact);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $contact->upload();
            $em->flush();


            return $this->redirect($this->generateUrl('contact_list'));

        }


        return $this->render('redeBundle:BackViews:contact/contactEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }


    public function deleteAction(contact $contact){

        $em = $this->getDoctrine()->getManager();
        $em->remove($contact);
        $em->flush();


        return $this->redirect($this->generateUrl('contact_list'));

    }



}