<?php

namespace App\Entity;

use App\Repository\SocietyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocietyRepository::class)
 */
class Society
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $sirenNumber;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $cityOfRegistration;

    /**
     * @ORM\Column(type="date")
     */
    private $registration;

    /**
     * @ORM\Column(type="float")
     */
    private $capital;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=LegalForm::class, inversedBy="societies")
     */
    private $legalForm;

    /**
     * @ORM\OneToMany(targetEntity=Address::class, mappedBy="society")
     */
    private $addresses;


    public function __construct()
    {
        $this->addresses = new ArrayCollection();
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

    public function getSirenNumber(): ?int
    {
        return $this->sirenNumber;
    }

    public function setSirenNumber(int $sirenNumber): self
    {
        $this->sirenNumber = $sirenNumber;

        return $this;
    }

    public function getCityOfRegistration(): ?string
    {
        return $this->cityOfRegistration;
    }

    public function setCityOfRegistration(string $cityOfRegistration): self
    {
        $this->cityOfRegistration = $cityOfRegistration;

        return $this;
    }

    public function getRegistration(): ?\DateTimeInterface
    {
        return $this->registration;
    }

    public function setRegistration(\DateTimeInterface $registration): self
    {
        $this->registration = $registration;

        return $this;
    }

    public function getCapital(): ?float
    {
        return $this->capital;
    }

    public function setCapital(float $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getLegalForm(): ?LegalForm
    {
        return $this->legalForm;
    }

    public function setLegalForm(?LegalForm $legalForm): self
    {
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setSociety($this);
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getSociety() === $this) {
                $address->setSociety(null);
            }
        }

        return $this;
    }
}
