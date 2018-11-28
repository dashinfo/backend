<?php

namespace App\Provider;

use Doctrine\ORM\EntityManager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\App;
use Slim\Http;

use App\Action\Price;
use App\Action\Budget;
use App\Action\Masternodes;
use App\Action\Blockchain;
use App\Action\Volume;
use App\Action\Marketcap;
use App\Action\All;

use GraphQL\Type\Schema;
use GraphQL\GraphQL;
use App\Types;

class Slim implements ServiceProviderInterface
{
    public function register(Container $cnt)
    {
        $cnt[Price::class] = function (Container $cnt) : Price {
            return new Price(
                $cnt[EntityManager::class]
            );
        };
        $cnt[Budget::class] = function (Container $cnt) : Budget {
            return new Budget(
                $cnt[EntityManager::class]
            );
        };
        $cnt[Masternodes::class] = function (Container $cnt) : Masternodes {
            return new Masternodes(
                $cnt[EntityManager::class]
            );
        };
        $cnt[Blockchain::class] = function (Container $cnt) : Blockchain {
            return new Blockchain(
                $cnt[EntityManager::class]
            );
        };
        $cnt[Volume::class] = function (Container $cnt) : Volume {
            return new Volume(
                $cnt[EntityManager::class]
            );
        };
        $cnt[Marketcap::class] = function (Container $cnt) : Marketcap {
            return new Marketcap(
                $cnt[EntityManager::class]
            );
        };
        $cnt[All::class] = function (Container $cnt) : All {
            return new All(
                $cnt[EntityManager::class]
            );
        };

        $cnt[App::class] = function (Container $cnt) : App {
            $app = new App($cnt);

            $app->get('/', function (Http\Request $request, Http\Response $response, $args) use ($cnt) : Http\Response {
                return $response->withRedirect($cnt['settings']['default_url']);
            });

            /**
             * Rest api. Full documentation available https://github.com/dashinfo/backend
             */
            $app->group('/v1.0', function () {
                /**
                 * https://api.dashinfo.net/v1.0/price
                 * https://api.dashinfo.net/v1.0/price/{eur|usd|btc}
                 */
                $this->get('/price[/{id}]', Price::class);

                /**
                 * https://api.dashinfo.net/v1.0/budget
                 */
                $this->get('/budget', Budget::class);

                /**
                 * https://api.dashinfo.net/v1.0/masternodes
                 */
                $this->get('/masternodes', Masternodes::class);

                /**
                 * https://api.dashinfo.net/v1.0/blockchain
                 */
                $this->get('/blockchain', Blockchain::class);

                /**
                 * https://api.dashinfo.net/v1.0/volume
                 * https://api.dashinfo.net/v1.0/volume/{eur|usd|btc}
                 */
                $this->get('/volume[/{id}]', Volume::class);

                /**
                 * https://api.dashinfo.net/v1.0/marketcap
                 * https://api.dashinfo.net/v1.0/marketcap/{eur|usd|btc}
                 */
                $this->get('/marketcap[/{id}]', Marketcap::class);

                /**
                 * https://api.dashinfo.net/v1.0/all
                 */
                $this->get('/all', All::class);
            });

            /**
             * GraphQL. Full scheme available https://github.com/dashinfo/backend
             */
            $app->post('/graphql', function (Http\Request $request, Http\Response $response, $args) use ($cnt) : Http\Response {
                try {
                    $schema = new Schema([
                        'query' => Types::query()
                    ]);

                    $rawInput = file_get_contents('php://input');
                    $input = json_decode($rawInput, true);
                    $query = $input['query'];
                    $variableValues = isset($input['variables']) ? $input['variables'] : null;

                    $rootValue = [
                        'em' => $cnt[EntityManager::class],
                        'price' => $cnt[Price::class],
                        'volume' => $cnt[Volume::class],
                        'marketcap' => $cnt[Marketcap::class],
                        'blockchain' => $cnt[Blockchain::class],
                        'budget' => $cnt[Budget::class],
                        'masternodes' => $cnt[Masternodes::class],
                    ];

                    $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variableValues);
                    $output = $result->toArray();
                } catch (\Exception $e) {
                    $output = [
                        'error' => [
                            'message' => $e->getMessage()
                        ]
                    ];
                }

                return $response->withJson($output, 200);
            });

            return $app;
        };
    }
}
