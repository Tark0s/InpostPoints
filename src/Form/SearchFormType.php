<?php

namespace App\Form;

use App\Form\DataTransformer\CityFormatTransformer;
use App\ValueObject\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchFormType extends AbstractType
{
    private $cityFormatTransformer;

    public function __construct(CityFormatTransformer $cityFormatTransformer)
    {
        $this->cityFormatTransformer = $cityFormatTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('city', TextType::class, [
                'required' => true,
                'label' => 'City'
            ])
            ->add('street', TextType::class, [
                'required' => false,
                'label' => 'Street'
            ])
            ->add('postalCode', TextType::class, [
                'required' => false,
                'label' => 'Postal code'
            ]);

        $builder->get('city')->addModelTransformer($this->cityFormatTransformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class
        ]);
    }
}
