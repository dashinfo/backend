<?php

namespace App\Action;

use Doctrine\ORM\EntityManager;
use Slim\Http;
use App\Entity\Price as PriceModel;

class Price
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getPrice(string $coin) : string
    {
        $result = $this->em->getRepository(PriceModel::class)
            ->createQueryBuilder('p')
            ->select('p.val')
            ->where('p.currency = ?1')
            ->setParameter(1, strtoupper($coin))
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        return $result['val'];
    }

    public function getAllTimeHigh()
    {
        $arr = [];

        $result = $this->em->getRepository(PriceModel::class)
            ->createQueryBuilder('p')
            ->select('p.currency, MAX(p.val) AS price')
            ->groupBy('p.currency')
            ->getQuery()
            ->getResult();

        foreach ($result as $val) {
            $arr[strtolower($val['currency'])] = number_format($val['price'], $val['currency'] === 'BTC' ? 8 : 2, '.', '');
        }

        return $arr;
    }

    public function getResult(array $args = [])
    {
        if (isset($args['id']) && in_array($args['id'], ['eur', 'usd', 'btc'])) {
            $price = $this->getPrice($args['id']);

            if (in_array($args['id'], ['eur', 'usd'])) {
                $price = number_format($price, 2, '.', '');
            } else {
                $price = number_format($price, 8, '.', '');
            }

            return [
                strtolower($args['id']) => $price
            ];
        }

        $eur = $this->getPrice('eur');
        $usd = $this->getPrice('usd');
        $btc = $this->getPrice('btc');

        return [
            'eur' => number_format($eur, 2, '.', ''),
            'usd' => number_format($usd, 2, '.', ''),
            'btc' => number_format($btc, 8, '.', '')
        ];
    }

    public function __invoke(Http\Request $request, Http\Response $response, $args) : Http\Response
    {
        $arr = $this->getResult($args);

        return $response->withJson(count($arr) ? array('success' => true, 'data' => $arr, 'date' => date('Y-m-d H:i:s')) : array('success' => false, 'date' => date('Y-m-d H:i:s')), 200);
    }
}
