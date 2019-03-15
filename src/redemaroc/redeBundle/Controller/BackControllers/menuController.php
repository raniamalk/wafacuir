<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller\BackControllers;


use redemaroc\redeBundle\Entity\menu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\menuType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class menuController extends Controller
{

    public function addAction(Request $request){


        $menu = new menu();
        $form = $this->createForm(new menuType(), $menu);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush();

            return $this->redirect($this->generateUrl('menu_list'));
        }

        $formView=$form->createView();

        return $this->render('redeBundle:BackViews:menu/menuAdd.html.twig', array('form'=>$formView));

    }


    public function listAction (){


            $repository = $this->getDoctrine()->getRepository('redeBundle:menu');
            $menu = $repository->findAll();

            return $this->render('redeBundle:BackViews:menu/menuList.html.twig', array('menu'=>$menu));



    }

    public function editAction(Request $request, menu $menu, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new menuType(),$menu);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){
            $em->flush();


            return $this->redirect($this->generateUrl('menu_list'));

        }


        return $this->render('redeBundle:BackViews:menu/menuEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }



    public function deleteAction(menu $menu){

        $em = $this->getDoctrine()->getManager();
        $em->remove($menu);
        $em->flush();


        return $this->redirect($this->generateUrl('menu_list'));

    }



}