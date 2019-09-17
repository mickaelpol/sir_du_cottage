<?php


namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditUserPasswordType extends AbstractType
{


	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('plainPassword', RepeatedType::class, [
				'type'            => PasswordType::class,
				'options'         => [
					'translation_domain' => 'FOSUserBundle',
					'attr'               => [
						'autocomplete' => 'new-password',
						'class'        => 'input-password',
					],
				],
				'first_options'   => [
					'label' => 'Mot de passe',
                    'label_attr' => [
                        'class' => 'bmd-label-floating text-white ft-24'
                    ]
				],
				'second_options'  => [
					'label' => 'Confirmation du mot de passe',
                    'label_attr' => [
                        'class' => 'bmd-label-floating text-white ft-24',
                    ],
				],
				'invalid_message' => 'fos_user.password.mismatch',
			]);
		parent::buildForm($builder, $options);
	}

	/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\User',
		));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix()
	{
		return 'appbundle_user';
	}

}