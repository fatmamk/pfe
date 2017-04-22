<?php

namespace GestionBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('prenom')

            ->add('cINEmployee')
            ->add('lieunais')
            ->add('dateNaiss','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy'))

            ->add('sexe', 'choice', array('choices' => array('Féminin' => 'Féminin','Masculin' => 'Masculin'),'placeholder' => 'Genre',
                'required' => false,))
            ->add('adresseEmploye')

            ->add('numTelEmployee')
            ->add('gsm')

            ->add('emailEmployee')
            ->add('emailSecondaireEmployee')
            ->add('matriculeEmployee')
            ->add('gradeEmployee')
            ->add('rIBEmployee')
            ->add('maison')
            ->add('numSecuriteSocialeEmployee')

            ->add('type', 'choice', array('choices' => array('formateur' => 'Féminin','Masculin' => 'Masculin')))
            ->add('diplome',TextareaType::class,array(
                'attr'=>array('rows'=>'3','required' => false),
            ))
            ->add('experience',TextareaType::class,array(
                'attr'=>array('rows'=>'3','required' => false),
            ))
            ->add('competance',TextareaType::class,array(
                'attr'=>array('rows'=>'3'),
            ))
            ->add('aptitudePhysique',TextareaType::class,array(
                'attr'=>array('rows'=>'3','required' => false),
            ))
            ->add('groupe')



            


            ->add('site')





            ->add('carriere')
            ->add('activites')

            ->add('delivreA')
            ->add('departement')

            ->add("imageFile", "text", array("mapped"=>false))


            ->add('delivreLe','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy'))
            ->add('fonctions',EntityType::class,
                array(

                    'required' => false,
                    'class' => 'GestionBundle:Fonction',
                    'property' => 'libelleFonction',
                    'multiple'=>false))

            ->add('departement',EntityType::class,
        array(
            'placeholder' => 'Choose departement',
            'required' => false,
            'class' => 'GestionBundle:Departement',
            'property' => 'libelleDepartement',
        'multiple'=>false));

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Employee'
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
