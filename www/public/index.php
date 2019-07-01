<?php
$basePath = dirname(__dir__) . DIRECTORY_SEPARATOR;

require_once $basePath . 'vendor/autoload.php';

$app = App\App::getInstance();
$app->setStartTime();
$app::load();

$app->getRouter($basePath)
    ->get('/', 'Post#all', 'home')
    ->get('/categories', 'Category#all', 'categories')
    ->get('/category/[*:slug]-[i:id]', 'Category#show', 'category')
    ->get('/article/[*:slug]-[i:id]', 'post#show', 'post')
    ->get('/test', 'Twig#index', 'test')

    ->get('/Home', 'shopbeer#index', 'Home')
    ->get('/boutique', 'Shopbeer#boutique', 'Boutique')
    ->get('/connect', 'Users#login', 'login')
    ->post('/connect', 'Users#login', 'postlogin')
    ->post('/register', 'Users#register', 'postregister')
    ->get('/register', 'Users#register', 'register')
    ->get('/profil', 'shopbeer#profil', 'getprofil')
    ->get('/commande', 'Commandebeer#commande', 'boncommande')
    ->post('/commande', 'Commandebeer#commande', 'postboncommande')
    ->get('/contact', 'shopbeer#contact', 'contact')
    ->get('/deconnect', 'Users#deconnect', 'deconnect')
    ->get('/user', 'User#all', 'userIndex')
    ->run();
