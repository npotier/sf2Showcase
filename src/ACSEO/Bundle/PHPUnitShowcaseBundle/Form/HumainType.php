<?php

namespace ACSEO\Bundle\PHPUnitShowcaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HumainType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('dateNaissance')
            ->add('sexe')
            ->add('orientationSexuelle')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ACSEO\Bundle\PHPUnitShowcaseBundle\Entity\Humain'
        ));
    }

    public function getName()
    {
        return 'acseo_bundle_phpunitshowcasebundle_humaintype';
    }
}
