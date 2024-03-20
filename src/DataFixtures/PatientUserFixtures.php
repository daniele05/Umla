<?php

namespace App\DataFixtures;

use App\Entity\PatientUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PatientUserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $pu1= new PatientUser();
        $pu1 -> setPicPatientUser('public/assets/image/doct1.jpg')
            ->setBirthDate(2001-06-10)
            ;
        $manager->persist($pu1);

        $pu2= new PatientUser();
        $pu2 -> setPicPatientUser('public/assets/image/doct1.jpg')
            ->setBirthDate(2002-06-10)
        ;
        $manager->persist($pu2);

        $pu3= new PatientUser();
        $pu3 -> setPicPatientUser('public/assets/image/doct1.jpg')
            ->setBirthDate(2008-06-10)
        ;
        $manager->persist($pu3);

        $pu4= new PatientUser();
        $pu4 -> setPicPatientUser('public/assets/image/doct1.jpg')
            ->setBirthDate(2010-06-10)
        ;
        $manager->persist($pu4);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
