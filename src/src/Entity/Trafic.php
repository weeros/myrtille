<?php

namespace App\Entity;

use App\Repository\TraficRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

#[ORM\Entity(repositoryClass: TraficRepository::class)]
class Trafic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
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

    #[ORM\Column]
    private array $geoShape = [];

    #[ORM\Column(length: 255)]
    private ?string $typevoie = null;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getGeoShape(): array
    {
        return $this->geoShape;
    }

    public function setGeoShape(array $geoShape): static
    {
        $this->geoShape = $geoShape;

        return $this;
    }

    public function getTypevoie(): ?string
    {
        return $this->typevoie;
    }

    public function setTypevoie(string $typevoie): static
    {
        $this->typevoie = $typevoie;

        return $this;
    }
}
