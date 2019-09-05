<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Expediteur;
use App\Entity\Transaction;
use App\Entity\Beneficiaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('agence')
            ->add('frais')
            ->add('datetransaction')
            ->add('codetransaction')
            ->add('montant')
            ->add('cni')
            ->add('typetransaction')
            ->add('total')
            ->add('beneficiaire', EntityType::class,['class'=>Beneficiaire::class])
            ->add('expediteur', EntityType::class,['class'=>Expediteur::class])
            ->add('user', EntityType::class,['class'=>User::class])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
