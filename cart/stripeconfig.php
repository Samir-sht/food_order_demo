<?php
	require('../stripe-php-master/init.php');
	$publishableKey = 
	"pk_test_51Lg1D1JAzuEJCe3j8rnyEQtLSqM4Q4jSPrwlWiKmN1Ra913tmFtoMZin9ByScp0p2WCp0qCOzjpiLTemr75mObYL00DHfRyGz4";
	$secretKey = 
	"sk_test_51Lg1D1JAzuEJCe3jpRD0PlTAcnaS53LkvQ3bmxIfG93PBNxPuaMVwrJnwt3ApSlfqX4ZCaLasEdnKmCLJ27MQ58J00ceLUaDDo";
	\Stripe\Stripe::setApiKey($secretKey);
?>