<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . 'banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo 'Conectei' . PHP_EOL;

$statement = $pdo->query('SELECT * FROM students;');

$studentList = $statement->fetchAll(PDO::FETCH_CLASS, Student::class);

foreach ($studentList as $studentData) {
  echo "ID: {$studentData->id()}" . PHP_EOL;
  echo "Nome: {$studentData->name()}" . PHP_EOL;
  echo "Nascimento: {$studentData->birthDate()->format('d/m/Y')}" . PHP_EOL;
  echo PHP_EOL;
}

var_dump($result);
