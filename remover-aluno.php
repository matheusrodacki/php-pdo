<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . 'banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo 'Conectei' . PHP_EOL;

$sqlDelete = "DELETE FROM students WHERE id = ?;";
$statement = $pdo->prepare($sqlDelete);
$statement->bindValue(1, 2, PDO::PARAM_INT);

if ($statement->execute()) {
  echo "Aluno excluído";
} else {
  echo "Aluno não excluído";
}
