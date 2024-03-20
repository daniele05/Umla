<?php

namespace App\DataFixtures;

use App\Entity\Prescription;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PrescriptionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $p1 = new Prescription();
        $p1 -> setPrescriptionContent('public/assets/images/prescription.png')
            -> setCreatedAt(2013-06-10)
            -> setUpdatedAt(2013-11-12)
            ;
        $manager->persist($p1);


        $p2 = new Prescription();
        $p2 -> setPrescriptionContent('public/assets/images/prescription.png')
            -> setCreatedAt(2013-10-10)
            -> setUpdatedAt(2013-05-12)
        ;
        $manager->persist($p2);


        $p3 = new Prescription();
        $p3 -> setPrescriptionContent('public/assets/images/prescription.png')
            -> setCreatedAt(2013-06-11)
            -> setUpdatedAt(2013-11-12)
        ;
        $manager->persist($p3);


        $p4 = new Prescription();
        $p4 -> setPrescriptionContent('public/assets/images/prescription.png')
            -> setCreatedAt(2013-06-10)
            -> setUpdatedAt(2013-11-02)
        ;
        $manager->persist($p1);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
