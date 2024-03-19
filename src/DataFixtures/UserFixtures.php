<?php

namespace App\DataFixtures;

use App\Entity\DoctorUser;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $u1= new User();
        $u1->setFirstName("Harold");
        $u1->setLastName("JEAN");
        $u1->setMailUser("jharold2001@yahoo.br");
        $u1->setAddress("Teresina calle 23 , 560099");
        $u1->setPassword("Cocodepapa");
        $u1->setFoneUser(+ 5145453540);
        $u1->setRoles(DoctorUser::class);
        $u1->setCreatedAt(2022/02/06);
        $u1->setUpdatedAt(2023/06/02);

        // $product = new Product();
        // $manager->persist($produc->st);

        $manager->flush();
    }
}
