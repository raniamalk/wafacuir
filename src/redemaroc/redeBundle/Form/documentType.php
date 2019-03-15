<?php

namespace redemaroc\redeBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class documentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brochure', 'file', array('label' => 'Brochure (PDF file)'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'redemaroc\redeBundle\Entity\document'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'redemaroc_redebundle_document';
    }
}
