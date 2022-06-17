<?php

use App\Controller\IndexController;
use App\Controller\ProductController;
use App\Controller\CategoryController;
use App\Controller\ClientsController;


function createRoute(string $controllerName, string $methodName) {
    return [
        'controller' => $controllerName,
        'method' => $methodName,
    ];
}

$routes = [
    '/' => createRoute(IndexController::class, 'indexAction'),
    
    '/produtos' => createRoute(ProductController::class, 'listAction'),
    '/produtos/novo' => createRoute(ProductController::class, 'addAction'),
    '/produtos/excluir' => createRoute(ProductController::class, 'removeAction'),
    '/produtos/editar' => createRoute(ProductController::class, 'editAction'),
    '/produtos/relatorio' => createRoute(ProductController::class, 'reportAction'),
    '/produtos/relatorio' => createRoute(ProductController::class, 'removeConfirmAction'),

    '/categorias' => createRoute(CategoryController::class, 'listAction'),
    '/categorias/nova' => createRoute(CategoryController::class, 'addAction'),
    '/categorias/excluir' => createRoute(CategoryController::class, 'removeAction'),
    '/categorias/editar' => createRoute(CategoryController::class, 'updateAction'),

    '/clientes' => createRoute(ClientsController::class, 'listAction'),
    '/clientes/novo' => createRoute(ClientsController::class, 'addAction'),
    '/clientes/excluir' => createRoute(ClientsController::class, 'removeAction'),
    '/clientes/editar' => createRoute(ClientsController::class, 'editAction'),
    '/clientes/relatorio' => createRoute(ClientsController::class, 'reportAction'),


];

return $routes;