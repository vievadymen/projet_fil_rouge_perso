<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormateurRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FormateurRepository::class)
 */

class Formateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $groupes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $promos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $briefs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupes(): ?string
    {
        return $this->groupes;
    }

    public function setGroupes(string $groupes): self
    {
        $this->groupes = $groupes;

        return $this;
    }

    public function getPromos(): ?string
    {
        return $this->promos;
    }

    public function setPromos(string $promos): self
    {
        $this->promos = $promos;

        return $this;
    }

    public function getBriefs(): ?string
    {
        return $this->briefs;
    }

    public function setBriefs(string $briefs): self
    {
        $this->briefs = $briefs;

        return $this;
    }
}
