<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'Catégorie', targetEntity: Bien::class)]
    private Collection $sAFERs;

    public function __construct()
    {
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
     * @return Collection<int, Bien>
     */
    public function getSAFERs(): Collection
    {
        return $this->sAFERs;
    }

    public function addSAFER(Bien $sAFER): self
    {
        if (!$this->sAFERs->contains($sAFER)) {
            $this->sAFERs->add($sAFER);
            $sAFER->setCategorie($this);
        }

        return $this;
    }

    public function removeSAFER(Bien $sAFER): self
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
