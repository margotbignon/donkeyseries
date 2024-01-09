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
        $user->setEmail('admin@admin.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword('$2y$13$OD5FrmL1/jfUY1boTKI/.eHIKABCsP/JIK3LNcmybOu0uoZm/V.E.');
        $manager->persist($user);

        $manager->flush();
    }
}
