<?php


namespace AppBundle\Form;


use AppBundle\Entity\Bien;
use AppBundle\Entity\ColorisParquet;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddColorisBienForm extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $chantier = (int)$options['data'];
        $builder
            ->add('nom', TextType::class, [
                'label'      => 'Pièce',
                'label_attr' => [
                    'class' => 'bmd-label-floating text-dark ft-18',
                ],
                'attr'       => [
                    'class' => 'form-control text-dark',
                ],
            ])
            ->add('codeCouleur', IntegerType::class, [
                'label'      => 'Code couleur',
                'label_attr' => [
                    'class' => 'bmd-label-floating text-dark ft-18',
                ],
                'attr'       => [
                    'class' => 'form-control text-dark',
                ],
            ])
            ->add('bien', EntityType::class, [
                'attr'          => [
                    'class' => 'checkbox',
                ],
                'class'         => Bien::class,
                'query_builder' => function (EntityRepository $er) use ($chantier) {
                    return $er->createQueryBuilder('b')
                        ->where('b.chantier = :chantier')
                        ->setParameter(':chantier', $chantier);
                },
//                'data_class'    => null,
                'choice_label'  => 'nom',
                'multiple'      => true,
                'expanded'      => true,
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_colorisparquet';
    }

}