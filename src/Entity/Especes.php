<?php

namespace App\Entity;

use App\Repository\EspecesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspecesRepository::class)
 */
class Especes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Especes::class, inversedBy="especes")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity=Especes::class, mappedBy="parent")
     */
    private $especes;

    public function __construct()
    {
        $this->especes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getEspeces(): Collection
    {
        return $this->especes;
    }

    public function addEspece(self $espece): self
    {
        if (!$this->especes->contains($espece)) {
            $this->especes[] = $espece;
            $espece->setParent($this);
        }

        return $this;
    }

    public function removeEspece(self $espece): self
    {
        if ($this->especes->removeElement($espece)) {
            // set the owning side to null (unless already changed)
            if ($espece->getParent() === $this) {
                $espece->setParent(null);
            }
        }

        return $this;
    }
}
