<?php


namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditUserType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
	{

		$builder
			->add('username', TextType::class, [
				'label'    => 'Nom de l\'utilisateur',
				'required' => true,
			])
			->add('role', ChoiceType::class, [
				'mapped'            => false,
				'label'             => false,
				'choices'           => [
					'Directeur'      => 'ROLE_DIRECTEUR',
					'Chef d\'équipe' => 'ROLE_CHEF',
					'Ouvrier'        => 'ROLE_USER',
				],
				'preferred_choices' => ['ROLE_DIRECTEUR'],
			])
			->add('enabled', ChoiceType::class, [
				'label'    => 'Activer l\'utilisateur',
				'choices'  => [
					'Activé'     => true,
					'Désactiver' => false,
				],
				'multiple' => false,
				'expanded' => true,
			]);
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