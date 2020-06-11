<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @var string|null
     * @Assert\NotBlank(payload={"severity"="error"})
     * @Assert\Length(min=2, max=100)
     */
    private $name;

    /**
     * @var string|null
     * @Assert\NotBlank(payload={"severity"="error"})
     * @Assert\Email(message="Merci de mettre un email valide")
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank(payload={"severity"="error"})
     * @Assert\Length(min=2, max=100)
     */
    private $object;

    /**
     * @var string|null
     * @Assert\NotBlank(payload={"severity"="error"})
     * @Assert\Length(min=10)
     */
    private $message;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(string $object): self
    {
        $this->object = $object;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
