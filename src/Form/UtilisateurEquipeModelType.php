<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\ModelSemaine;
use App\Entity\Utilisateur;
use App\Entity\UtilisateurEquipe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use function PHPSTORM_META\map;

class UtilisateurEquipeModelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jour', null, [
                'widget' => 'single_text',
            ])
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'username',
            ])
            ->add('equipe', EntityType::class, [
                'class' => ModelSemaine::class,
                'choice_label' => function(ModelSemaine $model):string {
                    return $model->getFullSemaine();
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UtilisateurEquipe::class,
        ]);
    }
}
