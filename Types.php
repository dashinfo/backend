<?php

namespace App;

use App\Type\QueryType;
use App\Type\ResultType;
use App\Type\DashType;
use App\Type\BlockchainType;
use App\Type\BudgetType;
use App\Type\ProposalType;
use App\Type\MasternodesType;
use GraphQL\Type\Definition\Type;

class Types
{
    /**
     * @var QueryType
     */
    private static $query;

    /**
     * @var ResultType
     */
    private static $result;

    /**
     * @var DashType
     */
    private static $dash;

    /**
     * @var BlockchainType
     */
    private static $blockchain;

    /**
     * @var BudgetType
     */
    private static $budget;

    /**
     * @var ProposalType
     */
    private static $proposal;

    /**
     * @var MasternodesType
     */
    private static $masternodes;

    /**
     * @return QueryType
     */
    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    /**
     * @return \GraphQL\Type\Definition\IntType
     */
    public static function int()
    {
        return Type::int();
    }

    /**
     * @return \GraphQL\Type\Definition\StringType
     */
    public static function string()
    {
        return Type::string();
    }

    /**
     * @param \GraphQL\Type\Definition\Type $type
     * @return \GraphQL\Type\Definition\ListOfType
     */
    public static function listOf($type)
    {
        return Type::listOf($type);
    }

    /**
     * @return ResultType
     */
    public static function result()
    {
        return self::$result ?: (self::$result = new ResultType());
    }

    /**
     * @return DashType
     */
    public static function dash()
    {
        return self::$dash ?: (self::$dash = new DashType());
    }

    /**
     * @return BlockchainType
     */
    public static function blockchain()
    {
        return self::$blockchain ?: (self::$blockchain = new BlockchainType());
    }

    /**
     * @return BudgetType
     */
    public static function budget()
    {
        return self::$budget ?: (self::$budget = new BudgetType());
    }

    /**
     * @return ProposalType
     */
    public static function proposal()
    {
        return self::$proposal ?: (self::$proposal = new ProposalType());
    }

    /**
     * @return MasternodesType
     */
    public static function masternodes()
    {
        return self::$masternodes ?: (self::$masternodes = new MasternodesType());
    }

}
