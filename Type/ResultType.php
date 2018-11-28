<?php

namespace App\Type;

use GraphQL\Type\Definition\ObjectType;
use App\Types;

class ResultType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    'usd' => [
                        'type' => Types::string(),
                        'resolve' => function ($value) {
                            return $value['usd'];
                        }
                    ],
                    'eur' => [
                        'type' => Types::string(),
                        'resolve' => function ($value) {
                            return $value['eur'];
                        }
                    ],
                    'btc' => [
                        'type' => Types::string(),
                        'resolve' => function ($value) {
                            return $value['btc'];
                        }
                    ],
                ];
            }
        ];
        parent::__construct($config);
    }
}
