<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . 'banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo 'Conectei' . PHP_EOL;

$student = new Student(
  null,
  'Kely Rodacki',
  new \DateTimeImmutable('1994-05-02')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name,:birth_date);";
$stmt = $pdo->prepare($sqlInsert);
$stmt->bindValue(':name', $student->name());
$stmt->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));


if ($stmt->execute()) {
  echo "Aluno incluído";
} else {
  echo "Aluno não incluído";
}
