<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'Category', targetEntity: Biens::class)]
    private Collection $biens;

    #[ORM\OneToMany(mappedBy: 'Catégorie', targetEntity: SAFER::class)]
    private Collection $sAFERs;

    public function __construct()
    {
        $this->biens = new ArrayCollection();
        $this->sAFERs = new ArrayCollection();
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

    public function __toString() {
        return $this->getName();
    }

    /**
     * @return Collection<int, Biens>
     */
    public function getBiens(): Collection
    {
        return $this->biens;
    }

    public function addBien(Biens $bien): self
    {
        if (!$this->biens->contains($bien)) {
            $this->biens->add($bien);
            $bien->setCategory($this);
        }

        return $this;
    }

    public function removeBien(Biens $bien): self
    {
        if ($this->biens->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getCategory() === $this) {
                $bien->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SAFER>
     */
    public function getSAFERs(): Collection
    {
        return $this->sAFERs;
    }

    public function addSAFER(SAFER $sAFER): self
    {
        if (!$this->sAFERs->contains($sAFER)) {
            $this->sAFERs->add($sAFER);
            $sAFER->setCategorie($this);
        }

        return $this;
    }

    public function removeSAFER(SAFER $sAFER): self
    {
        if ($this->sAFERs->removeElement($sAFER)) {
            // set the owning side to null (unless already changed)
            if ($sAFER->getCategorie() === $this) {
                $sAFER->setCategorie(null);
            }
        }

        return $this;
    }
}