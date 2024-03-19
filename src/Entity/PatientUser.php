<?php

namespace App\Entity;

use App\Repository\PatientUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PatientUserRepository::class)]

class PatientUser extends User
{

    #[ORM\GeneratedValue]

    #[ORM\Column(length: 255)]
    private ?string $pic_Patient_User = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\ManyToMany(targetEntity: Appointment::class, mappedBy: 'patientuser')]
    private Collection $appointments;

    public function __construct()
    {
        parent::__construct();
        $this->appointments = new ArrayCollection();
    }


    public function getPicPatientUser(): ?string
    {
        return $this->pic_Patient_User;
    }

    public function setPicPatientUser(string $pic_Patient_User): static
    {
        $this->pic_Patient_User = $pic_Patient_User;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return Collection<int, Appointment>
     */
    public function getAppointments(): Collection
    {
        return $this->appointments;
    }

    public function addAppointment(Appointment $appointment): static
    {
        if (!$this->appointments->contains($appointment)) {
            $this->appointments->add($appointment);
            $appointment->addPatientuser($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointments->removeElement($appointment)) {
            $appointment->removePatientuser($this);
        }

        return $this;
    }
}
