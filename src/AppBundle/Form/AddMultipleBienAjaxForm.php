<?php


namespace AppBundle\Form;


use AppBundle\Entity\Bien;
use AppBundle\Entity\Chantier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddMultipleBienAjaxForm extends AbstractType
{

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$chantier = $options['chantier'];
		$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
			$chantier = $event->getData();
			$form = $event->getForm();
			$typeChantier = $chantier->getType();

			if ($typeChantier === 'Terrasse') {
				$form
					->add('biens', CollectionType::class, [
						'label'         => false,
						'entry_type'    => AjoutTerrasseBienAjaxForm::class,
						'entry_options' => [
							'label' => false,
						],
						'data'          => null,
						'allow_add'     => true,
						'allow_delete'  => true,
						'by_reference'  => false,
					]);
			} elseif ($typeChantier === 'Parquet') {
				$form
					->add('biens', CollectionType::class, [
						'label'         => false,
						'entry_type'    => AjoutParquetBienAjaxForm::class,
						'entry_options' => [
							'label' => false,
						],
						'data'          => null,
						'allow_add'     => true,
						'allow_delete'  => true,
						'by_reference'  => false,
					]);
			} else {
				$form
					->add('biens', CollectionType::class, [
						'label'         => false,
						'entry_type'    => AjoutParquetTerrasseBienAjaxForm::class,
						'entry_options' => [
							'label' => false,
						],
						'data'          => null,
						'allow_add'     => true,
						'allow_delete'  => true,
						'by_reference'  => false,
					]);
			}
		});

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
		return 'appbundle_chantier';
	}

}