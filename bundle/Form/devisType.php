<?php

namespace redemaroc\redeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class devisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                'required' => true ))
            ->add('raisonsocial', 'text', array(
                'required' => true ))
            ->add('adresse', 'text', array(
                'required' => true ))
            ->add('domaineactivite', 'text', array(
                'required' => true ))
            ->add('email', 'text', array(
                'required' => true ))
            ->add('tel', 'text', array(
                'required' => true ))
            ->add('demande', 'textarea', array(
                'required' => true ))
            ->add('file', 'file', array(
                'label' => 'Document',
                'required'    => false ))
            ->add('publish', 'checkbox', array('required' => false, 'label'=> 'Publié'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\devis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_devis';
    }
}
