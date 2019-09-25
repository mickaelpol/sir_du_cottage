<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ColorisParquetType extends AbstractType
{
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nom', TextType::class, [
                'label'      => 'Pièce',
                'label_attr' => [
                    'class' => 'bmd-label-floating text-white ft-18',
                ],
                'attr'       => [
                    'class' => 'form-control text-white',
                ],
			])
			->add('codeCouleur', IntegerType::class, [
                'label'      => 'Code couleur',
                'label_attr' => [
                    'class' => 'bmd-label-floating text-white ft-18',
                ],
                'attr'       => [
                    'class' => 'form-control text-white',
                ],
			]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\ColorisParquet',
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
