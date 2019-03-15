<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\refer;
use redemaroc\redeBundle\Form\referType;
use redemaroc\redeBundle\Form\produitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class referController extends Controller
{

    public function addAction(Request $request){


        $refer = new refer();
        $form = $this->createForm(new referType(), $refer);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $refer->upload();
            $refer->uploada();
            $refer->uploadb();
            $refer->uploadc();
            $refer->uploadd();
            $refer->uploade();
            $em->persist($refer);
            $em->flush();

            return $this->redirect($this->generateUrl('refer_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:refer/referAdd.html.twig', array('form'=>$formView));
    }


    public function ListAction(){


        $repository=$this->getDoctrine()->getRepository('redeBundle:refer');
        $refer=$repository->findAll();

        return $this->render('redeBundle:BackViews:refer/referList.html.twig',array('refer'=>$refer));

    }


    public function deleteAction(refer $refer){

        $em = $this->getDoctrine()->getManager();
        $em->remove($refer);
        $em->flush();

        return $this->redirect($this->generateUrl('refer_list'));

    }


    public function editAction(Request $request,refer $refer,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new referType(),$refer);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $refer->upload();
            $refer->uploada();
            $refer->uploadb();
            $refer->uploadc();
            $refer->uploadd();
            $refer->uploade();
            $em->flush();


            return $this->redirect($this->generateUrl('refer_list'));

        }


        return $this->render('redeBundle:BackViews:refer/referEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }








}