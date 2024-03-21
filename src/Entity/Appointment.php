<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $scheduled_date = null;

    #[ORM\Column(length: 255)]
    private ?string $place = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(targetEntity: MedicalReport::class, mappedBy: 'appointment')]
    private Collection $medicalreport;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?TypeOfActs $typeofacts = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    private ?PatientUser $patientUser = null;

    public function __construct()
    {
        $this->medicalreport = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScheduledDate(): ?\DateTimeInterface
    {
        return $this->scheduled_date;
    }

    public function setScheduledDate(\DateTimeInterface $scheduled_date): static
    {
        $this->scheduled_date = $scheduled_date;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, MedicalReport>
     */
    public function getMedicalreport(): Collection
    {
        return $this->medicalreport;
    }

    public function addMedicalreport(MedicalReport $medicalreport): static
    {
        if (!$this->medicalreport->contains($medicalreport)) {
            $this->medicalreport->add($medicalreport);
            $medicalreport->setAppointment($this);
        }

        return $this;
    }

    public function removeMedicalreport(MedicalReport $medicalreport): static
    {
        if ($this->medicalreport->removeElement($medicalreport)) {
            // set the owning side to null (unless already changed)
            if ($medicalreport->getAppointment() === $this) {
                $medicalreport->setAppointment(null);
            }
        }

        return $this;
    }

    public function getTypeofacts(): ?TypeOfActs
    {
        return $this->typeofacts;
    }

    public function setTypeofacts(?TypeOfActs $typeofacts): static
    {
        $this->typeofacts = $typeofacts;

        return $this;
    }

    public function getPatientUser(): ?PatientUser
    {
        return $this->patientUser;
    }

    public function setPatientUser(?PatientUser $patientUser): static
    {
        $this->patientUser = $patientUser;

        return $this;
    }
}
