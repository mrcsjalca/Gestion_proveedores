<?php

namespace App\Entity;

use App\Repository\ProveedorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProveedorRepository::class)]
class Proveedor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'El nombre del proveedor no puede estar vacío.')]
    #[Assert\Length(max: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'El correo electrónico no puede estar vacío.')]
    #[Assert\Email(message: 'El correo electrónico no es válido.')]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: 'El número de teléfono no puede estar vacío.')]
    #[Assert\Length(min: 9, max: 20)]
    #[Assert\Regex(pattern: '/^[0-9\+\s\-]+$/', message: 'El teléfono solo puede contener números.')]
    private ?string $telefono = null;

    #[ORM\Column]
    private ?bool $activo = false;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'El tipo de proveedor no puede estar vacío.')]
    private ?string $tipo = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updateAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): static
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): static
    {
        $this->telefono = $telefono;
        return $this;
    }

    public function isActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): static
    {
        $this->activo = $activo;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): static
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeImmutable $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }
}
