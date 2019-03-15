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


/*

            $text='Bonjour <br><br>Je vous prie de nous envoyé le devis des produits selectionnés<br><br>
            En attendant votre retour, veuillez agréer nos sincères salutations <br><br>
            Bien cordialement';

            $to = "ranyamalk@gmail.com";
            $from      = $e;
            $subject   = "Demande devis";
            $message   = "<p>.$text.</p>";
            $separator = md5(time());
            $eol       = PHP_EOL;

            $headers = "From: " . $e . $eol;
            $headers .= "MIME-Version: 1.0" . $eol;
            $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;


            $body = "Content-Transfer-Encoding: 7bit" . $eol;
            $body .= "This is a MIME encoded message." . $eol; //had one more .$eol*/

            /*
            var_dump($n);
            die('stop');*/




            $mailer = $this->container->get('mailer');
            $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
                ->setUsername('ranyamalk@gmail.com')
                ->setPassword('raniagmail');
            $mailer=\Swift_Mailer::newInstance($transport);
            $d=\Swift_Message::newInstance('test mail')
                ->setSubject('demande devis')
                ->setFrom($e)
                ->setTo('ranyamalk@gmail.com')
                ->setBody($d);
            $this->get('mailer')->send($d);




            /*$message = (new \Swift_Message('Hello Email'))
                ->setFrom('send@example.com')
                ->setTo('ranyamalk@gmail.com')
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        'FrontViews/registration.html.twig'),
                    'text/html'
                )

            ;

            $this->get('mailer')->send($message);*/




            $em->persist($devis);
            $em->flush();

            /*if($e){
                $la = mail($to, utf8_decode($subject), utf8_decode($message), utf8_decode($body), $headers);

            }*/






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