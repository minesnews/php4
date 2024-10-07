<?php

require('./vendor/autoload.php');
require('src/Book.php');
require('src/ElectronBook.php');
require('src/PaperBook.php');

use App\Oop\App;

$app = new App();
$index1 = new ElectronBook("Электронная книга", "Петров Петр", 1997, "178-5-699-12014-7", 300, "app_run.php");
$index1 -> toString();
$index1 -> getElectronBook();
$index1 -> download();
$index1 -> info();
$index1 -> getElectronBook();

$index2 = new PaperBook("Бумажная книга", "Сидоров Иван", 2007, "378-4-699-12016-7", 300, "Москва");
$index2 -> toString();
$index2 -> getPaperBook();
$index2 -> getBook();
$index2 -> info();
$index2 -> getPaperBook();
