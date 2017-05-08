<?php

namespace GestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiscplineType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDebut','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy'))

            ->add('commentaire',TextareaType::class,array(
                'attr'=>array('rows'=>'3','required' => false)))
            ->add('couse',TextareaType::class,array(
                'attr'=>array('rows'=>'3','required' => false)))
            ->add('nature', 'choice', array('choices' => array('all' => 'All','absence' => 'Absence non justfier','langage'=>'Langage agresive',
                'refuse'=>'refus de travail'),'empty_value' => false,
                'required' => false,));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Discpline'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_discpline';
    }


}
