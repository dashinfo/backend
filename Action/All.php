<?php

namespace App\Action;

use Doctrine\ORM\EntityManager;
use Slim\Http;
use App\Entity\Others;
use App\Action\Price;
use App\Action\Budget;
use App\Action\Masternodes;
use App\Action\Blockchain;
use App\Action\Volume;
use App\Action\Marketcap;

class All
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function __invoke(Http\Request $request, Http\Response $response) : Http\Response
    {
        // Price
        $price = (new Price($this->em))->getResult();

        // ATH
        $high = (new Price($this->em))->getAllTimeHigh();

        // Budget
        $budget = (new Budget($this->em))->getResult();

        // MN
        $masternodes = (new Masternodes($this->em))->getResult();

        // Volume
        $volume = (new Volume($this->em))->getResult();

        // Market cap
        $marketcap = (new Marketcap($this->em))->getResult();

        // Blockchain
        $blockchain = (new Blockchain($this->em))->getResult();

        $row = $this->em->getRepository(Others::class)
            ->createQueryBuilder('o')
            ->select('o')
            ->orderBy('o.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        $arr = [
            'price' => $price,
            'all_time_high' => $high,
            'marketcap' => $marketcap,
            'supply' => [
                'dash' => $row->getCoins()
            ],
            'volume' => $volume,
            'change' => $row->getDaychange(),
            'blockchain' => $blockchain,
            'budget' => $budget,
            'masternodes' => $masternodes
        ];

        return $response->withJson(count($arr) ? array('success' => true, 'data' => $arr, 'date' => date('Y-m-d H:i:s')) : array('success' => false, 'date' => date('Y-m-d H:i:s')), 200);
    }
}
