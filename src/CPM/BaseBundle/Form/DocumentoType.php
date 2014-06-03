<?php

namespace CPM\BaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DocumentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('path')
            ->add('file','file',array(
            	'attr'=> array(
            		'multiple'=>true
            	)
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CPM\BaseBundle\Entity\Documento'
        ));
    }

    public function getName()
    {
        return 'cpm_basebundle_documentotype';
    }
}
