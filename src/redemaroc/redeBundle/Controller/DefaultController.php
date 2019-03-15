<?php

namespace redemaroc\redeBundle\Controller;

use redemaroc\redeBundle\Entity\presentation;
use redemaroc\redeBundle\Entity\home;
use redemaroc\redeBundle\Entity\avis;
use redemaroc\redeBundle\Entity\refer;
use redemaroc\redeBundle\Entity\partenaire;
use redemaroc\redeBundle\Form\avisType;
use redemaroc\redeBundle\Entity\upload;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Entity\produit;
use redemaroc\redeBundle\Entity\type;
use redemaroc\redeBundle\Entity\equipe;
use redemaroc\redeBundle\Form\equipeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\BrowserKit\Response;
use redemaroc\redeBundle;


class DefaultController extends Controller
{

    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:refer');
        $refer = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:partenaire');
        $partenaire = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:menu');
        $menu = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:souscategorie');
        $souscategorie = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:slider');
        $slider = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:produit');
        $produit = $repository->findAll(6);


        return $this->render('redeBundle:FrontViews:index.html.twig', array('home'=>$home, 'refer'=>$refer, 'partenaire'=>$partenaire, 'type'=>$type, 'slider'=> $slider, 'souscategorie'=>$souscategorie, 'menu'=>$menu, 'produit'=>$produit));
    }

    public function presentationAction()
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:menu');
        $menu = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:presentation');
        $presentation = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:equipe');
        $equipe = $repository->findAll();

        return $this->render('redeBundle:FrontViews:presentation.html.twig', array('home'=>$home,'presentation'=>$presentation,'type'=>$type,'equipe'=>$equipe,'menu'=>$menu));
    }

    /*public function produitAction( $id,produit $produit, Request $request)
    {
        $em =$this->getDoctrine()->getManager();
        $produit=$em->getRepository('redeBundle:produit')->find($id);


        $avis = new avis();


        $avis->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(new avisType(), $avis);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $avis->setProduit($produit);
            $em =$this->getDoctrine()->getManager();
            $em->persist($avis);
            $em->flush();
            return $this->redirect($this->generateUrl('produit_page', array('id'=>$id)));
        }

        $formView=$form->createView();
        $avis=$em->getRepository('redeBundle:avis')->findBy( array('produit' => $id));

        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();


        return $this->render('redeBundle:FrontViews:produit.html.twig', array('home'=>$home, 'form'=>$formView,'produit'=>$produit, 'avis'=>$avis, 'type'=>$type));
    }*/

    public function produitAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:menu');
        $menu = $repository->findAll();


        $em =$this->getDoctrine()->getManager();
        $produit=$em->getRepository('redeBundle:produit')->find($id);


        return $this->render('redeBundle:FrontViews:produit.html.twig', array('produit'=>$produit, 'id'=>$id, 'menu'=>$menu));
    }

    public function catalogueAction()
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:produit');
        $produit = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();


        return $this->render('redeBundle:FrontViews:catalogue.html.twig', array('home'=>$home, 'type'=>$type,'produit'=>$produit));
    }

    public function galerieAction()
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:images');
        $images = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:video');
        $video = $repository->findAll();
        return $this->render('redeBundle:FrontViews:galerie.html.twig', array('home'=>$home, 'images'=>$images, 'type'=>$type, 'video'=>$video));
    }

    public function referencesAction()
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:refer');
        $refer = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:references.html.twig', array('home'=>$home, 'refer'=>$refer, 'type'=>$type));
    }



    public function referAction( $id,refer $refer, Request $request)
    {
        $em =$this->getDoctrine()->getManager();
        $refer=$em->getRepository('redeBundle:refer')->find($id);


        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();


        return $this->render('redeBundle:FrontViews:refer.html.twig', array('home'=>$home, 'refer'=>$refer, 'type'=>$type));
    }

    public function devisAction()
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:devis.html.twig', array('home'=>$home, 'type'=>$type));
    }


    public function boAction()
    {
        return $this->render('redeBundle:BackViews:index.html.twig');
    }


    public function firstlevelAction (){


        $repository = $this->getDoctrine()->getRepository('redeBundle:produit');
        $produit = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:slider');
        $slider = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:menu.html.twig', array('home'=>$home, 'type'=>$type,'produit'=>$produit,'slider'=>$slider));

    }

    public function rechercheAction(){

        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:recherche.html.twig', array('home'=>$home, 'type'=>$type));

    }

    public function resultAction(Request $request){

        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:refer');
        $refer = $repository->findAll();
        $em =$this->getDoctrine()->getManager();
        $motcle=$request->get('motcle');
        /*$produit*/ $repository=$em->getRepository('redeBundle:produit');/*->findBy(array('titre' => $motcle));*/

        $query = $repository->createQueryBuilder('p')
            ->where('p.titre like :titre')
            ->setParameter('titre', '%'.$motcle.'%')
            ->orderBy('p.titre', 'ASC')
            ->getQuery();

        $produit = $query->getResult();

        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();




        return $this->render('redeBundle:FrontViews:result.html.twig',array('produit'=>$produit, 'home'=>$home, 'refer'=>$refer, 'type'=>$type));

    }


    public function documentationAction(Request $request)
    {

        $repository = $this->getDoctrine()->getRepository('redeBundle:upload');
        $upload = $repository->findAll();

        $em =$this->getDoctrine()->getManager();
        $motcle=$request->get('motcle');
        $produit=$em->getRepository('redeBundle:produit')->findBy(array('titre' => $motcle));

        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:documentation.html.twig', array('home'=>$home, 'upload'=>$upload, 'produit'=>$produit, 'type'=>$type));
    }


    public function panierAction()
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier')) $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('redeBundle:produit')->findArray(array_keys($session->get('panier')));

        return $this->render('redeBundle:FrontViews:panier.html.twig', array('produits' => $produits, 'type'=>$type,
            'panier' => $session->get('panier')));
    }


    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();
        /*$produits = $em->getRepository('redeBundle:devis')->find(5);*/
        $produits = $em->getRepository('redeBundle:devis')->findAll();

        $test = $em->getRepository('redeBundle:devis')->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();


        return $this->render('redeBundle:FrontViews:test.html.twig', array('home'=>$home, 'produits' => $produits, 'test'=>$test, 'type'=>$type));
    }


    public function supprimerAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
            /* $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');*/
        }

        /* return $this->redirect($this->generateUrl('rede_homepage#panier-bar'));*/


        return $this->redirect($this->generateUrl('produit_page', array('id'=>$id)));
    }


    public function ajouterAction($id, Request $request)
    {

        $session = $this->getRequest()->getSession();
        $ref = $this->getRequest()->query->get('ref');
        $tit = $this->getRequest()->query->get('tit');


        if (!$session->has('panier')) $session->set('panier',array());
        $panier = $session->get('panier');

        /*print_r($panier);

        die('here');*/

        /*  if (array_key_exists($id, $panier)) {

              $panier[$id] = $this->getRequest()->query->get('ref');*/

        /*if ($this->getRequest()->query->get('qte') != null) $panier[$id] = $this->getRequest()->query->get('qte');*/
        /*$qte = $this->getRequest()->query->get('qte');


        $bar=array();
        $bar=array('qte'=>$qte,'ref'=>$ref);

        $panier[$id] = $bar;


    } else {*/

        if ($this->getRequest()->query->get('qte') != null){
            $panier[$id] = $this->getRequest()->query->get('ref');
            $qte = $this->getRequest()->query->get('qte');
            $tit = $this->getRequest()->query->get('tit');


            $bar=array();
            $bar=array('qte'=>$qte,'ref'=>$ref,'tit'=>$tit );

            $panier[$id] = $bar;

            /*$panier[$id] = $this->getRequest()->query->get('qte');*/

        }

        /* else

             $bar=array();
         $bar=array('qte'=>1,'ref'=>$ref);

         $panier[$id] = $bar;*/

        /*$this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');*/
        /*}*/

        $session->set('panier',$panier);

        /*$devis = $request->request->get('ref');*/

        /*print_r($panier);die('la');*/


        /*return $this->redirect($this->generateUrl('rede_homepage'));*/
        return $this->redirect($this->generateUrl('produit_page', array('id'=>$id)));
    }

    public function souscategorieAction($id)
    {

        $repository = $this->getDoctrine()->getRepository('redeBundle:menu');
        $menu = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:slider');
        $slider = $repository->findAll();

        /*$repository = $this->getDoctrine()->getRepository('redeBundle:souscategorie');*/
        /*$souscategorie = $repository->findAll();*/
        /*$souscategorie = $repository->findBy($id);*/
/*

        $query=$em->createQuery('select a from redeBundle:souscategorie a where a.produit = :id ')
            ->setParameter("id", $id);
        $souscategorie = $query->getResult();*/

        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('redeBundle:produit')->createQueryBuilder('p')
            ->where('p.souscategorie = :id')
            ->setParameter('id', $id)
            /*->leftJoin('p.id', 'sylius_product_translation')*/
           /* ->leftJoin(ProductTranslation::class, 't', 'WITH', 't.id = p.id')*/
            ->getQuery()->getResult();





        return $this->render('redeBundle:FrontViews:catalogue.html.twig', array('produit'=>$produit, 'id'=>$id, 'menu'=>$menu,'type'=>$type, 'slider'=>$slider));
    }

    public function allprodtuctsAction()
    {


        $repository = $this->getDoctrine()->getRepository('redeBundle:menu');
        $menu = $repository->findAll();

        /*$repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:souscategorie');
        $souscategorie = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:slider');
        $slider = $repository->findAll();*/

        $repository = $this->getDoctrine()->getRepository('redeBundle:produit');
        $produit = $repository->findAll();


        return $this->render('redeBundle:FrontViews:allproducts.html.twig', array(/*'type'=>$type, 'slider'=> $slider, 'souscategorie'=>$souscategorie,*/ 'menu'=>$menu, 'produit'=>$produit));
    }

}
