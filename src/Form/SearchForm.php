<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Data\SearchData;
use App\Entity\Cost;
use App\Entity\TypeRecipe;
use App\Entity\Difficulty;
use App\Entity\Particularity;

class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [ 
                    'placeholder' => 'Rechercher'
                    ]
            ])

            ->add('typeRecipe', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => TypeRecipe::class,
                'expanded' => true,
                'multiple' => true
            ])

            ->add('particularity', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Particularity::class,
                'expanded' => true,
                'multiple' => true
            ])

            ->add('difficulty', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Difficulty::class,
                'expanded' => true,
                'multiple' => true
            ])

            ->add('cost', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Cost::class,
                'expanded' => true,
                'multiple' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
