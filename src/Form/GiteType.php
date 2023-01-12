<?php

namespace App\Form;

use App\Entity\Gite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('adress')
            ->add('city')
            ->add('zipcode')
            ->add('departement')
            ->add('region')
            ->add('surface')
            ->add('rooms')
            ->add('beds')
            ->add('animal_allowed')
            ->add('animal_cost')
            ->add('disponibilities')
            ->add('description')
            ->add('green_price')
            ->add('red_price')
            ->add('start_red')
            ->add('end_red')
            ->add('GiteEquipmentInt')
            ->add('equipmentExts')
            ->add('photos')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}