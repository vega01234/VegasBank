<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "vegasbank";

    try {

        //Conexion a la DB
        $conexion = new PDO("mysql: host=$host", $username, $password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Crear DB si no existe
        $queryConexion = $conexion->prepare("CREATE DATABASE IF NOT EXISTS vegasbank");
        $queryConexion->execute();

        //Se selecciona la DB
        $conexion->exec("USE $database");

        //Se crea la tabla Users si no existe
        $queryUser = $conexion->prepare("CREATE TABLE IF NOT EXISTS vegasbank.users (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(250) NOT NULL, lastname varchar(250) NOT NULL, email varchar(250) NOT NULL, username varchar(250) NOT NULL, password varchar(250) NOT NULL) ENGINE = INNODB");
        $queryUser->execute();

        //Se crea la tabla Wallet si no existe
        $queryWallet = $conexion->prepare("CREATE TABLE IF NOT EXISTS vegasbank.wallet (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, id_user INT NOT NULL, balance float NOT NULL, FOREIGN KEY (id_user) REFERENCES users(id)) ENGINE = INNODB");
        $queryWallet->execute();

        //Se crea la tabla HistorialMovimientos si no existe
        $queryHistorial = $conexion->prepare("CREATE TABLE IF NOT EXISTS vegasbank.movimientos (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, id_user INT NOT NULL, tipomovimiento varchar(250) NOT NULL, monto INT NOT NULL, fecha datetime NOT NULL, FOREIGN KEY (id_user) REFERENCES users(id)) ENGINE = INNODB");
        $queryHistorial->execute();

    } catch (PDOException $e) {
        echo "Error al Establecer la Conexion: ".$e->getMessage();
    }

?>