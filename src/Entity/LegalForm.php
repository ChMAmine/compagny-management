<?php

namespace App\Entity;

use App\Repository\LegalFormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity=Society::class, mappedBy="legalForm")
     */
    private $societies;

    /**
     * @ORM\OneToMany(targetEntity=Version::class, mappedBy="legalForm")
     */
    private $version;

    public function __construct()
    {
        $this->societies = new ArrayCollection();
        $this->version = new ArrayCollection();
    }

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

    public function __toString(): string{
        return $this->name;
    }

    /**
     * @return Collection|Society[]
     */
    public function getSocieties(): Collection
    {
        return $this->societies;
    }

    public function addSociety(Society $society): self
    {
        if (!$this->societies->contains($society)) {
            $this->societies[] = $society;
            $society->setLegalForm($this);
        }

        return $this;
    }

    public function removeSociety(Society $society): self
    {
        if ($this->societies->removeElement($society)) {
            // set the owning side to null (unless already changed)
            if ($society->getLegalForm() === $this) {
                $society->setLegalForm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Version[]
     */
    public function getVersion(): Collection
    {
        return $this->version;
    }

    public function addVersion(Version $version): self
    {
        if (!$this->version->contains($version)) {
            $this->version[] = $version;
            $version->setLegalForm($this);
        }

        return $this;
    }

    public function removeVersion(Version $version): self
    {
        if ($this->version->removeElement($version)) {
            // set the owning side to null (unless already changed)
            if ($version->getLegalForm() === $this) {
                $version->setLegalForm(null);
            }
        }

        return $this;
    }
}
