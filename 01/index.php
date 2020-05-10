<?php

/* Вне класса */
const ABC = 'asdf';
var_dump(ABC);

$a = "Markus!";
var_dump($a[1]);

function привет() {
	$переменная = 5;
	echo '<br>вызов привет: '.$переменная.'<br>';
}
привет();


class Test
{
	public static function summ(int $a, int $b): int
	{
		return $a+$b;
	}
}

echo Test::summ(3, 4);