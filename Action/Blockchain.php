<?php

namespace App\Action;

use Doctrine\ORM\EntityManager;
use Slim\Http;
use App\Entity\Blockchain as BlockchainModel;

class Blockchain
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getResult()
    {
        $result = $this->em->getRepository(BlockchainModel::class)
            ->createQueryBuilder('b')
            ->select('b')
            ->orderBy('b.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$result) {
            return false;
        }

        return [
            'last_block' => $result->getLastBlock(),
            'difficulty' => $result->getDifficulty(),
            'hashrate' => $result->getHash(),
        ];
    }

    public function __invoke(Http\Request $request, Http\Response $response) : Http\Response
    {
        $arr = $this->getResult();

        return $response->withJson(count($arr) ? array('success' => true, 'data' => $arr, 'date' => date('Y-m-d H:i:s')) : array('success' => false, 'date' => date('Y-m-d H:i:s')), 200);
    }
}
