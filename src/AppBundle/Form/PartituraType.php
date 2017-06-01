<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class PartituraType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NombrePartitura',null)
            ->add ('subNombrePartitura', null)
            ->add('ContenidoPartitura',null)
            ->add('PartituraUsuario', null)
            ->add('CompartirPartitura', ChoiceType::class, array('choices'=> array( 0 => 'NO', 1 => 'SI')))
            ->add('Submit', SubmitType::class, array ('label' => 'Añadir '));

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Partitura'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_partitura';
    }

    public function getNombre() {
        return 'partitura';
    }

}
