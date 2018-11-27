<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Others
 *
 * @ORM\Table(name="others")
 * @ORM\Entity
 */
class Others
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
     * @ORM\Column(name="COINS", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $coins;

    /**
     * @var string
     *
     * @ORM\Column(name="DAYCHANGE", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $daychange;

    /**
     * @var int
     *
     * @ORM\Column(name="RANK", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $rank;


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
     * Set coins.
     *
     * @param int $coins
     *
     * @return Others
     */
    public function setCoins($coins)
    {
        $this->coins = $coins;

        return $this;
    }

    /**
     * Get coins.
     *
     * @return int
     */
    public function getCoins()
    {
        return $this->coins;
    }

    /**
     * Set daychange.
     *
     * @param string $daychange
     *
     * @return Others
     */
    public function setDaychange($daychange)
    {
        $this->daychange = $daychange;

        return $this;
    }

    /**
     * Get daychange.
     *
     * @return string
     */
    public function getDaychange()
    {
        return $this->daychange;
    }

    /**
     * Set rank.
     *
     * @param int $rank
     *
     * @return Others
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank.
     *
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }
}
