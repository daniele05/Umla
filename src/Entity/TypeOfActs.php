<?php

namespace App\Entity;

use App\Repository\TypeOfActsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeOfActsRepository::class)]
class TypeOfActs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $actName = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionAct = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\OneToMany(targetEntity: Appointment::class, mappedBy: 'typeofacts')]
    private Collection $appointments;

    public function __construct()
    {
        $this->appointments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActName(): ?string
    {
        return $this->actName;
    }

    public function setActName(string $actName): static
    {
        $this->actName = $actName;

        return $this;
    }

    public function getDescriptionAct(): ?string
    {
        return $this->descriptionAct;
    }

    public function setDescriptionAct(string $descriptionAct): static
    {
        $this->descriptionAct = $descriptionAct;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

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
            $appointment->setTypeofacts($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointments->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getTypeofacts() === $this) {
                $appointment->setTypeofacts(null);
            }
        }

        return $this;
    }
}
