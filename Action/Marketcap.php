<?php

namespace App\Action;

use Doctrine\ORM\EntityManager;
use Slim\Http;
use App\Entity\Marketcap as MarketcapModel;

class Marketcap
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getMarketcap(string $coin) : string
    {
        $result = $this->em->getRepository(MarketcapModel::class)
            ->createQueryBuilder('m')
            ->select('m.val')
            ->where('m.currency = ?1')
            ->setParameter(1, strtoupper($coin))
            ->orderBy('m.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        return $result['val'];
    }

    public function getResult(array $args = [])
    {
        if (isset($args['id']) && in_array($args['id'], ['eur', 'usd', 'btc'])) {
            $marketcap = $this->getMarketcap($args['id']);

            return [
                strtolower($args['id']) => number_format($marketcap, 2, '.', '')
            ];
        }

        $eur = $this->getMarketcap('eur');
        $usd = $this->getMarketcap('usd');
        $btc = $this->getMarketcap('btc');

        return [
            'eur' => number_format($eur, 2, '.', ''),
            'usd' => number_format($usd, 2, '.', ''),
            'btc' => number_format($btc, 2, '.', '')
        ];
    }

    public function __invoke(Http\Request $request, Http\Response $response, $args) : Http\Response
    {
        $arr = $this->getResult($args);

        return $response->withJson(count($arr) ? array('success' => true, 'data' => $arr, 'date' => date('Y-m-d H:i:s')) : array('success' => false, 'date' => date('Y-m-d H:i:s')), 200);
    }
}
