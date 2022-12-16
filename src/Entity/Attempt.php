<?php

namespace App\Entity;

use App\Repository\AttemptRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttemptRepository::class)]
class Attempt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'attempts')]
    private ?User $attemptedBy = null;

    #[ORM\ManyToOne(inversedBy: 'attempt')]
    private ?Challenge $challenge = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $attemptedOn = null;

    #[ORM\Column(length: 255)]
    private ?string $attempt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttemptedBy(): ?User
    {
        return $this->attemptedBy;
    }

    public function setAttemptedBy(?User $attemptedBy): self
    {
        $this->attemptedBy = $attemptedBy;

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

    public function getAttemptedOn(): ?\DateTimeInterface
    {
        return $this->attemptedOn;
    }

    public function setAttemptedOn(\DateTimeInterface $attemptedOn): self
    {
        $this->attemptedOn = $attemptedOn;

        return $this;
    }

    public function getAttempt(): ?string
    {
        return $this->attempt;
    }

    public function setAttempt(string $attempt): self
    {
        $this->attempt = $attempt;

        return $this;
    }
}
