<?php

namespace App\Type;

use GraphQL\Type\Definition\ObjectType;
use App\Types;

class BudgetType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    'amount' => [
                        'type' => Types::dash(),
                        'resolve' => function ($value) {
                            return $value['amount']['dash'];
                        }
                    ],
                    'alloted_amount' => [
                        'type' => Types::dash(),
                        'resolve' => function ($value) {
                            return $value['alloted_amount']['dash'];
                        }
                    ],
                    'superblock' => [
                        'type' => Types::int(),
                        'resolve' => function ($value) {
                            return $value['superblock'];
                        }
                    ],
                    'datetime' => [
                        'type' => Types::string(),
                        'resolve' => function ($value) {
                            return $value['datetime'];
                        }
                    ],
                    'superblock' => [
                        'type' => Types::int(),
                        'resolve' => function ($value) {
                            return $value['superblock'];
                        }
                    ],
                    'proposals' => [
                        'type' => Types::proposal(),
                        'resolve' => function ($value) {
                            return $value['proposals'];
                        }
                    ],
                ];
            }
        ];
        parent::__construct($config);
    }
}
