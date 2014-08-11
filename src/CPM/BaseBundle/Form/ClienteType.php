<?php

namespace CPM\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('nit')
            ->add('direccion')
            ->add('telefonos')
            ->add('email')
            ->add('ciudad','genemu_jqueryselect2_entity', array(
            'class' => 'CPM\BaseBundle\Entity\Municipio',
            'property' => 'nombre',
			))
            ->add('mobil')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CPM\BaseBundle\Entity\Cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cpm_basebundle_cliente';
    }
}
