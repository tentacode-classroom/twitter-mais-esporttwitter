<?php

namespace App\DataFixtures;

use App\Entity\Message;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class MessageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname("Thomas");
        $user->setLastname("Llobel");
        $user->setEmail("thomas.llobel@ynov.com");
        $user->setPassword(password_hash("password", PASSWORD_BCRYPT,$options = ['cost' => 12,]));
        $user->setName("inconnu000");
        $manager->persist($user);

        $user1 = new User();
        $user1->setFirstname("Gabriel");
        $user1->setLastname("Pillet");
        $user1->setEmail("gabriel.pillet@ynov.com");
        $user1->setPassword(password_hash("password", PASSWORD_BCRYPT,$options = ['cost' => 12,]));
        $user1->setNname("Tentacode");
        $manager->persist($user1);

        $message = new Message();
        $message->setContent("Bienvenue à @Xvernia dans la team @AzureDream");
        $message->setPublication(10);
        $message->setUserId($user);
        $manager->persist($message);

        $message1 = new Message();
        $message1->setContent("Bienvenue à @Inconnu000 dans la team @AzureDream");
        $message1->setPublication(15);
        $message1->setUserId($user);
        $manager->persist($message1);

        $message2 = new Message();
        $message2->setContent("Nouveau tournoi prévu Dimanche à 21h, cashprize de 1000€");
        $message2->setPublication(5);
        $message2->setUserId($user1);
        $manager->persist($message2);

        $message3 = new Message();
        $message3->setContent("Bienvenue à @Philippe64 dans la team @AzureDream");
        $message3->setPublication(42);
        $message3->setUserId($user);
        $manager->persist($message3);

        $message4 = new Message();
        $message4->setContent("Une game très serrée hier pour nous, heureusement nous avons réussi à focus et prendre l'avantage");
        $message4->setPublication(59);
        $message4->setUserId($user1);
        $manager->persist($message4);

        $message5 = new Message();
        $message5->setContent("Nouveau sponsor pour notre équipe. Un grand merci à @Genesia pour nous supporter vers les sommets de l'Esport");
        $message5->setPublication(12);
        $message5->setUserId($user);
        $manager->persist($message5);

        $manager->flush();
    }


}
