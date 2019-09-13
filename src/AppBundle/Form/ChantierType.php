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
			->add('nom', TextType::class, [
				'label'      => 'Nom du chantier',
				'label_attr' => [
					'class' => 'bmd-label-floating',
				],
				'attr'       => [
					'class'        => 'form-control text-white ft-18',
					'type'         => 'text',
					'autocomplete' => 'off',
				],
			])
			->add('adresse', TextType::class, [
				'label'      => 'Adresse du chantier',
				'label_attr' => [
					'class' => 'bmd-label-floating',
				],
				'attr'       => [
					'class'        => 'form-control text-white ft-18',
					'type'         => 'text',
					'autocomplete' => 'off',
				],
				'required'   => true,
			])
			->add('type', ChoiceType::class, [
				'label'             => false,
				'label_attr'        => [
					'class' => 'bmd-label-floating',
				],
				'attr'              => [
					'class' => 'form-control text-white',
				],
				'choices'           => [
					'Terrasse'           => 'Terrasse',
					'Parquet'            => 'Parquet',
					'Terrasse / Parquet' => 'Terrasse / Parquet',
				],
				'choices_as_values' => true,
				'choice_attr'       => function ($allChoices, $currentChoiceKey) {
					if ($currentChoiceKey) {
						return array('class' => 'text-dark');
					}
				},
			])
			->add('nombreBiens', IntegerType::class, [
				'label'      => 'Nombre de biens à créer',
				'label_attr' => [
					'class' => 'bmd-label-floating',
				],
				'attr'       => [
					'class'        => 'form-control text-white ft-18',
					'type'         => 'text',
					'autocomplete' => 'off',
				],
			])
			->add('messageTerrasse', ChoiceType::class, [
				'label'        => false,
				'multiple'     => false,
				'expanded'     => true,
				'choices'      => [
					'Oui' => 1,
					'Non' => 0,
				],
				'choice_label' => false,
				'mapped'       => false,
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
					'label' => 'Ajouter une caractéristique aux terrasses',
					'attr'  => [
						'class'        => 'form-control mt-1 mb-1 text-white',
						'autocomplete' => 'off',
					],
				],
				'mapped'        => false,
				'allow_add'     => true,
				'prototype'     => true,
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
					'label' => 'Ajouter une caractéristique aux parquets',
					'attr'  => [
						'class'        => 'form-control mt-1 mb-1 text-white',
						'autocomplete' => 'off',
					],
				],
				'mapped'        => false,
				'allow_add'     => true,
				'prototype'     => true,
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
