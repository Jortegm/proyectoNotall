<?php
///*formulario para nuevos usuarios

namespace AppBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Post;



class UsuariosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreUsuario', null)
            ->add('apellidoUsuario', null)
            ->add('tipoDeUsuario',ChoiceType::class, array('choices'=> array('ROLE_ADMIN'=> 'ROLE_ADMIN', 'ROLE_USER' => 'ROLE_USER')))
            ->add('nivelUsuario', ChoiceType::class, array('choices' => array('Novato'=>'NOVATO', 'Intermedio'=> 'INTERMEDIO', 'Experto'=> 'EXPERTO'), 'placeholder' => 'Selecciona una opción', 'required'=>'false'))
            ->add('Pais', null)
            ->add('nickUsuario', null)
            ->add('passwdUsuario', PasswordType::class)
            ->add('biografia', null)
            ->add('correoUsuario', EmailType::class)
            ->add('Submit', SubmitType::class, array ('label' => 'Añadir '));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Usuarios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usuarios';
    }

    public function getNombre() {
        return 'usuarios';
    }


}
