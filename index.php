<?php

ini_set('display_errors', 1);

require_once 'Component/Annotation.php';
require_once 'Component/EntityMapper.php';
require_once 'Database/PDOAdapter.php';
require_once 'Manager/UnitOfWork.php';
require_once 'Manager/Manager.php';
require_once 'Controller/Rest.php';
require_once 'Controller/AbstractController.php';
require_once 'Controller/ResellerRest.php';
require_once 'Entity/Entity.php';
require_once 'Entity/Reseller.php';
require_once 'Router.php';

$router = new Router();
$router->dispatch($_GET['controller']);
