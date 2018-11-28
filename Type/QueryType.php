<?php

namespace App\Type;

use App\Types;
use GraphQL\Type\Definition\ObjectType;
use App\Entity\Others;

class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    'price' => [
                        'type' => Types::result(),
                        'resolve' => function ($root) {
                            return $root['price']->getResult();
                        }
                    ],
                    'volume' => [
                        'type' => Types::result(),
                        'resolve' => function ($root) {
                            return $root['volume']->getResult();
                        }
                    ],
                    'all_time_high' => [
                        'type' => Types::result(),
                        'resolve' => function ($root) {
                            return $root['price']->getAllTimeHigh();
                        }
                    ],
                    'marketcap' => [
                        'type' => Types::result(),
                        'resolve' => function ($root) {
                            return $root['marketcap']->getResult();
                        }
                    ],
                    'supply' => [
                        'type' => Types::dash(),
                        'resolve' => function ($root) {
                            $row = $root['em']->getRepository(Others::class)
                                ->createQueryBuilder('o')
                                ->select('o.coins')
                                ->orderBy('o.id', 'DESC')
                                ->setMaxResults(1)
                                ->getQuery()
                                ->getOneOrNullResult();

                            return $row['coins'];
                        }
                    ],
                    'change' => [
                        'type' => Types::string(),
                        'resolve' => function ($root) {
                            $row = $root['em']->getRepository(Others::class)
                                ->createQueryBuilder('o')
                                ->select('o.daychange')
                                ->orderBy('o.id', 'DESC')
                                ->setMaxResults(1)
                                ->getQuery()
                                ->getOneOrNullResult();

                            return $row['daychange'];
                        }
                    ],
                    'blockchain' => [
                        'type' => Types::blockchain(),
                        'resolve' => function ($root) {
                            return $root['blockchain']->getResult();
                        }
                    ],
                    'budget' => [
                        'type' => Types::budget(),
                        'resolve' => function ($root) {
                            return $root['budget']->getResult();
                        }
                    ],
                    'masternodes' => [
                        'type' => Types::masternodes(),
                        'resolve' => function ($root) {
                            return $root['masternodes']->getResult();
                        }
                    ],
                ];
            }
        ];
        parent::__construct($config);
    }
}
