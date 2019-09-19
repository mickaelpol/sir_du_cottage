<?php


namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChantierEditType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nom', TextType::class, [
                'label'      => 'Nom du chantier',
                'label_attr' => [
                    'class' => 'bmd-label-floating text-white ft-18',
                ],
                'attr'       => [
                    'class'        => 'form-control text-white text-uppercase',
                    'autocomplete' => 'off',
                ],
            ])
            ->add('adresse', TextType::class, [
                'label'      => 'Adresse',
                'label_attr' => [
                    'class' => 'bmd-label-floating text-white ft-18',
                ],
                'attr'       => [
                    'class'        => 'form-control text-white text-uppercase',
                    'autocomplete' => 'off',
                ],
            ])
            ->add('biens', CollectionType::class, [
                'entry_type'    => BienType::class,
                'entry_options' => [
                ],
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
            ])
            ->add('commentaires', CollectionType::class, [
                'label'         => false,
                'entry_type'    => CommentaireChantierType::class,
                'entry_options' => [
                    'label' => false,
                ],
                'attr'          => [
                    'autocomplete' => 'off',
                ],
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Chantier',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_chantier';
    }

}