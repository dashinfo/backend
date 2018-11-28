<?php

namespace App\Action;

use Doctrine\ORM\EntityManager;
use Slim\Http;
use App\Entity\Volume as VolumeModel;

class Volume
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getVolume(string $coin) : string
    {
        $result = $this->em->getRepository(VolumeModel::class)
            ->createQueryBuilder('v')
            ->select('v.val')
            ->where('v.currency = ?1')
            ->setParameter(1, strtoupper($coin))
            ->orderBy('v.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        return $result['val'];
    }

    public function getResult(array $args = [])
    {
        if (isset($args['id']) && in_array($args['id'], ['eur', 'usd', 'btc'])) {
            $volume = $this->getVolume($args['id']);

            return [
                strtolower($args['id']) => number_format($volume, 2, '.', '')
            ];
        }

        $eur = $this->getVolume('eur');
        $usd = $this->getVolume('usd');
        $btc = $this->getVolume('btc');

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
