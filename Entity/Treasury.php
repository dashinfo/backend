<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Treasury
 *
 * @ORM\Table(name="treasury")
 * @ORM\Entity
 */
class Treasury
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
     * @var string
     *
     * @ORM\Column(name="AMOUNT", type="decimal", precision=14, scale=8, nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="ALLOTED_AMOUNT", type="decimal", precision=14, scale=8, nullable=false)
     */
    private $allotedAmount;

    /**
     * @var int
     *
     * @ORM\Column(name="SUPERBLOCK", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $superblock;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PAYMENT_DATE", type="datetime", nullable=false)
     */
    private $paymentDate;

    /**
     * @var int
     *
     * @ORM\Column(name="PROPOSAL_COUNT", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $proposalCount;

    /**
     * @var int
     *
     * @ORM\Column(name="PROPOSAL_YES", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $proposalYes;

    /**
     * @var int
     *
     * @ORM\Column(name="PROPOSAL_NO", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $proposalNo;


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
     * Set amount.
     *
     * @param string $amount
     *
     * @return Treasury
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set allotedAmount.
     *
     * @param string $allotedAmount
     *
     * @return Treasury
     */
    public function setAllotedAmount($allotedAmount)
    {
        $this->allotedAmount = $allotedAmount;

        return $this;
    }

    /**
     * Get allotedAmount.
     *
     * @return string
     */
    public function getAllotedAmount()
    {
        return $this->allotedAmount;
    }

    /**
     * Set superblock.
     *
     * @param int $superblock
     *
     * @return Treasury
     */
    public function setSuperblock($superblock)
    {
        $this->superblock = $superblock;

        return $this;
    }

    /**
     * Get superblock.
     *
     * @return int
     */
    public function getSuperblock()
    {
        return $this->superblock;
    }

    /**
     * Set paymentDate.
     *
     * @param \DateTime $paymentDate
     *
     * @return Treasury
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * Get paymentDate.
     *
     * @return \DateTime
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Set proposalCount.
     *
     * @param int $proposalCount
     *
     * @return Treasury
     */
    public function setProposalCount($proposalCount)
    {
        $this->proposalCount = $proposalCount;

        return $this;
    }

    /**
     * Get proposalCount.
     *
     * @return int
     */
    public function getProposalCount()
    {
        return $this->proposalCount;
    }

    /**
     * Set proposalYes.
     *
     * @param int $proposalYes
     *
     * @return Treasury
     */
    public function setProposalYes($proposalYes)
    {
        $this->proposalYes = $proposalYes;

        return $this;
    }

    /**
     * Get proposalYes.
     *
     * @return int
     */
    public function getProposalYes()
    {
        return $this->proposalYes;
    }

    /**
     * Set proposalNo.
     *
     * @param int $proposalNo
     *
     * @return Treasury
     */
    public function setProposalNo($proposalNo)
    {
        $this->proposalNo = $proposalNo;

        return $this;
    }

    /**
     * Get proposalNo.
     *
     * @return int
     */
    public function getProposalNo()
    {
        return $this->proposalNo;
    }
}
