<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $razao_social;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nome_fantasia;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $cnpj;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ativo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRazaoSocial(): ?string
    {
        return $this->razao_social;
    }

    public function setRazaoSocial(string $razao_social): self
    {
        $this->razao_social = $razao_social;

        return $this;
    }

    public function getNomeFantasia(): ?string
    {
        return $this->nome_fantasia;
    }

    public function setNomeFantasia(?string $nome_fantasia): self
    {
        $this->nome_fantasia = $nome_fantasia;

        return $this;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): self
    {
        $this->cnpj = $cnpj;

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
}
