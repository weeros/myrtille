<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

#[ORM\Entity(repositoryClass: StationRepository::class)]
class Station
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  #[Groups(["public-view"])]
  private ?int $id = null;

  #[ORM\Column]
  #[Groups(["public-view"])]
  private ?int $gid = null;

  #[ORM\Column(length: 255)]
  #[Groups(["public-view"])]
  private ?string $commune = null;

  #[ORM\Column(length: 255)]
  #[Groups(["public-view"])]
  private ?string $etat = null;

  #[ORM\Column(length: 255)]
  #[Groups(["public-view"])]
  private ?string $nom = null;

  #[ORM\Column(nullable: true)]
  #[Groups(["public-view"])]
  private ?int $nbplaces = null;

  #[ORM\Column(nullable: true)]
  #[Groups(["public-view"])]
  private ?int $nbvelos = null;

  #[ORM\Column(nullable: true)]
  #[Groups(["public-view"])]
  private ?int $nbclassiq = null;

  #[ORM\Column(nullable: true)]
  #[Groups(["public-view"])]
  private ?int $nbelec = null;

  #[ORM\Column]
  #[Groups(["public-view"])]
  private ?float $latitude = null;

  #[ORM\Column]
  #[Groups(["public-view"])]
  private ?float $longitude = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
  #[Groups(["public-view"])]
  #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s'])]
  private ?\DateTimeInterface $cdate = null;

  #[ORM\Column(type: Types::DATETIME_MUTABLE)]
  #[Context([DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s'])]
  #[Groups(["public-view"])]
  private ?\DateTimeInterface $mdate = null;


  public function getId(): ?int
  {
    return $this->id;
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

  public function getCommune(): ?string
  {
    return $this->commune;
  }

  public function setCommune(string $commune): static
  {
    $this->commune = $commune;

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

  public function getEtat(): ?string
  {
    return $this->etat;
  }

  public function setEtat(string $etat): static
  {
    $this->etat = $etat;

    return $this;
  }

  public function getNbplaces(): ?int
  {
    return $this->nbplaces;
  }

  public function setNbplaces(?int $nbplaces): static
  {
    $this->nbplaces = $nbplaces;

    return $this;
  }

  public function getNbvelos(): ?int
  {
    return $this->nbvelos;
  }

  public function setNbvelos(?int $nbvelos): static
  {
    $this->nbvelos = $nbvelos;

    return $this;
  }

  public function getNbclassiq(): ?int
  {
    return $this->nbclassiq;
  }

  public function setNbclassiq(?int $nbclassiq): static
  {
    $this->nbclassiq = $nbclassiq;

    return $this;
  }

  public function getNbelec(): ?int
  {
    return $this->nbelec;
  }

  public function setNbelec(?int $nbelec): static
  {
    $this->nbelec = $nbelec;

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

  public function getCdate(): ?\DateTimeInterface
  {
    return $this->cdate;
  }

  public function setCdate(?\DateTimeInterface $cdate): static
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
}
