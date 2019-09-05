<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChantierType extends AbstractType
{
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$terrasse = [
			'messageTerrasse' => 'Ce chantier comporte t-il des terrasses ?',
		];
		$parquet = [
			'messageParquet' => 'Ce chantier comporte t-il du parquet ?',
		];

		$suppParquet = [
			'Fond de placard' => 'fond de placard',
		];

		$suppTerrasse = [
			'U'      => 'U',
			'Rive'   => 'Rive',
			'Grille' => 'Grille',
		];

		$ajoutManuelSuppParquets = [];
		$ajoutManuelSuppTerrasses = [];

		$builder
			->add('nom', TextType::class)
			->add('adresse', TextType::class)
			->add('type', ChoiceType::class, [
				'label'   => 'Type de chantier :',
				'choices' => [
					'Terrasse'           => 'Terrasse',
					'Parquet'            => 'Parquet',
					'Terrasse / Parquet' => 'Terrasse / Parquet',
				],
			])
			->add('nombreBiens', IntegerType::class)
			->add('messageTerrasse', ChoiceType::class, [
				'label'    => $terrasse['messageTerrasse'],
				'multiple' => false,
				'expanded' => true,
				'choices'  => [
					'Oui' => 1,
					'Non' => 0,
				],
				'mapped'   => false,
			])
			->add('supplementTerrasse', ChoiceType::class, [
				'label'    => false,
				'multiple' => true,
				'expanded' => true,
				'mapped'   => false,
				'choices'  => $suppTerrasse,
				'data'     => $suppTerrasse,
			])
			->add('ajoutManuelSuppTerrasses', CollectionType::class, [
				'label'         => false,
				'required'      => false,
				'entry_type'    => TextType::class,
				'data'          => $ajoutManuelSuppTerrasses,
				'entry_options' => [
					'label' => false,
				],
				'mapped'        => false,
				'allow_add'     => true,
			])
			->add('messageParquet', ChoiceType::class, [
				'label'    => $parquet['messageParquet'],
				'multiple' => false,
				'expanded' => true,
				'choices'  => [
					'Oui' => 1,
					'Non' => 0,
				],
				'mapped'   => false,
			])
			->add('supplementParquet', ChoiceType::class, [
				'label'    => false,
				'multiple' => true,
				'expanded' => true,
				'mapped'   => false,
				'choices'  => $suppParquet,
				'data'     => $suppParquet,
			])
			->add('ajoutManuelSuppParquets', CollectionType::class, [
				'label'         => false,
				'required'      => false,
				'entry_type'    => TextType::class,
				'data'          => $ajoutManuelSuppParquets,
				'entry_options' => [
					'label' => false,
				],
				'mapped'        => false,
				'allow_add'     => true,
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
