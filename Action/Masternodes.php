<?php

namespace App\Action;

use Doctrine\ORM\EntityManager;
use Slim\Http;
use App\Entity\Masternodes as MasternodesModel;

class Masternodes
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getResult()
    {
        $result = $this->em->getRepository(MasternodesModel::class)
            ->createQueryBuilder('m')
            ->select('m')
            ->orderBy('m.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$result) {
            return false;
        }

        return [
            'count' => $result->getCount(),
            'daily_payment' => [
                'dash' => number_format($result->getDaily(), 8, '.', '')
            ],
        ];
    }

    public function __invoke(Http\Request $request, Http\Response $response) : Http\Response
    {
        $arr = $this->getResult();

        return $response->withJson(count($arr) ? array('success' => true, 'data' => $arr, 'date' => date('Y-m-d H:i:s')) : array('success' => false, 'date' => date('Y-m-d H:i:s')), 200);
    }
}
