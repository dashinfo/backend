<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Volume
 *
 * @ORM\Table(name="volume")
 * @ORM\Entity
 */
class Volume
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="VAL", type="decimal", precision=14, scale=2, nullable=false, options={"default"="0.00","comment"="Volume"})
     */
    private $val = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="CURRENCY", type="string", length=6, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $currency = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="FLAG", type="string", length=6, nullable=false, options={"fixed"=true,"comment"="volume type"})
     */
    private $flag = '0';


    /**
     * Set id.
     *
     * @param int $id
     *
     * @return Volume
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set val.
     *
     * @param string $val
     *
     * @return Volume
     */
    public function setVal($val)
    {
        $this->val = $val;

        return $this;
    }

    /**
     * Get val.
     *
     * @return string
     */
    public function getVal()
    {
        return $this->val;
    }

    /**
     * Set currency.
     *
     * @param string $currency
     *
     * @return Volume
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set flag.
     *
     * @param string $flag
     *
     * @return Volume
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag.
     *
     * @return string
     */
    public function getFlag()
    {
        return $this->flag;
    }
}
