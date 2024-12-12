<?php
// client.php

$url = 'http://localhost:5000/tasks'; // URL da API
$ch = curl_init($url);

// Configurar requisição GET
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    $tasks = json_decode($response, true);
    echo '<h1>Task List</h1>';
    foreach ($tasks as $task) {
        echo '<p>' . $task['title'] . ' - ' . ($task['completed'] ? 'Completed' : 'Pending') . '</p>';
    }
}

curl_close($ch);
?>
