<?php

namespace redemaroc\redeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use redemaroc\redeBundle\Entity\typeRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class souscategorieType extends AbstractType
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
            ->add('souscategorie', 'text')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\souscategorie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_souscategorie';
    }
}
