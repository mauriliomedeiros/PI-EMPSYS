<?php

namespace App\Entity;

use App\Repository\ModeloEmpilhadeiraRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpilhadeiraRepository::class)
 * @ORM\Table(name="empsys.modelo_empilhadeira")
 */
class ModeloEmpilhadeira
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fabricante;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $modelo;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFabricante(): ?string
    {
        return $this->fabricante;
    }

    public function setFabricante(string $fabricante): self
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;

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
}
