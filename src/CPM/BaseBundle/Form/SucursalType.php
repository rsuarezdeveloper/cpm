<?php

namespace CPM\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SucursalType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion','text',array('attr'=> array('label'=>'Descripción')))
            ->add('cliente','genemu_jqueryselect2_entity', array(
            'class' => 'CPM\BaseBundle\Entity\Cliente',
            'property' => 'nombre',
			))
            ->add('municipio','genemu_jqueryselect2_entity', array(
            'class' => 'CPM\BaseBundle\Entity\Municipio',
            'property' => 'nombre',
			))
            ->add('responsable','genemu_jqueryselect2_entity', array(
            'class' => 'CPM\UserBundle\Entity\User',
            'property' => 'nombre',
			))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CPM\BaseBundle\Entity\Sucursal'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cpm_basebundle_sucursal';
    }
}
