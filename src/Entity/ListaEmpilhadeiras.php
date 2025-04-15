<?php

namespace App\Entity;

use App\Repository\ListaEmpilhadeirasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListaEmpilhadeirasRepository::class)
 * @ORM\Table(name="empsys.lista_empilhadeiras")
 */
class ListaEmpilhadeiras
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
