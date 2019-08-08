<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class SuperAdminFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
{
    $this->encoder = $encoder;
}
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('superadmin');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $password = $this->encoder->encodePassword($user, 'sowpoulo');
        $user->setPassword($password);
        $user->setPrenom("Djiby");
        $user->setNom("Sow");
        $user->setMail("baesow@gmail.com");
        $user->setTelephone(772795723);
        $user->setAdresse("Sebikotane");
        $user->setCni(112519951236);
        $user->setImageName("image.png");
        $user->setUpdatedAt(new \DateTime());
        $manager->persist($user);
        $manager->flush();
    }
}  
