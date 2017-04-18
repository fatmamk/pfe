<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('matricule')->add('effectue')
            ->add('afroid')->add('achaud')
            ->add('reference')->add('datePrevue')
            ->add('commantaire')->add('methodePedalogique')
            ->add('conference')->add('supportDeCours')->add('lieu')->add('duree')->add('recpectHumain')
            ->add('contenueCours')
            ->add('travauxPratique')->add('objectif')->add('annimateur')->add('ambianceGenerale')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Evaluation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_evaluation';
    }


}
