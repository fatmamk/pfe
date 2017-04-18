<?php

namespace GestionBundle\Form;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('typeContrat')
            ->add('integre')
            ->add('debutIntergration')
            ->add('finIntegration')
            ->add('dateRecrutement')
            ->add('fichierContrat')
            ->add('typecontrar')
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
