<?php

namespace App\DataFixtures;

use App\Entity\MedicalReport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MedicalReportFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $mr1 = new MedicalReport();
        $mr1 ->setMedicalContent('string')
             ->setAttachements('public/assets/images/prescription')
             ->setCreatedAt(2013-12-11)
             ->setUpdatedAt(2014-01-10)
            ;
        $manager->persist($mr1);

        $mr2 = new MedicalReport();
        $mr2 ->setMedicalContent('string')
            ->setAttachements('public/assets/images/prescription')
            ->setCreatedAt(2013-12-18)
            ->setUpdatedAt(2014-01-20)
        ;
        $manager->persist($mr2);

        $mr3 = new MedicalReport();
        $mr3 ->setMedicalContent('string')
            ->setAttachements('public/assets/images/prescription')
            ->setCreatedAt(2013-06-11)
            ->setUpdatedAt(2014-05-10)
        ;
        $manager->persist($mr3);

        $mr4 = new MedicalReport();
        $mr4 ->setMedicalContent('string')
            ->setAttachements('public/assets/images/prescription')
            ->setCreatedAt(2013-07-11)
            ->setUpdatedAt(2014-12-10)
        ;
        $manager->persist($mr4);


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
