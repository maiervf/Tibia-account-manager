<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
$app->add(function ($req, $res, $next) {
	$response = $next($req, $res);
	return $response
		->withHeader('Access-Control-Allow-Origin', '*')
		->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
		->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$mw = function($req, $res, $next) {
	$token = $req->getHeader('Token');
	if (empty($token)) {
		$res->getBody()->write(json_encode(['valid' => false, 'msg' => 'Token not founded in headers.']));
		return $res;
	}

	$container = $app->getContainer();
	$account = $container->Account->validateToken($token);
	if (empty($account)) {
		$res->getBody()->write(json_encode(['valid' => false, 'msg' => 'Token invalid or expired.']));
		return $res;	
	}
	return $next($req, $res);
};
