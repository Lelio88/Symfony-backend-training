<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'un nouvel objet Faker
        $faker = Factory::create('fr_FR');
        //Création de nos 5 catégories
        for ($c = 0; $c < 5; $c++) {
            //Création d'un nouvel objet Tag
            $tag = new Tag();
            //On nourrit l'objet Tag
            $tag->setName($faker->colorName());
            //On fait persister les données
            $manager->persist($tag);
        }
        //On push le tout en BDD
        $manager->flush();
        //Réccupération de tous les tags en BDD
        $tags = $manager->getRepository(Tag::class)->findAll();

        //Création entre 15 et 30 tâches aléatoirement
        for ($t = 0; $t < mt_rand(15, 30); $t++) {
            //Création d'un nouvel objet Task
            $task = new Task();
            //On nourrit l'objet Task
            $task->setName($faker->realText(30))
                ->setDescription($faker->realText(200))
                ->setCreatedAt(new \DateTimeImmutable()) //Les dates sont créées en fonction du réglage serveur
                ->setDueAt((new \DateTimeImmutable())->createFromMutable($faker->dateTimeBetween('now', '3 months')))
                ->setTag($faker->randomElement($tags)); //On assigne un tag aléatoire parmis ceux créés précédemment
            //On fait persister les données
            $manager->persist($task);
        }
        //On push le tout en BDD
        $manager->flush();
    }
}
