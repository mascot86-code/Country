<?php

//Вывод всех ошибок

error_reporting(-1);

//Установка соединения с БД

$connect = @mysqli_connect('localhost', 'root', '', 'countries') or die('Ошибка соединения с БД');

if (!$connect) die(mysqli_connect_error($connect));

mysqli_set_charset($connect, 'utf8');

$select = "SELECT * FROM country";

if (!$select) die(mysqli_error($connect));

$res_select = @mysqli_query($connect, $select);

$row = mysqli_fetch_all($res_select, MYSQLI_ASSOC);

if (isset($_POST['name']) && isset($_POST['population']) && isset($_POST['country_code'])) {

	$name = $_POST['name'];
	$population = $_POST['population'];
	$country_code = $_POST['country_code'];

	$name = mysqli_real_escape_string($connect, $name);
	$country_code = mysqli_real_escape_string($connect, $country_code);

	$insert = "INSERT INTO `country`(name, population, country_code) VALUES ('$name', '$population','$country_code')";
	$res_insert = @mysqli_query($connect, $insert);

	// Решение проблемы F5
	header('Location: index.php');
}

//Удаление страны из списка

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$delete = "DELETE FROM `country` WHERE id = $id";
	$res_delete = @mysqli_query($connect, $delete);
}

