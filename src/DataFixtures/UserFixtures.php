<?php

namespace App\DataFixtures;

use App\Controller\AdminController;
use App\Entity\DoctorUser;
use App\Entity\PatientUser;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $u1= new User();
        $u1->setFirstName("Harold")
           ->setLastName("JEAN")
           ->setMailUser("jharold2001@yahoo.br")
           ->setAddress("Teresina calle 23, 560099")
           ->setPassword("Cocodepapa")
           ->setFoneUser(+5145453540)
           ->setRoles(DoctorUser::class,PatientUser::class,AdminController::class)
           ->setCreatedAt(2022/02/06)
           ->setUpdatedAt(2023/06/02)
        ;
        $manager->persist($u1);

        $u2= new User();
        $u2->setFirstName("Alex")
            ->setLastName("HAROLD")
            ->setMailUser("alharold2000@yahoo.br")
            ->setAddress("Barcelona calle 30, 132456")
            ->setPassword("lebouboudemaman")
            ->setFoneUser(+5145453546)
            ->setRoles(DoctorUser::class,PatientUser::class,AdminController::class)
            ->setCreatedAt(2022/04/06)
            ->setUpdatedAt(2023/06/02)
        ;
        $manager->persist($u2);

        $u3= new User();
        $u3->setFirstName("Axel")
            ->setLastName("AUREL")
            ->setMailUser("jharold2005@yahoo.es")
            ->setAddress("Sao Paolo calle 25, 560099")
            ->setPassword("lebebedemaman")
            ->setFoneUser(+5145453540)
            ->setRoles(DoctorUser::class,PatientUser::class,AdminController::class)
            ->setCreatedAt(2022/02/20)
            ->setUpdatedAt(2023/06/02)
        ;
        $manager->persist($u3);

        $u4= new User();
        $u4->setFirstName("Daniele")
            ->setLastName("KONDA")
            ->setMailUser("kondaDaniele1978@yahoo.fr")
            ->setAddress("Wissous 23 Rue des écoles, 560099")
            ->setPassword("Cocodepapa")
            ->setFoneUser(+5145453540)
            ->setRoles(DoctorUser::class,PatientUser::class,AdminController::class)
            ->setCreatedAt(2022/02/06)
            ->setUpdatedAt(2023/06/02)
        ;
        $manager->persist($u4);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
