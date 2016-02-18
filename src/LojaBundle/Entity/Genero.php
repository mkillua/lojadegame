<?php

namespace LojaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Genero
 *
 * @ORM\Table(name="genero")
 * @ORM\Entity(repositoryClass="LojaBundle\Repository\GeneroRepository")
 */
class Genero extends Date
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=30)
     */
    private $nome;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Jogos", mappedBy="genero", cascade={"remove"})
     */
   
    private $jogos;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->jogos = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Genero
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Genero
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }


    /**
     * Add jogo
     *
     * @param \LojaBundle\Entity\Jogos $jogo
     *
     * @return Genero
     */
    public function addJogo(\LojaBundle\Entity\Jogos $jogo)
    {
        $this->jogos[] = $jogo;

        return $this;
    }

    /**
     * Remove jogo
     *
     * @param \LojaBundle\Entity\Jogos $jogo
     */
    public function removeJogo(\LojaBundle\Entity\Jogos $jogo)
    {
        $this->jogos->removeElement($jogo);
    }

    /**
     * Get jogos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJogos()
    {
        return $this->jogos;
    }
}
