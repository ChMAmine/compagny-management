<?php

namespace App\Entity;

use App\Repository\LegalFormRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LegalFormRepository::class)
 */
class LegalForm
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
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Society::class, inversedBy="legalForm", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $society;

    /**
     * @ORM\OneToOne(targetEntity=Archive::class, inversedBy="legalForm", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSociety(): ?Society
    {
        return $this->society;
    }

    public function setSociety(Society $society): self
    {
        $this->society = $society;

        return $this;
    }

    public function getRelation(): ?Archive
    {
        return $this->relation;
    }

    public function setRelation(Archive $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function __toString(): string{
        return $this->name;
    }
}
