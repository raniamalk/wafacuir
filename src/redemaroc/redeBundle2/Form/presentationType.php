<?php

namespace redemaroc\redeBundle\Form;

use redemaroc\redeBundle\redeBundle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;





class presentationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titrep' , 'text', array(
                'required' => true ))
            ->add('presentation' , 'textarea', array(
                'required' => true ))
            ->add('titreda' , 'text', array(
                'required' => true ))
            ->add('domaineactivite' , 'textarea', array(
                'required' => true ))
            ->add('file', 'file', array(
                'label' => 'Image de presentation',
                'required'    => false ))
            ->add('metadescription' , 'textarea', array(
                'required' => true ))
            ->add('metakeywords' , 'textarea', array(
                'required' => true ))
            /*->add('Valider',      'submit')*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\presentation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_presentation';
    }
}
