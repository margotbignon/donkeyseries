<?php

namespace App\Form;

use App\Entity\Episode;
use App\Entity\Season;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EpisodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TypeTextType::class, ['label' => 'Titre'])
            ->add('number', NumberType::class, ['label' => 'Numéro'])
            ->add('synopsis', TypeTextType::class, ['label' => 'Synopsis'])
            ->add('season', EntityType::class, [
                'class' => Season::class,
                'choice_label' => 'id',
                'label' => 'Saison'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Episode::class,
        ]);
    }
}
