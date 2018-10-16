<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints as Assert;


class MessageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $message = new Message();
        $message->setContent("Bienvenue à @Xvernia dans la team @AzureDream");
        $message->setPublication(10);
        $message->setUserId(1);
        $manager->persist($message);

        $message1 = new Message();
        $message1->setContent("Bienvenue à @Inconnu000 dans la team @AzureDream");
        $message1->setPublication(15);
        $message1->setUserId(1);
        $manager->persist($message1);

        $message2 = new Message();
        $message2->setContent("Bienvenue à @Philippe64 dans la team @AzureDream");
        $message2->setPublication(42);
        $message2->setUserId(1);
        $manager->persist($message2);

        $message3 = new Message();
        $message3->setContent("Nouveau tournoi prévu Dimanche à 21h, cashprize de 1000€");
        $message3->setPublication(5);
        $message3->setUserId(2);
        $manager->persist($message3);

        $message4 = new Message();
        $message4->setContent("Une game très serrée hier pour nous, heureusement nous avons réussi à focus et prendre l'avantage");
        $message4->setPublication(59);
        $message4->setUserId(3);
        $manager->persist($message4);

        $message5 = new Message();
        $message5->setContent("Nouveau sponsor pour notre équipe. Un grand merci à @Genesia pour nous supporter vers les sommets de l'Esport");
        $message5->setPublication(12);
        $message5->setUserId(4);
        $manager->persist($message5);

        $manager->flush();
    }
}
