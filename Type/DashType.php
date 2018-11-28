<?php

namespace App\Type;

use GraphQL\Type\Definition\ObjectType;
use App\Types;

class DashType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'fields' => function () {
                return [
                    'dash' => [
                        'type' => Types::string(),
                        'resolve' => function ($value) {
                            return $value;
                        }
                    ],
                ];
            }
        ];
        parent::__construct($config);
    }
}
