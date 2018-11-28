<?php

namespace App\Type;

use GraphQL\Type\Definition\ObjectType;
use App\Types;

class BlockchainType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    'last_block' => [
                        'type' => Types::int(),
                        'resolve' => function ($value) {
                            return $value['last_block'];
                        }
                    ],
                    'difficulty' => [
                        'type' => Types::string(),
                        'resolve' => function ($value) {
                            return $value['difficulty'];
                        }
                    ],
                    'hashrate' => [
                        'type' => Types::string(),
                        'resolve' => function ($value) {
                            return $value['hashrate'];
                        }
                    ],
                ];
            }
        ];
        parent::__construct($config);
    }
}
