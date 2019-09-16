<?php


namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class EditUserType extends AbstractType
{

	private $securityContext;

	public function __construct(TokenStorageInterface $securityContext)
	{
		$this->securityContext = $securityContext;
	}


	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$user = $this->securityContext->getToken()->getUser();

		$builder
			->add('username', TextType::class, [
				'label'    => 'Nom de l\'utilisateur',
				'label_attr' => [
                    'class' => 'bmd-label-floating text-white ft-24'
                ],
				'required' => true,
			])
			->add('role', ChoiceType::class, [
				'mapped'            => false,
				'label'             => false,
                'label_attr' => [
                    'class' => 'bmd-label-floating text-white ft-24'
                ],
				'choices'           => [
					'Directeur'      => 'ROLE_DIRECTEUR',
					'Chef d\'équipe' => 'ROLE_CHEF',
					'Ouvrier'        => 'ROLE_USER',
				],
				'preferred_choices' => ['ROLE_DIRECTEUR', 'ROLE_CHEF'],
			])
			;
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