<?php

namespace redemaroc\redeBundle\Form;

use redemaroc\redeBundle\Entity\type;
use redemaroc\redeBundle\Entity\typeRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class produitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add ('type', 'entity', array(
                'class' => 'redeBundle:type',
                'property' => 'type',
                'required'    => false,))
            ->add('file', 'file', array(
                'label' => 'Image pricipale',
                'required'    => false ))
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

            ->add('reference', 'text', array(
                'required' => true ))
            ->add('prix', 'text', array(
                'required' => false ))
            ->add('titre', 'text', array(
                'required' => true ))
            ->add('titre1', 'text', array(
                'required' => false ))
            ->add('presentation', 'textarea', array(
                'required' => true ))
            ->add('titre2', 'text', array(
                'required' => false ))
            ->add('plusinfo', 'textarea', array(
                'required' => false ))
            ->add('video', 'text', array(
                'required' => false ))
            ->add('accessoire', 'text', array(
                'required' => false ))
            ->add('filee', 'file', array(
                'label' => 'Document',
                'required' => false ))
            ->add('metadescription' , 'textarea', array(
                'required' => true ))
            ->add('metakeywords' , 'textarea', array(
                'required' => true ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\produit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_produit';
    }
}
