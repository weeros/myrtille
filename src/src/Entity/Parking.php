<?php

namespace App\Entity;

use App\Repository\ParkingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

#[ORM\Entity(repositoryClass: ParkingRepository::class)]
class Parking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $insee = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $tarif_type = null;

    #[ORM\Column]
    private ?int $places_velos = null;

    #[ORM\Column]
    private ?int $places_voitures = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s'])]
    private ?\DateTimeInterface $cdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s'])]
    private ?\DateTimeInterface $mdate = null;

    #[ORM\Column]
    private ?int $gid = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $places_total = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $informations = null;

    #[ORM\Column]
    private ?float $latitude = null;

    #[ORM\Column]
    private ?float $longitude = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInsee(): ?string
    {
        return $this->insee;
    }

    public function setInsee(string $insee): static
    {
        $this->insee = $insee;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTarifType(): ?string
    {
        return $this->tarif_type;
    }

    public function setTarifType(string $tarif_type): static
    {
        $this->tarif_type = $tarif_type;

        return $this;
    }


    public function getPlacesVelos(): ?int
    {
        return $this->places_velos;
    }

    public function setPlacesVelos(int $places_velos): static
    {
        $this->places_velos = $places_velos;

        return $this;
    }

    public function getPlacesVoitures(): ?int
    {
        return $this->places_voitures;
    }

    public function setPlacesVoitures(int $places_voitures): static
    {
        $this->places_voitures = $places_voitures;

        return $this;
    }

    public function getCdate(): ?\DateTimeInterface
    {
        return $this->cdate;
    }

    public function setCdate(\DateTimeInterface $cdate): static
    {
        $this->cdate = $cdate;

        return $this;
    }

    public function getMdate(): ?\DateTimeInterface
    {
        return $this->mdate;
    }

    public function setMdate(\DateTimeInterface $mdate): static
    {
        $this->mdate = $mdate;

        return $this;
    }

    public function getGid(): ?int
    {
        return $this->gid;
    }

    public function setGid(int $gid): static
    {
        $this->gid = $gid;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPlacesTotal(): ?string
    {
        return $this->places_total;
    }

    public function setPlacesTotal(string $places_total): static
    {
        $this->places_total = $places_total;

        return $this;
    }

    public function getInformations(): ?string
    {
        return $this->informations;
    }

    public function setInformations(string $informations): static
    {
        $this->informations = $informations;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }
}
