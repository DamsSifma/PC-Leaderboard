<?php

namespace App\Entity;

use App\Repository\ChallengeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChallengeRepository::class)]
class Challenge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    private ?int $reward = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdOn = null;

    #[ORM\ManyToOne(inversedBy: 'challenges')]
    private ?User $createdBy = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $difficulty = null;

    #[ORM\OneToMany(mappedBy: 'challenge', targetEntity: Validation::class)]
    private Collection $validations;

    #[ORM\OneToMany(mappedBy: 'challenge', targetEntity: Attempt::class)]
    private Collection $attempt;

    public function __construct()
    {
        $this->validations = new ArrayCollection();
        $this->attempt = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getReward(): ?int
    {
        return $this->reward;
    }

    public function setReward(?int $reward): self
    {
        $this->reward = $reward;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(?\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(?int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * @return Collection<int, Validation>
     */
    public function getValidations(): Collection
    {
        return $this->validations;
    }

    public function addValidation(Validation $validation): self
    {
        if (!$this->validations->contains($validation)) {
            $this->validations->add($validation);
            $validation->setChallenge($this);
        }

        return $this;
    }

    public function removeValidation(Validation $validation): self
    {
        if ($this->validations->removeElement($validation)) {
            // set the owning side to null (unless already changed)
            if ($validation->getChallenge() === $this) {
                $validation->setChallenge(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Attempt>
     */
    public function getAttempt(): Collection
    {
        return $this->attempt;
    }

    public function addAttempt(Attempt $attempt): self
    {
        if (!$this->attempt->contains($attempt)) {
            $this->attempt->add($attempt);
            $attempt->setChallenge($this);
        }

        return $this;
    }

    public function removeAttempt(Attempt $attempt): self
    {
        if ($this->attempt->removeElement($attempt)) {
            // set the owning side to null (unless already changed)
            if ($attempt->getChallenge() === $this) {
                $attempt->setChallenge(null);
            }
        }

        return $this;
    }
}
