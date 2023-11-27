<?php
use App\Controller\CreatePostController;
use Domain\Blog\Test\Adapters\PDOPostRepository;
use Domain\Blog\UserCase\CreatePost;
use Symfony\Component\HttpFoundation\Request;
require 'vendor/autoload.php';

$request = Request::createFromGlobals();

$pdoRepository = new PDOPostRepository;

$usercase = new CreatePost($pdoRepository);

$controller = new CreatePostController($usercase);

$response = $controller->handleRequest($request);
$response->send();
