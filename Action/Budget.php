<?php

namespace App\Action;

use Doctrine\ORM\EntityManager;
use Slim\Http;
use App\Entity\Treasury;

class Budget
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getResult()
    {
        $result = $this->em->getRepository(Treasury::class)
            ->createQueryBuilder('t')
            ->select('t')
            ->orderBy('t.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$result) {
            return false;
        }

        return [
            'amount' => [
                'dash' => number_format($result->getAmount(), 8, '.', '')
            ],
            'alloted_amount' => [
                'dash' => number_format($result->getAllotedAmount(), 8, '.', '')
            ],
            'superblock' => $result->getSuperblock(),
            'datetime' => $result->getPaymentDate()->format('Y-m-d H:i:s'),
            'proposals' => [
                'count' => $result->getProposalCount(),
                'funded' => $result->getProposalYes(),
                'not_funded' => $result->getProposalNo()
            ]
        ];
    }

    public function __invoke(Http\Request $request, Http\Response $response) : Http\Response
    {
        $arr = $this->getResult();

        return $response->withJson(count($arr) ? array('success' => true, 'data' => $arr, 'date' => date('Y-m-d H:i:s')) : array('success' => false, 'date' => date('Y-m-d H:i:s')), 200);
    }
}
