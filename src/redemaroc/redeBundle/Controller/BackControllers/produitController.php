<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\produit;
use redemaroc\redeBundle\Entity\avis;
use redemaroc\redeBundle\Form\avisType;
use redemaroc\redeBundle\Form\produitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class produitController extends Controller
{

    public function addAction(Request $request){


        $produit = new produit();
        $produit->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(new produitType(), $produit);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $produit->upload();
            $produit->uploada();
            $produit->uploadb();
            $produit->uploadc();
            $produit->uploadd();
            $produit->uploade();
            $em->persist($produit);
            $em->flush();

            return $this->redirect($this->generateUrl('produit_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:produit/produitAdd.html.twig', array('form'=>$formView));
    }


    public function ListAction(){


        $repository=$this->getDoctrine()->getRepository('redeBundle:produit');
        $produit=$repository->findAll();

        return $this->render('redeBundle:BackViews:produit/produitList.html.twig',array('produit'=>$produit));

    }


    public function deleteAction(produit $produit){

        $em = $this->getDoctrine()->getManager();
        $em->remove($produit);
        $em->flush();

        return $this->redirect($this->generateUrl('produit_list'));

    }


    public function editAction(Request $request,produit $produit,$id)
    {

        $produit->setUpdateddAt(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new produitType(),$produit);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $produit->upload();
            $produit->uploada();
            $produit->uploadb();
            $produit->uploadc();
            $produit->uploadd();
            $produit->uploade();
            $em->flush();


            return $this->redirect($this->generateUrl('produit_list'));

        }


        return $this->render('redeBundle:BackViews:produit/produitEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }


    public function avisaddAction(Request $request,$id){
        $em =$this->getDoctrine()->getManager();
        $produit=$em->getRepository('redeBundle:Produit')->find($id);

        if(!$produit){
            throw $this->createNotFoundException('ce produit n\'existe pas');

        }
        //pour inserer un avis

        $avis=new avis();
        $avis->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(new avisType(), $avis);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $avis->setProduit($produit);
            $em->persist($avis);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success','Votre avis a été avec succès!');
            return $this->redirect($this->generateUrl('page_produit',array('id'=>$id)));
        }

        return $this->render('redeBundle:FrontViews:avisAdd.html.twig'
            ,array('produit'=>$produit,'form'=>$form->createView()
                )
        );
    }








}