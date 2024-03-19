<?php

namespace App\Entity;

use App\Repository\MedicalReportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicalReportRepository::class)]
class MedicalReport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $medical_Content = null;

    #[ORM\Column(length: 255)]
    private ?string $attachements = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'medicalReports')]
    private Collection $user;

    #[ORM\OneToMany(targetEntity: Prescription::class, mappedBy: 'medicalreport')]
    private Collection $prescriptions;

    #[ORM\ManyToMany(targetEntity: DoctorUser::class, mappedBy: 'medicalreports')]
    private Collection $doctorUsers;

    #[ORM\ManyToOne(inversedBy: 'medicalreport')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Appointment $appointment = null;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->prescriptions = new ArrayCollection();
        $this->doctorUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicalContent(): ?string
    {
        return $this->medical_Content;
    }

    public function setMedicalContent(string $medical_Content): static
    {
        $this->medical_Content = $medical_Content;

        return $this;
    }

    public function getAttachements(): ?string
    {
        return $this->attachements;
    }

    public function setAttachements(string $attachements): static
    {
        $this->attachements = $attachements;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Prescription>
     */
    public function getPrescriptions(): Collection
    {
        return $this->prescriptions;
    }

    public function addPrescription(Prescription $prescription): static
    {
        if (!$this->prescriptions->contains($prescription)) {
            $this->prescriptions->add($prescription);
            $prescription->setMedicalreport($this);
        }

        return $this;
    }

    public function removePrescription(Prescription $prescription): static
    {
        if ($this->prescriptions->removeElement($prescription)) {
            // set the owning side to null (unless already changed)
            if ($prescription->getMedicalreport() === $this) {
                $prescription->setMedicalreport(null);
            }
        }

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
            $doctorUser->addMedicalreport($this);
        }

        return $this;
    }

    public function removeDoctorUser(DoctorUser $doctorUser): static
    {
        if ($this->doctorUsers->removeElement($doctorUser)) {
            $doctorUser->removeMedicalreport($this);
        }

        return $this;
    }

    public function getAppointment(): ?Appointment
    {
        return $this->appointment;
    }

    public function setAppointment(?Appointment $appointment): static
    {
        $this->appointment = $appointment;

        return $this;
    }


}
