<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
	        ->add('nom')
	        ->add('preparationParquet')
	        ->add('parquetParquet')
	        ->add('plintheParquet')
	        ->add('acryliqueParquet')
	        ->add('seuilParquet')
	        ->add('superficieParquet')
	        ->add('cadreTerrasse')
	        ->add('platelageTerrasse')
	        ->add('vissageTerrasse')
	        ->add('superficieTerrasse')
	        ->add('chantier')
	        ->add('supplementParquet', EntityType::class, [
	        ])
	        ->add('supplementTerrasse', EntityType::class, [
	        ])
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Bien'
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
