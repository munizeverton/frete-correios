<?php

require_once 'Frete.class.php';

$Frete = new Frete;

$Frete->setCepOrigem('43820080');
$Frete->setCepDestino('43810040');
$Frete->setPeso('0.2');
$Frete->setComprimento('33');
$Frete->setAltura('0');
$Frete->setLargura('24');
$Frete->setDiametro('0');

$resultado = $Frete->calculaFrete();

var_dump($resultado);
