<?php

namespace App\Entity;

use App\Repository\DialogNodeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DialogNodeRepository::class)
 */
class DialogNode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $speakerName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Speech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpeakerName(): ?string
    {
        return $this->speakerName;
    }

    public function setSpeakerName(?string $speakerName): self
    {
        $this->speakerName = $speakerName;

        return $this;
    }

    public function getSpeech(): ?string
    {
        return $this->Speech;
    }

    public function setSpeech(string $Speech): self
    {
        $this->Speech = $Speech;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }
}
