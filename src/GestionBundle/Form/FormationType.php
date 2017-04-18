<?php

namespace GestionBundle\Form;
use  GestionBundle\Entity\Nature;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')
            ->add('theme')
            ->add('contenue',TextareaType::class,array(
                'attr'=>array('rows'=>'6','placeholder' => 'Contenue')
            ))
            ->add('objectif',TextareaType::class,array(
                'attr'=>array('rows'=>'6','placeholder' => 'Contenue')
            ))
         
            ->add('dateFin','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy', 'attr' => array(
                'placeholder' => 'DD-MM-YYYY',
                 )))
            
            
            ->add('dateDebut','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy', 'attr' => array(
                'placeholder' => 'DD-MM-YYYY',
                 )))

            ->add('lieu')
            ->add('coutImateriel')
            ->add('coutMateriel')

            ->add('Ocurrancedate','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy', 'attr' => array(
                'placeholder' => 'DD-MM-YYYY',
            )))
            ->add('OcurranceNbj',null,array('required' => false))
            ->add('terminerA')

            ->add('finApres', 'choice', array(
                'choices' => array( 1 => 'Terminer à', 0 => 'Fin Apres'),
                'expanded' => true,
                'multiple' => false,
                'required' => true
            ))



            ->add('chaque',null,array('required' => false,))
            ->add('reccurence')

            ->add('etat')
            ->add('periode', 'choice', array('choices' => array('mois' => 'Mois','semaine' => 'Semaine','jour'=>'Jour','jours'=>'Jours'),'empty_value' => false,
                'required' => false, 'multiple'=>false))

            ->add('demandeFormation')
        ->add('typeFormation',EntityType::class,
        array(
            'empty_value' => false,
            'required' => false,
            'class' => 'GestionBundle:Type_Formation',
            'property' => 'libelleTypeF',



            'multiple'=>false


    ))


            ->add('formateur',EntityType::class,
                array(
                    
                    'required' => false,
                    'class' => 'GestionBundle:Formateur',
                    'property' => 'toString',

                    'multiple'=>false

                ))

       ->add('FormateurInterne')
            ->add('formationsemployee')



            ->add('FormateurInterne')





            ->add('employees',EntityType::class,array(
                'class'=>'GestionBundle:Employee',
                'choice_label'=>'toString',
                'multiple'=>true,
            ))

        ->add('jours', CollectionType::class, array(
            'entry_type' => JourType::class
        ));





    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Formation'
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
