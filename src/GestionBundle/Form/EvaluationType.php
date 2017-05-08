<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('moyenne')
        ->add('formation')


            ->add('afroid','choice', array(
                'choices' => array(
                    '5' => 'afroid-5',
                    '4' => 'afroid-4',
                    '3' => 'afroid-3',
                    '2' => 'afroid-2',
                    '1' => 'afroid-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))
            
            ->add('achaud','choice', array(
                'choices' => array(
                    '5' => 'achaud-5',
                    '4' => 'achaud-4',
                    '3' => 'achaud-3',
                    '2' => 'achaud-2',
                    '1' => 'achaud-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))
            ->add('datePrevue','choice', array(
                'choices' => array(
                    '5' => 'datePrevue-5',
                    '4' => 'datePrevue-4',
                    '3' => 'datePrevue-3',
                    '2' => 'datePrevue-2',
                    '1' => 'datePrevue-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))

            ->add('efficace','choice', array(
                'choices' => array(
                    '5' => 'efficace-5',
                    '4' => 'efficace-4',
                    '3' => 'efficace-3',
                    '2' => 'efficace-2',
                    '1' => 'efficace-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))

            ->add('commantaire',TextareaType::class,array(
                'attr'=>array('rows'=>'6','placeholder' => 'Contenue')
            ))
            ->add('conference','choice', array(
                'choices' => array(
                    '5' => 'conference-5',
                    '4' => 'conference-4',
                    '3' => 'conference-3',
                    '2' => 'conference-2',
                    '1' => 'conference-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))





            ->add('methodePedalogique','choice', array(
                'choices' => array(
                    '5' => 'methodePedalogique-5',
                    '4' => 'methodePedalogique-4',
                    '3' => 'methodePedalogique-3',
                    '2' => 'methodePedalogique-2',
                    '1' => 'methodePedalogique-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))

            ->add('conference','choice', array(
                'choices' => array(
                    '5' => 'conference-5',
                    '4' => 'conference-4',
                    '3' => 'conference-3',
                    '2' => 'conference-2',
                    '1' => 'conference-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))


            ->add('supportDeCours','choice', array(
                'choices' => array(
                    '5' => 'supportDeCours-5',
                    '4' => 'supportDeCours-4',
                    '3' => 'supportDeCours-3',
                    '2' => 'supportDeCours-2',
                    '1' => 'supportDeCours-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))
            ->add('lieu','choice', array(
                'choices' => array(
                    '5' => 'lieu-5',
                    '4' => 'lieu-4',
                    '3' => 'lieu-3',
                    '2' => 'lieu-2',
                    '1' => 'lieu-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))

            ->add('duree','choice', array(
                'choices' => array(
                    '5' => 'duree-5',
                    '4' => 'duree-4',
                    '3' => 'duree-3',
                    '2' => 'duree-2',
                    '1' => 'duree-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))
            ->add('recpectHumain','choice', array(
                'choices' => array(
                    '5' => 'recpectHumain-5',
                    '4' => 'recpectHumain-4',
                    '3' => 'recpectHumain-3',
                    '2' => 'recpectHumain-2',
                    '1' => 'recpectHumain-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))

            ->add('contenueCours','choice', array(
                'choices' => array(
                    '5' => 'contenueCours-5',
                    '4' => 'contenueCours-4',
                    '3' => 'contenueCours-3',
                    '2' => 'contenueCours-2',
                    '1' => 'contenueCours-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))


            ->add('travauxPratique','choice', array(
                'choices' => array(
                    '5' => 'travauxPratique-5',
                    '4' => 'travauxPratique-4',
                    '3' => 'travauxPratique-3',
                    '2' => 'travauxPratique-2',
                    '1' => 'travauxPratique-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))
            ->add('objectif','choice', array(
                'choices' => array(
                    '5' => 'objectif-5',
                    '4' => 'objectif-4',
                    '3' => 'objectif-3',
                    '2' => 'objectif-2',
                    '1' => 'objectif-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))

            ->add('annimateur','choice', array(
                'choices' => array(
                    '5' => 'annimateur-5',
                    '4' => 'annimateur-4',
                    '3' => 'annimateur-3',
                    '2' => 'annimateur-2',
                    '1' => 'annimateur-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))

            ->add('ambianceGenerale','choice', array(
                'choices' => array(
                    '5' => 'ambianceGenerale-5',
                    '4' => 'ambianceGenerale-4',
                    '3' => 'ambianceGenerale-3',
                    '2' => 'ambianceGenerale-2',
                    '1' => 'ambianceGenerale-1',
                ),
                'expanded' => true,
                'multiple' => false
            ))
            
             ;
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
        return null;
    }


}
