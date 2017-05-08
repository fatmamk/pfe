<?php

namespace GestionBundle\Form;
use Doctrine\ORM\EntityRepository;
use GestionBundle\Entity\Formation;
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
            ->add('evalutionformation')
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

            ->add('Ocurrancedate','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy','required' => false, 'attr' => array(
                'placeholder' => 'DD-MM-YYYY'
            )))
            ->add('OcurranceNbj',null,array('required' => false))
            

            ->add('finApres', 'choice', array(
                'choices' => array( 1 => 'Terminer à', 0 => 'Fin Apres'),
                'expanded' => true,
                'multiple' => false,

            ))



            ->add('chaque')
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


                ))

       ->add('FormateurInterne')
            ->add('formationsemployee')

    ->add('jours', CollectionType::class, array(
    'entry_type' => JourType::class
))

            ->add('employees')


        ->add('jours', CollectionType::class, array('data_class'=> null,
            'type' =>new JourType(),

        ));





    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Formation::class,
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
