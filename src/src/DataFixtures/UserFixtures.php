<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    for ($i = 0; $i < 50; $i++) {
      $user = new User();
      $user->setName('name '.$i);
      $user->setEmail('mon_email_'.$i.'@email.com');
      $manager->persist($user);
    }

    $manager->flush();
  }
}