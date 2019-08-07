<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Compte;
use App\Entity\Profil;
use App\Entity\Partenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',TextType::class)
            ->add('roles')
            ->add('password')
            ->add('prenom')
            ->add('nom')
            ->add('mail')
            ->add('telephone')
            ->add('adresse')
            ->add('statut')
            ->add('cni')
            ->add('partenaire', EntityType::class,['class'=>Partenaire::class,'choice_label'=>'partenaire_id'])
            ->add('compte', EntityType::class,['class'=>Compte::class,'choice_label'=>'compte_id'])
            ->add('profil', EntityType::class,['class'=>Profil::class,'choice_label'=>'profil_id'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
