<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Bundle\SecurityBundle\Security\FirewallContext;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CommentaireChantierType extends AbstractType
{

    private $securityContext;

    public function __construct(TokenStorageInterface $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('commentaire', TextareaType::class, [
                'label'      => false,
                'label_attr' => [
                    'class' => 'bmd-label-floating text-white ft-18',
                ],
                'attr'       => [
                    'class' => 'form-control text-white',
                ],
                'required'   => false,
            ]);
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $user = $this->securityContext->getToken()->getUsername();
            $utilisateur = $event->getData();
            $form = $event->getForm();

            if (!$utilisateur || null === $utilisateur->getId()) {
                $form->add('utilisateur', HiddenType::class, [
                    'label' => false,
                    'data'  => $user,
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
            'data_class' => 'AppBundle\Entity\CommentaireChantier',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_commentairechantier';
    }


}
