<?php

namespace App\Entity\Maquina;

use App\Repository\Maquina\ModeloRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModeloRepository::class)
 * @ORM\Table(name="empsys_maquina.modelo")
 */
class Modelo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity=Fabricante::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $fabricante;

    /**
     * @ORM\Column(type="float")
     */
    private $cargaTotal;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $caracteristicas;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $aplicacoes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ativo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getFabricante(): ?Fabricante
    {
        return $this->fabricante;
    }

    public function setFabricante(?Fabricante $fabricante): self
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    public function getCargaTotal(): ?float
    {
        return $this->cargaTotal;
    }

    public function setCargaTotal(float $cargaTotal): self
    {
        $this->cargaTotal = $cargaTotal;

        return $this;
    }

    public function getCaracteristicas(): ?string
    {
        return $this->caracteristicas;
    }

    public function setCaracteristicas(?string $caracteristicas): self
    {
        $this->caracteristicas = $caracteristicas;

        return $this;
    }

    public function getAplicacoes(): ?string
    {
        return $this->aplicacoes;
    }

    public function setAplicacoes(?string $aplicacoes): self
    {
        $this->aplicacoes = $aplicacoes;

        return $this;
    }

    public function getAtivo(): ?bool
    {
        return $this->ativo;
    }

    public function setAtivo(bool $ativo): self
    {
        $this->ativo = $ativo;

        return $this;
    }

    public function __toString(): string
    {
        return $this->modelo ?? 'Modelo';
    }
}
