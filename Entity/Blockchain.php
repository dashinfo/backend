<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blockchain
 *
 * @ORM\Table(name="blockchain")
 * @ORM\Entity
 */
class Blockchain
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="LAST_BLOCK", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $lastBlock;

    /**
     * @var string
     *
     * @ORM\Column(name="HASH", type="string", length=256, nullable=false)
     */
    private $hash;

    /**
     * @var string
     *
     * @ORM\Column(name="DIFFICULTY", type="string", length=256, nullable=false)
     */
    private $difficulty;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastBlock.
     *
     * @param int $lastBlock
     *
     * @return Blockchain
     */
    public function setLastBlock($lastBlock)
    {
        $this->lastBlock = $lastBlock;

        return $this;
    }

    /**
     * Get lastBlock.
     *
     * @return int
     */
    public function getLastBlock()
    {
        return $this->lastBlock;
    }

    /**
     * Set hash.
     *
     * @param string $hash
     *
     * @return Blockchain
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash.
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set difficulty.
     *
     * @param string $difficulty
     *
     * @return Blockchain
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get difficulty.
     *
     * @return string
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }
}
