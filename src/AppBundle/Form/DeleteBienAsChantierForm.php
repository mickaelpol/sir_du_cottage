<?php


namespace AppBundle\Form;


use AppBundle\Entity\Bien;
use AppBundle\Entity\Chantier;
use AppBundle\Entity\ColorisParquet;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteBienAsChantierForm extends AbstractType
{

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$chantier = $options['chantier'];
		$builder
			->add('biens', EntityType::class, [
				'label'        => 'selectionnez les biens à supprimer',
				'class'        => Bien::class,
				'query_builder' => function (EntityRepository $er) use ($chantier) {
					$qb = $er->createQueryBuilder('b')
						->where('b.chantier = :chantier')
						->setParameter('chantier', $chantier);
					return $qb;
				},
				'label_attr'   => ['class' => 'test'],
				'choice_label' => 'nom',
				'multiple'     => true,
				'expanded'     => true,
				'data'         => null,
			]);

	}

	/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => Chantier::class,
			'chantier'   => Chantier::class,
		));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix()
	{
		return 'appbundle_bien';
	}

}