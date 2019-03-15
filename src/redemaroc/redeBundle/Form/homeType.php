<?php

namespace redemaroc\redeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class homeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array(
                'required' => true ))
            ->add('titresuite', 'text', array(
                'required' => true ))
            ->add('texte', 'textarea', array(
                'required' => true ))
            ->add('val1', 'text', array(
                'required' => true ))
            ->add('texte1', 'text', array(
                'required' => true ))
            ->add('val2', 'text', array(
                'required' => true ))
            ->add('texte2', 'text', array(
                'required' => true ))
            ->add('val3', 'text', array(
                'required' => true ))
            ->add('texte3', 'text', array(
                'required' => true ))
            ->add('facebook', 'text', array(
                'required' => true ))
            ->add('linkedin', 'text', array(
                'required' => true ))
            ->add('youtube', 'text', array(
                'required' => true ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\home'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_home';
    }
}
