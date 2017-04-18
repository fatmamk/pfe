<?php

namespace GestionBundle\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbsenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('justifier',TextareaType::class,array(
                'attr'=>array('rows'=>'5'),
            ))
            ->add('dateDebut','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy'))
            ->add('dateFin','date',  array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy'))
            ->add('etat')
            ->add('integere')
          
            ->add('commentaire',TextareaType::class,array(
                'attr'=>array('rows'=>'5'),
            ))
           ;
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Absence'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_absence';
    }


}
