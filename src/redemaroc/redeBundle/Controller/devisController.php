<?php
/**
 * Created by PhpStorm.
 * User: r.malk
 * Date: 07/11/2018
 * Time: 11:20
 */
namespace redemaroc\redeBundle\Controller;


use redemaroc\redeBundle\Entity\devis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use redemaroc\redeBundle\Form\devisType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class devisController extends Controller
{


    public function AddAction(Request $request)
    {

        $session = $this->getRequest()->getSession();
        if (!$session->has('panier')) $session->set('panier', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('redeBundle:produit')->findArray(array_keys($session->get('panier')));


        if ($request->isMethod('post')) {


            $devis = new devis();

            $em = $this->getDoctrine()->getManager();

            $session = $this ->getRequest()->getSession();
            $panier = $session->get('panier');

            $n = $request->request->get('nom');
            $rs = $request->request->get('raisonsocial');
            $ad = $request->request->get('adresse');
            $da = $request->request->get('domaineactivite');
            $e = $request->request->get('email');
            $t = $request->request->get('telephone');
            $d = $request->request->get('demande');


            $devis->setPanier($panier);
            $devis->setNom($n);
            $devis->setRaisonsocial($rs);
            $devis->setAdresse($ad);
            $devis->setDomaineactivite($da);
            $devis->setEmail($e);
            $devis->setTel($t);
            $devis->setDemande($d);
            $devis->setCreatedAt(new \DateTime());


            $em->persist($devis);
            $em->flush();


            $mailer = $this->container->get('mailer');
            $transport = \Swift_SmtpTransport::newInstance('gmail.com', 465, 'ssl')
                ->setUsername('backoffice.redemaroc@gmail.com')
                ->setPassword('redegmail');
            $mailer=\Swift_Mailer::newInstance($transport);
            $d=\Swift_Message::newInstance('test mail')
                ->setSubject('demande devis')
                ->setFrom($e)
                ->setTo('commercial@redemaroc.com')
                ->setCc('dg@redemaroc.com')
                ->setReplyTo($e)
                ->setBody('<html>' .
                    ' <body>' .
                    '  Bonjour, <br>' . $d . '<br> <br> <br>' .
                    '  La liste des produits avec leurs references est presente sur votre backoffice <a href="http://portes-automatisme-redemaroc.com/admin/devis/edit/$id">Devis</a>' .
                    '<br><br> cordialement.<br>'.
                    $n .
                    '<br>' .
                    $rs .
                    ' </body>' .
                    '</html>',
                    'text/html')
            ;

            $this->get('mailer')->send($d);


            $this->getRequest()->getSession()->clear();

            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succès');

            return $this->redirect($this->generateUrl('devis_page'));

    }

        return $this->render('redeBundle:FrontViews:devisAdd.html.twig', array('produits' => $produits, 'panier' => $session->get('panier')));
    }




    public function listAction (Request $request){



            $repository = $this->getDoctrine()->getRepository('redeBundle:devis');
            $devis = $repository->findAll();

            return $this->render('redeBundle:BackViews:devis/devisList.html.twig', array('devis'=>$devis));

            /*var_dump($devis);
            die();*/

    }

    public function editAction(Request $request,devis $devis,$id)
    {

        $devis->setUpdateddAt(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(new devisType(),$devis);

        $form->handleRequest($request);
        $formView = $form->createView();


        if($form->isSubmitted()){

            $em->flush();


            return $this->redirect($this->generateUrl('devis_list'));

        }


        return $this->render('redeBundle:BackViews:devis/devisEdit.html.twig',array('form'=>$formView,'ids'=>$id));


    }



    public function deleteAction(devis $devis){

        $em = $this->getDoctrine()->getManager();
        $em->remove($devis);
        $em->flush();

        return $this->redirect($this->generateUrl('devis_list'));

    }



}