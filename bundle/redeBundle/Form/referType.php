<?php

namespace redemaroc\redeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class referType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quoi', 'text', array(
                'required' => true ))
            ->add('ou', 'text', array(
                'required' => true ))
            ->add('description', 'text', array(
                'required' => true ))
            ->add('realisation', 'text', array(
                'required' => true ))
            ->add('file', 'file', array(
                'label' => 'Image du slider',
                'required'    => true ))
            ->add('filea', 'file', array(
                'label' => 'Image 1',
                'required'    => false ))
            ->add('fileb', 'file', array(
                'label' => 'Image 2',
                'required'    => false ))
            ->add('filec', 'file', array(
                'label' => 'Image 3',
                'required'    => false ))
            ->add('filed', 'file', array(
                'label' => 'Image 4',
                'required'    => false ))
            ->add('filee', 'file', array(
                'label' => 'Document',
                'required' => false ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\refer'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_refer';
    }
}
