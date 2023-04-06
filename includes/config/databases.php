<?php

function conectarDB() : mysqli {

    $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_BD']);

    if (!$db) {
        echo "Error, no se pudo conectar a la Base de datos";
        exit;
    }

    return $db;
}