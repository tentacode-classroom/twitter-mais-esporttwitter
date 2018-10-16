<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    #region variables
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=280)
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     */
    private $publication;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    #endregion

    #region Getters & Setters

    #region Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getPublication(): ?int
    {
        return $this->publication;
    }
    #endregion

    #region Setters
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function setPublication(int $publication): self
    {
        $this->publication = $publication;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
    #endregion

    #endregion
}
