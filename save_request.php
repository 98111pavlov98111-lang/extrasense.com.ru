<?php
header('Content-Type: application/json; charset=utf-8');

$dir = __DIR__ . '/../data/requests/';
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$psychic = trim($_POST['psychic'] ?? '');
$problem = trim($_POST['problem'] ?? '');

if ($name === '' || $phone === '' || $problem === '') {
    echo json_encode(['status' => 'error', 'message' => 'Заполните все обязательные поля']);
    exit;
}

$filename = $dir . date('Y-m-d_H-i-s') . '.txt';
$content = "Имя: $name\nТелефон: $phone\nСпециалист: $psychic\nПроблема: $problem\nДата: " . date('Y-m-d H:i:s');

file_put_contents($filename, $content);

echo json_encode(['status' => 'success', 'message' => 'Заявка успешно отправлена!']);
?>
