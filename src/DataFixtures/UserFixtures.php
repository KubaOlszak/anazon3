<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $user->setEmail('admin@admin.com');
        $user->setPassword('$2y$13$H.sguIA0isbC57ofzVTDsOAXkcpx9BppzcINK7ASnwJvy16ONmUoa');
        $manager->persist($user);

        $manager->flush();
    }
}
