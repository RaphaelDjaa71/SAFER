<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: SAFER::class)]
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
            $sAFER->setType($this);
        }

        return $this;
    }

    public function removeSAFER(SAFER $sAFER): self
    {
        if ($this->sAFERs->removeElement($sAFER)) {
            // set the owning side to null (unless already changed)
            if ($sAFER->getType() === $this) {
                $sAFER->setType(null);
            }
        }

        return $this;
    }
}
