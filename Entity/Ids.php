<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ids
 *
 * @ORM\Table(name="ids")
 * @ORM\Entity
 */
class Ids
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
     * @var \DateTime
     *
     * @ORM\Column(name="DT", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dt = 'CURRENT_TIMESTAMP';


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
     * Set dt.
     *
     * @param \DateTime $dt
     *
     * @return Ids
     */
    public function setDt($dt)
    {
        $this->dt = $dt;

        return $this;
    }

    /**
     * Get dt.
     *
     * @return \DateTime
     */
    public function getDt()
    {
        return $this->dt;
    }
}
