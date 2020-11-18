<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Apprenant;
use App\Entity\ProfilDeSortie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    public const USER_REFERENCE = 'user';


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        
        $profils = ['Admin', 'Formateur', 'Apprenant', 'CM'];
        $profilsortie = ['Developpeur Front', 'CMS', 'Integrateur', 'Data', 'Designer', 'Fullback', 'CM'];
        $tabEntity=[];
      //profilsortie
       foreach($profilsortie as $libelle){
            $profilsortie = new ProfilDeSortie();
            $profilsortie->setLibelle($libelle)
                         ->setArchivage(0);
            $tabEntity[]= $profilsortie;
            $manager->persist($profilsortie);

           
         }

         foreach($profils as $libelle) {
             for ($i = 0; $i < 4; $i++) {


            //on genere apprenant
            $user = new User();

           // if($libelle == "Apprenant"){

         $apprenant= new Apprenant();
         $apprenant->setAdresse($faker->address)
                ->setCategorie($faker->randomElement(['Faible', 'Abien', 'Exellent', 'Tbien']))
                ->setStatut('Actif')
                ->setInfocomplementaire($faker->text)
                ->setProfilsortie($faker->randomElement(['Developpeur Front', 'CMS', 'Integrateur', 'Data', 'Designer', 'Fullback', 'CM']));

               

           // }
            $manager->persist($apprenant);
           
           // $hash = $this->encoder->encodePassword($user, "password");

            $user->setNom($faker->lastName)
                 ->setPrenom($faker->firstName)
                 ->setUsername($faker->userName)
                 ->setGenre($faker->randomElement(["Femme","Homme"]))
                 ->setPassword("Password")
                 ->setEmail($faker->email)
                 ->setTel($faker->phoneNumber)
                 ->setPhoto("default.png")
                 ->setArchivage(0)
                 ->setProfil($libelle);

            $manager->persist($user);

        }


        $manager->flush();
        
    }
}
}