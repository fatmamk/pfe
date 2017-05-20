<?php

namespace GestionBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeCongeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('statutsConge')
            ->add('dateDebutConge','date',array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy', 'attr' => array(
                'placeholder' => 'DD-MM-YYYY',)))
            ->add('dateFinConge','date',array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy', 'attr' => array(
                'placeholder' => 'DD-MM-YYYY',)))
            ->add('typeconge')
            ->add('employe')

            
         ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\DemandeConge'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return null;
    }


}
