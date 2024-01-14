<?php

namespace App\DataFixtures;

use App\Entity\Penality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class PenalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $penality = new Penality();
         $penality->setLibelle('Petite Insulte');
         $penality->setMontant(0.10);
         $manager->persist($penality);

         $penality = new Penality();
         $penality->setLibelle('Grosse Insulte');
         $penality->setMontant(0.30);
         $manager->persist($penality);

        $manager->flush();
    }
}
