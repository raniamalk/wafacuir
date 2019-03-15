<?php

namespace redemaroc\redeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class contactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'required' => false ))
            ->add('raisonsocial', 'text', array(
                'required' => false ))
            ->add('adresse', 'text', array(
                'required' => false ))
            ->add('domaineactivite', 'text', array(
                'required' => false ))
            ->add('telephone', 'text', array(
                'required' => true ))
            ->add('email', 'text', array(
                'required' => true ))
            ->add('objet', 'text', array(
                'required' => false ))
            ->add('message', 'textarea', array(
                'required' => true ))
            /*->add('file', 'file', array(
                'label' => 'Document',
                'required'    => false ))*/
            ->add('publish', 'checkbox', array('required' => false, 'label'=> 'validé'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\contact'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_contact';
    }
}
