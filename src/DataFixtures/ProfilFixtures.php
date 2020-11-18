<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfilFixtures extends Fixture
{
    public const PROFIL_REFERENCE = 'profil';


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $profils = ['Admin', 'Formateur', 'Apprenant', 'CM'];
        for ($i = 0; $i <4; $i++) {
            $profil = new Profil();
            
            //foreach ($profils as $libelle ) {
                $profil = new Profil();

            $profil->setLibelle($faker->randomElement(['Apprenant','Formateur','CM','Admin']))
                   ->setUsers($faker->randomElement([1],[20],[10]))
                   ->setArchivage(0);
            $manager->persist($profil);
           // }

            $manager->flush();
        }
    }

}
    