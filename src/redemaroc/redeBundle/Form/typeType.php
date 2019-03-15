<?php

namespace redemaroc\redeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use redemaroc\redeBundle\Entity\typeRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class typeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add ('menu', 'entity', array(
                'class' => 'redeBundle:menu',
                'property' => 'menu',
                'required'    => false,))
            ->add('type', 'text')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\type'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_type';
    }
}
