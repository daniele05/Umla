<?php

namespace App\Entity;

use App\Repository\DoctorUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: DoctorUserRepository::class)]

class DoctorUser extends User
{

    #[ORM\GeneratedValue]

    #[ORM\Column]
    private ?int $RPPS_Number = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $cv_Doctor = null;

    #[ORM\Column(length: 255)]
    private ?string $pic_Doctor = null;

    #[ORM\ManyToMany(targetEntity: MedicalReport::class, inversedBy: 'doctorUsers')]
    private Collection $medicalreports;

    #[ORM\ManyToMany(targetEntity: Speciality::class, inversedBy: 'doctorUsers')]
    private Collection $speciality;

    public function __construct()
    {
        $this->medicalreports = new ArrayCollection();
        $this->speciality = new ArrayCollection();
    }



    public function getRPPSNumber(): ?int
    {
        return $this->RPPS_Number;
    }

    public function setRPPSNumber(int $RPPS_Number): static
    {
        $this->RPPS_Number = $RPPS_Number;

        return $this;
    }

    public function getCvDoctor(): ?string
    {
        return $this->cv_Doctor;
    }

    public function setCvDoctor(string $cv_Doctor): static
    {
        $this->cv_Doctor = $cv_Doctor;

        return $this;
    }

    public function getPicDoctor(): ?string
    {
        return $this->pic_Doctor;
    }

    public function setPicDoctor(string $pic_Doctor): static
    {
        $this->pic_Doctor = $pic_Doctor;

        return $this;
    }

    /**
     * @return Collection<int, MedicalReport>
     */
    public function getMedicalreports(): Collection
    {
        return $this->medicalreports;
    }

    public function addMedicalreport(MedicalReport $medicalreport): static
    {
        if (!$this->medicalreports->contains($medicalreport)) {
            $this->medicalreports->add($medicalreport);
        }

        return $this;
    }

    public function removeMedicalreport(MedicalReport $medicalreport): static
    {
        $this->medicalreports->removeElement($medicalreport);

        return $this;
    }

    /**
     * @return Collection<int, Speciality>
     */
    public function getSpeciality(): Collection
    {
        return $this->speciality;
    }

    public function addSpeciality(Speciality $speciality): static
    {
        if (!$this->speciality->contains($speciality)) {
            $this->speciality->add($speciality);
        }

        return $this;
    }

    public function removeSpeciality(Speciality $speciality): static
    {
        $this->speciality->removeElement($speciality);

        return $this;
    }
}
