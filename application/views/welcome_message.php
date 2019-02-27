<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="application/assets/css/style.css">
</head>
<body>
<section class="main">
	<p>Current exchange rate</p>
	<div class="exchange_rate">
	<span>Buying</span>
		<p>1 UAH = <?=$usd?></p>
		<p>1 EUR = <?=$eur?></p>
	</div>
	<a href="/history">Previos Rates</a>
</section>
</body>
</html>