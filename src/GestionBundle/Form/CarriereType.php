<?php

namespace GestionBundle\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarriereType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('libelleCarriere')
            ->add('integre',CheckboxType::class)
            ->add('etat')
            ->add('dateRecrutement','date', array('widget' => 'single_text','html5' => false,'format' => 'dd/MM/yyyy', 'attr' => array(
                'placeholder' => 'DD-MM-YYYY',
            )))
            ->add('file',FileType::class)
            ->add('employee')
            ->add('typecontrar', 'entity',
                array(
                    'class' => 'GestionBundle:Type_Contrat',
                    'property' => 'libelleTypeC'))
           
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\Carriere'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_carriere';
    }


}
