<?php

namespace CPM\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MunicipioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('nombre')
            ->add('latitud')
            ->add('longitud')
            ->add('departamento')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CPM\BaseBundle\Entity\Municipio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cpm_basebundle_municipio';
    }
}
