<?php
// Simple Routes

$app->get('/', function ($request, $response) {
	return $this->renderer->render($response, 'index.phtml');
});


/**
 * Check unique email
 * @param String mail     - mail to check
 * @return Json           - {status: bool, msg: string}
 */
$app->get('/validateEmail/{email}', 'AccountController:validateEmail');

/**
 * Check unique username
 * @param String username - username to check
 * @return Json           - {status: bool, msg: string}
 */
$app->get('/validateUsername/{user}', 'AccountController:validateUsername');

/**
 * Create Account
 * @param String mail
 * @param String username
 * @param String password
 * @return Json {status: bool, msg: string}
 */
$app->post('/createAccount', 'AccountController:createAccount');
$app->get('/showAccounts', 'AccountController:showAccounts');