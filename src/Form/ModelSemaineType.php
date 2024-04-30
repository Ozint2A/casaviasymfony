<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\ModelSemaine;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModelSemaineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('lundi', EntityType::class, [
                'class' => Equipe::class,
                'required' => false,
                'choice_label' => function(Equipe $equipe):string {
                    return $equipe->getFullName();
                },
            ])
            ->add('mardi', EntityType::class, [
                'class' => Equipe::class,
                'required' => false,
                'choice_label' => function(Equipe $equipe):string {
                    return $equipe->getFullName();
                },
            ])
            ->add('mercredi', EntityType::class, [
                'class' => Equipe::class,
                'required' => false,
                'choice_label' =>function(Equipe $equipe):string {
                    return $equipe->getFullName();
                },
            ])
            ->add('jeudi', EntityType::class, [
                'class' => Equipe::class,
                'required' => false,
                'choice_label' =>function(Equipe $equipe):string {
                    return $equipe->getFullName();
                },
            ])
            ->add('vendredi', EntityType::class, [
                'class' => Equipe::class,
                'required' => false,
                'choice_label' => function(Equipe $equipe):string {
                    return $equipe->getFullName();
                },
            ])
            ->add('samedi', EntityType::class, [
                'class' => Equipe::class,
                'required' => false,
                'choice_label' =>function(Equipe $equipe):string {
                    return $equipe->getFullName();
                },
            ])
            ->add('dimanche', EntityType::class, [
                'class' => Equipe::class,
                'required' => false,
                'choice_label' => function(Equipe $equipe):string {
                    return $equipe->getFullName();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ModelSemaine::class,
        ]);
    }
}
