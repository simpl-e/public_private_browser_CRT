<?php

require_once 'vendor/autoload.php';

use Tymon\JWTAuth\Providers\JWT\Lcobucci;
use \Lcobucci\JWT\Builder;
use \Lcobucci\JWT\Parser;

$token = $_GET['token'];

// protected $signers = [
//     'HS256' => HS256::class,
//     'HS384' => HS384::class,
//     'HS512' => HS512::class,
//     'RS256' => RS256::class,
//     'RS384' => RS384::class,
//     'RS512' => RS512::class,
//     'ES256' => ES256::class,
//     'ES384' => ES384::class,
//     'ES512' => ES512::class,
// ];
$jwt = new Lcobucci(new Builder(), new Parser(), null, "ES256", [
    "public" => file_get_contents("public.crt"),
    //"private" => file_get_contents("private.key")
]);


$data = $jwt->decode($token);

echo json_encode($data);
