<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialityRepository::class)]
class Speciality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $speciality_Name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description_Speciality = null;

    #[ORM\ManyToMany(targetEntity: DoctorUser::class, mappedBy: 'speciality')]
    private Collection $doctorUsers;

    public function __construct()
    {
        $this->doctorUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialityName(): ?string
    {
        return $this->speciality_Name;
    }

    public function setSpecialityName(string $speciality_Name): static
    {
        $this->speciality_Name = $speciality_Name;

        return $this;
    }

    public function getDescriptionSpeciality(): ?string
    {
        return $this->description_Speciality;
    }

    public function setDescriptionSpeciality(string $description_Speciality): static
    {
        $this->description_Speciality = $description_Speciality;

        return $this;
    }

    /**
     * @return Collection<int, DoctorUser>
     */
    public function getDoctorUsers(): Collection
    {
        return $this->doctorUsers;
    }

    public function addDoctorUser(DoctorUser $doctorUser): static
    {
        if (!$this->doctorUsers->contains($doctorUser)) {
            $this->doctorUsers->add($doctorUser);
            $doctorUser->addSpeciality($this);
        }

        return $this;
    }

    public function removeDoctorUser(DoctorUser $doctorUser): static
    {
        if ($this->doctorUsers->removeElement($doctorUser)) {
            $doctorUser->removeSpeciality($this);
        }

        return $this;
    }
}
