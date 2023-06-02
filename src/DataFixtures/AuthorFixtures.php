<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture 
{
    const AUTHOR_RB = 'AUTHOR_RB';
    const AUTHOR_IA = 'AUTHOR_IA';
    
    public function load(ObjectManager $manager): void
    {
        $author = new Author();
        $author->setName("René Barjavel");
        $manager->persist($author);
        $this->addReference(self::AUTHOR_RB, $author);
        $manager->flush();

        $author = new Author();
        $author->setName("Isaac Asimov");
        $manager->persist($author);
        $this->addReference(self::AUTHOR_IA, $author);
        $manager->flush();
    }
}


