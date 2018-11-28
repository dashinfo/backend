<?php

namespace App\Type;

use GraphQL\Type\Definition\ObjectType;
use App\Types;

class ProposalType extends ObjectType
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
                    'funded' => [
                        'type' => Types::int(),
                        'resolve' => function ($value) {
                            return $value['funded'];
                        }
                    ],
                    'not_funded' => [
                        'type' => Types::int(),
                        'resolve' => function ($value) {
                            return $value['not_funded'];
                        }
                    ],
                ];
            }
        ];
        parent::__construct($config);
    }
}
