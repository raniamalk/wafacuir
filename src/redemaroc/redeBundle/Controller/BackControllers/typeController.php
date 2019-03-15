<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\type;
use redemaroc\redeBundle\Entity\menu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\typeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class typeController extends Controller
{

    public function addAction(Request $request){


        $type = new type();
        $form = $this->createForm(new typeType(), $type);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            /*$presentation->getPath()->upload();*/
            $em = $this->getDoctrine()->getManager();

            /*var_dump($presentation);
            die('ici');*/

            $em->persist($type);
            $em->flush();

            return $this->redirect($this->generateUrl('type_add'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:type/typeAdd.html.twig', array('form'=>$formView));

    }


//    public function addAction(Request $request){
//
//
//        $repository = $this->getDoctrine()->getRepository('redeBundle:menu');
//        $menu = $repository->findAll();
//
//        if($request->isMethod('post')) {
//
//            $type = new type();
//
//
//            $em        = $this->getDoctrine()->getManager();
//
//
//            $menu     = $request->request->get('menu');
//            $entities  = $em->getRepository('redeBundle:menu')->find($menu);
//
//            $t     =   $request->request->get('type');
//
//
//
//
//            $type->setType($t);
//            $type->setMenu($entities);
//
//
//
//            $em->persist($type);
//            $em->flush();
//
//
//
//            return $this->redirect($this->generateUrl('type_list'));
//
//        }
//
//        return $this->render('redeBundle:BackViews:type/typeadd.html.twig',array('menu'=>$menu));
//
//    }


    public function listAction (){


            $repository = $this->getDoctrine()->getRepository('redeBundle:type');
            $type = $repository->findAll();

            return $this->render('redeBundle:BackViews:type/typeList.html.twig', array('type'=>$type));



    }

    public function editAction(Request $request,type $type,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new typeType(),$type);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){

            $em->flush();


            return $this->redirect($this->generateUrl('type_list'));

        }


        return $this->render('redeBundle:BackViews:type/typeEdit.html.twig',array('form'=>$formView,'id'=>$id));


    }


//    public function editAction(Request $request,type $type,$id)
//    {
//
//        $em = $this->getDoctrine()->getManager();
//        $entity= $em->getRepository('redeBundle:type')->find($id);
//
//        $repository = $this->getDoctrine()->getRepository('redeBundle:menu');
//        $menus = $repository->findAll();
//        /*$menus = $repository->findBy(array(
//            'menu'=> $id
//        ));*/
//
//
//        if($request->isMethod('post')) {
//
//
//
//                $t = $request->request->get('type');
//                $m = $request->request->get('menu');
//                $entities = $em->getRepository('redeBundle:menu')->find($m);
//
//                $entity->setMenu($entities);
//                $entity->setType($t);
//
//
//
//
//            $em->persist($entity);
//            $em->flush();
//
//            return $this->redirect($this->generateUrl('type_list'));
//
//        }
//        return $this->render('redeBundle:BackViews:type/typeEdit.html.twig',array('id'=>$id,'entity'=>$entity,'menus'=>$menus));
//    }



    public function deleteAction(type $type){

        $em = $this->getDoctrine()->getManager();
        $em->remove($type);
        $em->flush();


        return $this->redirect($this->generateUrl('type_list'));

    }





}