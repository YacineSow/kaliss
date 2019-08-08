<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Compte;
use App\Entity\Profil;
use App\Entity\Partenaire;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username',TextType::class)
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])           
            ->add('prenom')
            ->add('nom')
            ->add('mail')
            ->add('telephone')
            ->add('adresse')
            ->add('cni')
            ->add('imageFile',VichFileType::class)
            ->add('partenaire', EntityType::class,['class'=>Partenaire::class])
            ->add('compte', EntityType::class,['class'=>Compte::class,'choice_label'=>'compte_id'])
            ->add('profil', EntityType::class,['class'=>Profil::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection'=>false
        ]);
    }
}