<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $book = new Book();
        $book->setTitle("La nuit des temps");
        $book->setDescription("Découverte sur <i>l'Antatrctique</i>...");
        $book->setAuthor($this->getReference(AuthorFixtures::AUTHOR_RB));
        $manager->persist($book);

        $manager->flush();

        $book = new Book();
        $book->setTitle("Les cavernes d'acier");
        $book->setDescription("Meutre dans le tunet des <i>spaciens</i>");
        $book->setAuthor($this->getReference(AuthorFixtures::AUTHOR_IA));
        $manager->persist($book);

        $manager->flush();
        $book = new Book();
        $book->setTitle("Les robots de l'aube");
        $book->setDescription("L'avènement des <i>robots</i>");
        $book->setAuthor($this->getReference(AuthorFixtures::AUTHOR_IA));
        $manager->persist($book);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AuthorFixtures::class,
        ];
    }

    
}
