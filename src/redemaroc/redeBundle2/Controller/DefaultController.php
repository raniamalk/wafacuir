<?php

namespace redemaroc\redeBundle\Controller;

use redemaroc\redeBundle\Entity\presentation;
use redemaroc\redeBundle\Entity\home;
use redemaroc\redeBundle\Entity\avis;
use redemaroc\redeBundle\Form\avisType;
use redemaroc\redeBundle\Entity\upload;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Entity\produit;
use redemaroc\redeBundle\Entity\type;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\BrowserKit\Response;


class DefaultController extends Controller
{

    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:refer');
        $refer = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();


        return $this->render('redeBundle:FrontViews:index.html.twig', array('home'=>$home, 'refer'=>$refer, 'type'=>$type));
    }

    public function presentationAction()
    {

        $repository = $this->getDoctrine()->getRepository('redeBundle:presentation');
        $presentation = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();
        return $this->render('redeBundle:FrontViews:presentation.html.twig', array('home'=>$home, 'presentation'=>$presentation));
    }

    public function produitAction( $id,produit $produit, Request $request)
    {
        $em =$this->getDoctrine()->getManager();
        $produit=$em->getRepository('redeBundle:produit')->find($id);

         $avis = new avis();
        /* $idprod = $request->request->get('idprod');*/

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
        $avis=$em->getRepository('redeBundle:avis')->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:produit.html.twig', array('home'=>$home,'form'=>$formView,'produit'=>$produit, 'avis'=>$avis));
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
        $repository = $this->getDoctrine()->getRepository('redeBundle:produit');
        $produit = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:galerie.html.twig', array('produit'=>$produit, 'home'=>$home));
    }

    public function referencesAction()
    {

        $repository = $this->getDoctrine()->getRepository('redeBundle:refer');
        $refer = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:references.html.twig', array('home'=>$home, 'refer'=>$refer));
    }

    public function devisAction()
    {
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:devis.html.twig', array('home'=>$home,));
    }


    public function boAction()
    {
        return $this->render('redeBundle:BackViews:index.html.twig');
    }


  /*  public function menuAction(){

        $em =$this->getDoctrine()->getManager();

        $cf=$em->getRepository('redeBundle:produit')->coupefeu();
        $pm=$em->getRepository('redeBundle:produit')->Portemetalliques();
        $mm=$em->getRepository('redeBundle:produit')->Menuiseriemetallique();
        $pa=$em->getRepository('redeBundle:produit')->Porteacoustiques();
        $pb=$em->getRepository('redeBundle:produit')->Porteblindees();
        $ca=$em->getRepository('redeBundle:produit')->Controlesdacces();
        $s=$em->getRepository('redeBundle:produit')->Signaletique();

        return $this->render('redeBundle:FrontViews:Menu.html.twig'
            ,array('cf'=>$cf,'pm'=>$pm,'mm'=>$mm,'pa'=>$pa,'pb'=>$pb,'ca'=>$ca,'s'=>$s));

    }*/

    public function firstlevelAction (){

        $repository = $this->getDoctrine()->getRepository('redeBundle:type');
        $type = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:produit');
        $produit = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:slider');
        $slider = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:menu.html.twig', array('home'=>$home,'type'=>$type,'produit'=>$produit,'slider'=>$slider));

    }

    public function rechercheAction(){

        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        return $this->render('redeBundle:FrontViews:recherche.html.twig', array('home'=>$home,));

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



        return $this->render('redeBundle:FrontViews:result.html.twig',array('produit'=>$produit, 'home'=>$home, 'refer'=>$refer));

    }


    public function documentationAction(Request $request)
    {

        $repository = $this->getDoctrine()->getRepository('redeBundle:upload');
        $upload = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();

        $em =$this->getDoctrine()->getManager();
        $motcle=$request->get('motcle');
        $produit=$em->getRepository('redeBundle:produit')->findBy(array('titre' => $motcle));

        return $this->render('redeBundle:FrontViews:documentation.html.twig', array('home'=>$home,'upload'=>$upload, 'produit'=>$produit));
    }


    public function panierAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier')) $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('redeBundle:produit')->findArray(array_keys($session->get('panier')));

        return $this->render('redeBundle:FrontViews:panier.html.twig', array('produits' => $produits,
            'panier' => $session->get('panier')));
    }


    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();
        /*$produits = $em->getRepository('redeBundle:devis')->find(5);*/
        $produits = $em->getRepository('redeBundle:devis')->findAll();

        $test = $em->getRepository('redeBundle:devis')->findAll();

        $repository = $this->getDoctrine()->getRepository('redeBundle:home');
        $home = $repository->findAll();


        return $this->render('redeBundle:FrontViews:test.html.twig', array('home'=>$home, 'produits' => $produits, 'test'=>$test));
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

        return $this->redirect($this->generateUrl('rede_homepage'));
        /*return $this->redirect($this->generateUrl('produit_page', array('id'=>$id)));*/
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

}
