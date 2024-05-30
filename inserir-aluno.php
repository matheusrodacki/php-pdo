<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . 'banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo 'Conectei' . PHP_EOL;

$student = new Student(
  null,
  'Matheus Rodacki',
  new \DateTimeImmutable('1997-04-15')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?,?);";
$stmt = $pdo->prepare($sqlInsert);
$stmt->bindValue(1, $student->name());
$stmt->bindValue(2, $student->birthDate()->format('Y-m-d'));


if ($stmt->execute()) {
  echo "Aluno incluído";
} else {
  echo "Aluno não incluído";
}
