<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('surface')
            ->add('rooms')
            ->add('floor')
            ->add('price')
            ->add('heat', ChoiceType::class, [
                'choices' => $this->getChoices(),
            ])
            ->add('city')
            ->add('address')
            ->add('zip_code')
            ->add('sold')
            ->add('bedrooms')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
            'translation_domain' => 'forms',
        ]);
    }
    private function getChoices()
    {
        $choices = Property::HEAT;
        $outpout = [];
        foreach ($choices as $k => $v) {
            $outpout[$v] = $k;
        }
        return $outpout;
    }
}
