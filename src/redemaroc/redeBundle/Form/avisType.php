<?php

namespace redemaroc\redeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class avisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('produit','entity',
                array('class'=>'redeBundle:produit','property'=>'id'))
            ->add('nom', 'text', array(
                'required' => true ))
            ->add('email', 'text', array(
                'required' => true ))
            ->add('avis', 'textarea', array(
                'required' => true ))
            ->add('publish', 'checkbox', array('required' => false, 'label'=> 'Publié'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\avis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_avis';
    }
}
