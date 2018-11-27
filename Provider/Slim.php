<?php

namespace App\Provider;

use Doctrine\ORM\EntityManager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\App;
use App\Action\Price;
use App\Action\Budget;
use App\Action\Masternodes;
use App\Action\Blockchain;
use App\Action\Volume;
use App\Action\Marketcap;
use App\Action\All;

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

            $app->get('/', function ($request, $response, $args) {
                return $response->withRedirect('https://dashinfo.net');
            });

            $app->group('/v1.0', function () {
                /**
                 *
                 */
                $this->get('/price[/{id}]', Price::class);

                /**
                 *
                 */
                $this->get('/budget', Budget::class);

                /**
                 *
                 */
                $this->get('/masternodes', Masternodes::class);

                /**
                 *
                 */
                $this->get('/blockchain', Blockchain::class);

                /**
                 *
                 */
                $this->get('/volume[/{id}]', Volume::class);

                /**
                 *
                 */
                $this->get('/marketcap[/{id}]', Marketcap::class);

                /**
                 *
                 */
                $this->get('/all', All::class);
            });

            return $app;
        };
    }
}
