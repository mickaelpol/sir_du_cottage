<?php

namespace AppBundle\Form;

use AppBundle\Entity\Bien;
use AppBundle\Entity\ColorisParquet;
use AppBundle\Entity\SupplementParquet;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienType extends AbstractType
{
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nom', TextType::class, [
				'label'      => 'Nom du bien',
				'label_attr' => [
					'class' => 'bmd-label-floating text-white fz-07-rem',
				],
				'attr'       => [
					'class'        => 'form-control text-white text-uppercase',
					'autocomplete' => 'off',
				],
			])
			->add('preparationParquet', IntegerType::class, [])
			->add('colorisParquets', CollectionType::class, [
				'label'         => false,
				'entry_type'    => ColorisParquetType::class,
				'entry_options' => [
					'label' => false,
					'attr'  => [
						'class' => 'form-group',
					],
				],
				'allow_add'     => true,
				'allow_delete'  => true,
				'by_reference'  => false,
			])
			->add('parquetParquet', IntegerType::class, [])
			->add('plintheParquet', IntegerType::class, [])
			->add('acryliqueParquet', IntegerType::class, [])
			->add('seuilParquet', IntegerType::class, [])
			->add('superficieParquet', IntegerType::class, [
				'label'      => 'Superficie Parquet m2',
				'label_attr' => [
					'class' => 'bmd-label-floating text-white fz-07-rem',
				],
				'attr'       => [
					'class' => 'form-control text-white',
				],
			])
			->add('cadreTerrasse', IntegerType::class, [])
			->add('platelageTerrasse', IntegerType::class, [])
			->add('vissageTerrasse', IntegerType::class, [])
			->add('superficieTerrasse', IntegerType::class, [
				'label'      => 'Superficie Terrasses m2',
				'label_attr' => [
					'class' => 'bmd-label-floating text-white fz-07-rem',
				],
				'attr'       => [
					'class'        => 'form-control text-white text-uppercase',
					'autocomplete' => 'off',
				],
			])
			->add('supplementParquets', CollectionType::class, [
				'label'         => false,
				'entry_type'    => SupplementParquetType::class,
				'entry_options' => [
					'label' => false,
				],
				'allow_add'     => true,
				'allow_delete'  => true,
				'prototype'     => true,
			])
			->add('supplementTerrasses', CollectionType::class, [
				'label'         => false,
				'entry_type'    => SupplementTerrasseType::class,
				'entry_options' => [
					'label' => false,
				],
				'allow_add'     => true,
				'allow_delete'  => true,
				'prototype'     => true,
			]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => Bien::class,
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
