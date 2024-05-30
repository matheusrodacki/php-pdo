<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . 'banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo 'Conectei' . PHP_EOL;

$statement = $pdo->query('SELECT * FROM students;');

$studentList = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($studentList);

foreach ($studentList as $studentData) {
  $studentList[] = new Student(
    $studentData['id'],
    $studentData['name'],
    new DateTimeImmutable($studentData['birth_date'])
  );
}
