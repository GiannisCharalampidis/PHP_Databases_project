<?php

function defaultConnectToDatabase() {
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "db_lab_php";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function checkQuery($sql) {
    if(empty($sql)) {
        exit('Empty query provided!');
    }
}

function selectFromDb($sql) {
    checkQuery($sql);

    $conn   = defaultConnectToDatabase();
    $result = $conn->query($sql);
    $data   = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    return $data;
}

function selectFromDbSimple($sql):array 
{
    exitOnEmptyInput($sql, "Empty 'select' query in line: " . __LINE__);

    $conn   = defaultConnectToDatabase();
    $result = $conn->query($sql);
    $data   = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    return $data;
}

function selectFromDbArray($sql) {
    exitOnEmptyInput($sql, "Empty 'select' query in line: " . __LINE__);

    $conn   = defaultConnectToDatabase();
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error executing the query: " . $conn->error;
        return null;
    }

    $conn->close();

    return $result;
}

function exitOnEmptyInput($parameter, $message = ''): void {
    if(empty($parameter)) {
        exit($message);
    }
}

function executeQuery($sql) 
{
    exitOnEmptyInput($sql, "Empty query in line: " . __LINE__);

    $conn   = defaultConnectToDatabase();
    $result = $conn->query($sql);

    $conn->close();

    return $result;
}

?>