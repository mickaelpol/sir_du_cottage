<?php

namespace AppBundle\Form;

use AppBundle\Entity\Bien;
use AppBundle\Entity\Chantier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutParquetBienAjaxForm extends AbstractType
{

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('id', HiddenType::class)
			->add('nom', TextType::class, [
				'attr' => [
					'class'        => 'form-control text-dark text-uppercase',
					'autocomplete' => 'off',
				],
			])
			->add('superficieParquet', IntegerType::class, [
				'attr' => [
					'class' => 'form-control text-dark',
				],
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
		return 'appbundle_chantier';
	}


}
