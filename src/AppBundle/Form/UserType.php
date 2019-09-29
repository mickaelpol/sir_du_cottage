<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{

		$builder
			->add('username', TextType::class, [
				'label'      => 'Nom de l\'utilisateur',
				'label_attr' => [
					'class' => 'bmd-label-floating text-white ft-24',
				],
				'required'   => true,
				'attr'       => [
					'autocomplete' => 'off',
				],
			])
			->add('roles', CollectionType::class, [
				'label'         => false,
				'entry_type'    => ChoiceType::class,
				'entry_options' => [
					'attr'              => [
						'class' => 'form-control text-white ft-24',
					],
					'label'             => 'Roles',
					'label_attr'        => [
						'class' => 'bmd-label-floating text-white ft-24',
					],
					'choices'           => [
						'Directeur'      => 'ROLE_DIRECTEUR',
						'Chef d\'équipe' => 'ROLE_CHEF',
						'Ouvrier'        => 'ROLE_USER',
					],
					'choice_attr'       => function ($allChoices, $currentChoiceKey) {
						if ($currentChoiceKey) {
							return array('class' => 'text-dark ft-24');
						}
					},
					'preferred_choices' => ['ROLE_DIRECTEUR'],
				],
			])
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
					'label'      => 'Mot de passe',
					'label_attr' => [
						'class' => 'bmd-label-floating text-white ft-24',
					],
				],
				'second_options'  => [
					'label'      => 'Confirmez',
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
