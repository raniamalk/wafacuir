<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\souscategorie;
use redemaroc\redeBundle\Entity\type;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\souscategorieType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class souscategorieController extends Controller
{

    public function addAction(Request $request){

        $souscategorie = new souscategorie();
        $form = $this->createForm(new souscategorieType(), $souscategorie);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();

            /*var_dump($souscategorie);
            die('ici');*/

            $em->persist($souscategorie);
            $em->flush();

            return $this->redirect($this->generateUrl('souscategorie_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:souscategorie/souscategorieAdd.html.twig', array('form'=>$formView));

    }


//    public function addAction(Request $request){
//
//
//        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
//        $type = $repository->findAll();
//
//        if($request->isMethod('post')) {
//
//            $souscategorie = new souscategorie();
//
//
//            $em        = $this->getDoctrine()->getManager();
//
//
//            $type     = $request->request->get('type');
//            $entities  = $em->getRepository('redeBundle:type')->find($type);
//
//            $t     =   $request->request->get('souscategorie');
//
//
//
//
//            $souscategorie->setsouscategorie($t);
//            $souscategorie->settype($entities);
//
//
//
//            $em->persist($souscategorie);
//            $em->flush();
//
//
//
//            return $this->redirect($this->generateUrl('souscategorie_list'));
//
//        }
//
//        return $this->render('redeBundle:BackViews:souscategorie/souscategorieadd.html.twig',array('type'=>$type));
//
//    }


    public function listAction ( ){


            $repository = $this->getDoctrine()->getRepository('redeBundle:souscategorie');
            $souscategorie = $repository->findAll();

            return $this->render('redeBundle:BackViews:souscategorie/souscategorieList.html.twig', array('souscategorie'=>$souscategorie));



    }



    public function editAction(Request $request,souscategorie $souscategorie,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new souscategorieType(),$souscategorie);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){

            $em->flush();


            return $this->redirect($this->generateUrl('souscategorie_list'));

        }


        return $this->render('redeBundle:BackViews:souscategorie/souscategorieEdit.html.twig',array('form'=>$formView,'id'=>$id));


    }


//    public function editAction(Request $request,souscategorie $souscategorie,$id)
//    {
//
//
//        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
//        $types = $repository->findAll();
//        /*$types = $repository->findBy(array(
//            'type'=> $id
//        ));*/
//
//        $em = $this->getDoctrine()->getManager();
//        $entity= $em->getRepository('redeBundle:souscategorie')->find($id);
//
//
//        if($request->isMethod('post')) {
//
//
//
//                $t = $request->request->get('souscategorie');
//                $m = $request->request->get('type');
//                $entities = $em->getRepository('redeBundle:type')->find($m);
//
//                $entity->settype($entities);
//                $entity->setsouscategorie($t);
//
//
//
//
//            $em->persist($entity);
//            $em->flush();
//
//            return $this->redirect($this->generateUrl('souscategorie_list'));
//
//        }
//        return $this->render('redeBundle:BackViews:souscategorie/souscategorieEdit.html.twig',array('id'=>$id,'entity'=>$entity,'types'=>$types));
//
//
//
//
//    }



    public function deleteAction(souscategorie $souscategorie){

        $em = $this->getDoctrine()->getManager();
        $em->remove($souscategorie);
        $em->flush();


        return $this->redirect($this->generateUrl('souscategorie_list'));

    }





}