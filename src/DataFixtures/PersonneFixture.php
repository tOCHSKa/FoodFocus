<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;;

class PersonneFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $personne = new Personne();
            $personne->setFirstname($faker->firstName);
            $personne->setName($faker->name);
            $personne->setAge($faker->numberBetween(18, 65));
            $personne->setEmail($faker->email);
            $personne->setPassword($faker->password);
            $personne->setSexe($faker->numberBetween($min = 1, $max = 2));

            $manager->persist($personne);
        }

        $manager->flush();
    }
}
