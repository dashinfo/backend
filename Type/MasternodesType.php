<?php

namespace App\Type;

use GraphQL\Type\Definition\ObjectType;
use App\Types;

class MasternodesType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    'count' => [
                        'type' => Types::int(),
                        'resolve' => function ($value) {
                            return $value['count'];
                        }
                    ],
                    'daily_payment' => [
                        'type' => Types::dash(),
                        'resolve' => function ($value) {
                            return $value['daily_payment']['dash'];
                        }
                    ],
                ];
            }
        ];
        parent::__construct($config);
    }
}
