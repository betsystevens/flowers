<?php
namespace Config;
use App\DatabaseTable;
use App\Logger;

class StaticRoutes implements \App\Routes
{

    private $flowerTable;
    private $priceTable;

    public function __construct() 
    {
        include __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->flowerTable = new DatabaseTable($pdo, 'flower', 'flowerid');
        $this->priceTable = new DatabaseTable($pdo, 'price', 'container');
    }   
     
    public function getRoutes()
    {
        $logger = new Logger("../../storage/logFile");

        $flowerController = new \Controllers\FlowerController($this->flowerTable);
        $priceController = new \Controllers\PriceController($this->priceTable);

        $routes = [
            'flower/home' => [
                'GET' => [
                    'controller' => $flowerController,
                    'action' => 'home'
                ]
                
            ],
            'flower/list' => [
                'GET' => [
                    'controller' => $flowerController,
                    'action' => 'list'
                ]
            ],
            'flower/addEdit' => [
                'GET' => [
                    'controller' => $flowerController,
                    'action' => 'addEdit'
                ],
                'POST' => [
                    'controller' => $flowerController,
                    'action' => 'addEdit'
                ]
            ],
            'flower/delete' => [
                'POST' => [
                    'controller' => $flowerController,
                    'action' => 'delete'
                ]
            ],
            'price/home' => [
                'GET' => [
                    'controller' => $priceController,
                    'action' => 'home'
                ]
                
            ],
            'price/list' => [
                'GET' => [
                    'controller' => $priceController,
                    'action' => 'list'
                ]
            ],
            'price/addEdit' => [
                'GET' => [
                    'controller' => $priceController,
                    'action' => 'addEdit'
                ],
                'POST' => [
                    'controller' => $priceController,
                    'action' => 'addEdit'
                ]
            ],
            'price/delete' => [
                'POST' => [
                    'controller' => $priceController,
                    'action' => 'delete'
                ]
            ]
        ];

        return $routes;
    }
    
}