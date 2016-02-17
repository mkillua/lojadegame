<?php

namespace LojaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jogos
 *
 * @ORM\Table(name="jogos")
 * @ORM\Entity(repositoryClass="LojaBundle\Repository\JogosRepository")
 */
class Jogos
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
     * @ORM\Column(name="nomeDoJogo", type="string", length=100)
     */
    private $nomeDoJogo;

    /**
     * @var float
     *
     * @ORM\Column(name="duracao", type="float", nullable=true)
     */
    private $duracao;

    /**
     * @var int
     *
     * @ORM\Column(name="idGenero", type="integer")
     */
    private $idGenero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;


    /**
     * Get id
     *
     * @return int
     */
    
    public function __construct()
    {
        $this->createdAt = new   \DateTime("now");
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomeDoJogo
     *
     * @param string $nomeDoJogo
     *
     * @return Jogos
     */
    public function setNomeDoJogo($nomeDoJogo)
    {
        $this->nomeDoJogo = $nomeDoJogo;

        return $this;
    }

    /**
     * Get nomeDoJogo
     *
     * @return string
     */
    public function getNomeDoJogo()
    {
        return $this->nomeDoJogo;
    }

    /**
     * Set duracao
     *
     * @param float $duracao
     *
     * @return Jogos
     */
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;

        return $this;
    }

    /**
     * Get duracao
     *
     * @return float
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * Set idGenero
     *
     * @param integer $idGenero
     *
     * @return Jogos
     */
    public function setIdGenero($idGenero)
    {
        $this->idGenero = $idGenero;

        return $this;
    }

    /**
     * Get idGenero
     *
     * @return int
     */
    public function getIdGenero()
    {
        return $this->idGenero;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Jogos
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Jogos
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Jogos
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }
}

