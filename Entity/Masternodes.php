<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Masternodes
 *
 * @ORM\Table(name="masternodes")
 * @ORM\Entity
 */
class Masternodes
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
     * @ORM\Column(name="COUNT", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $count;

    /**
     * @var string
     *
     * @ORM\Column(name="DAILY", type="decimal", precision=10, scale=8, nullable=false)
     */
    private $daily;


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
     * Set count.
     *
     * @param int $count
     *
     * @return Masternodes
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set daily.
     *
     * @param string $daily
     *
     * @return Masternodes
     */
    public function setDaily($daily)
    {
        $this->daily = $daily;

        return $this;
    }

    /**
     * Get daily.
     *
     * @return string
     */
    public function getDaily()
    {
        return $this->daily;
    }
}
