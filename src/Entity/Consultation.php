<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ConsultationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[Assert\NotBlank(message:"Le patient ne peut pas être vide")]
    private ?Patient $patient = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Docteur $Docteur = null;

    #[ORM\ManyToOne(inversedBy: 'consultations')]
    private ?Dossiermedical $dossiermedical = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"La date ne peut pas être vide")]
    #[Assert\Regex(
        pattern: "/^([0-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/\d{4}$/",
        message: "La date doit être au format jj/mm/aaaa"
    )]
    private ?string $date_consultation = null;

    /*#[ORM\Column(length: 255)]
    #[Assert\Regex(pattern:"/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/",message:"Veuillez saisir uniquement des lettres")]
        #[Assert\NotBlank(message:'Le contenu ne peut pas etre vide')]
    private ?string $maladie_chronique = null;

    #[ORM\Column(length: 255)]
    private ?string $resultat_analyse = null;*/

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    public function getDocteur(): ?Docteur
    {
        return $this->Docteur;
    }

    public function setDocteur(?Docteur $Docteur): static
    {
        $this->Docteur = $Docteur;

        return $this;
    }

    public function getDossiermedical(): ?Dossiermedical
    {
        return $this->dossiermedical;
    }

    public function setDossiermedical(?Dossiermedical $dossiermedical): static
    {
        $this->dossiermedical = $dossiermedical;

        return $this;
    }

    public function getDateConsultation(): ?string
    {
        return $this->date_consultation;
    }

    public function setDateConsultation(string $date_consultation): static
    {
        $this->date_consultation = $date_consultation;

        return $this;
    }


  
}
