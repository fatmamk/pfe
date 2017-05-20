<?php

namespace GestionBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IntergrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDebut','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy', 'attr' => array(
        'placeholder' => 'DD-MM-YYYY',
    )))

            ->add('employe')
            ->add('responsable', EntityType::class,
                array(
                    'class' => 'GestionBundle:Employee',

                    'required' => false,
                    'property' => 'toString'))
            ->add('etat', 'choice', array('choices' => array('Realisée' => 'Realisée','Programmée' => 'Programmée','Terminer'=>'Términer'),'placeholder' => 'Genre',
                'required' => false,))
            ->add('dateFin','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy', 'attr' => array(
                'placeholder' => 'DD-MM-YYYY',
            )))
            ->add('informations',TextareaType::class,array(
                'attr'=>array('rows'=>'3'),
            ))
            ->add('pointfaible',TextareaType::class,array(
                'attr'=>array('rows'=>'3'),
            ))
            ->add('pointforte',TextareaType::class,array(
                'attr'=>array('rows'=>'3'),
            ))
               ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Intergration'
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
