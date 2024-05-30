<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . 'banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo 'Conectei' . PHP_EOL;

$student = new Student(
  null,
  'Vinicius Dias',
  new \DateTimeImmutable('1997-10-15')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?,?);";

echo $sqlInsert . PHP_EOL;

$result = $pdo->exec($sqlInsert);


var_dump($result);
