<?php

namespace App\Entity;

use App\Repository\ValidationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ValidationRepository::class)]
class Validation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'validations')]
    private ?User $createdBy = null;

    #[ORM\ManyToOne(inversedBy: 'validations')]
    private ?Challenge $challenge = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $validatedOn = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $feedback = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getChallenge(): ?Challenge
    {
        return $this->challenge;
    }

    public function setChallenge(?Challenge $challenge): self
    {
        $this->challenge = $challenge;

        return $this;
    }

    public function getValidatedOn(): ?\DateTimeInterface
    {
        return $this->validatedOn;
    }

    public function setValidatedOn(?\DateTimeInterface $validatedOn): self
    {
        $this->validatedOn = $validatedOn;

        return $this;
    }

    public function getFeedback(): ?int
    {
        return $this->feedback;
    }

    public function setFeedback(?int $feedback): self
    {
        $this->feedback = $feedback;

        return $this;
    }
}
