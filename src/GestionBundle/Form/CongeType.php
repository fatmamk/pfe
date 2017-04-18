<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CongeType extends AbstractType
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

            ->add('employee')

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Conge'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_conge';
    }


  

}
