<?php

$redis = new Redis();
$redis->pconnect('redis', 6379);

$key = 'first';
$redis->incr($key);

echo '页面浏览了：'.$redis->get($key);


try {
    $dsn = 'mysql:host=db;port=3306';
    $user = 'root';
    $password = 'root';

    $conn = new PDO($dsn, $user, $password);
    $sql = 'show databases;';
    $databaseArr = $conn->query($sql)->fetchAll();

    echo "<br>all the databases: ";
    foreach($databaseArr as $item){
        echo $item['Database'].',';
    }
} catch (PDOException $e) {
    echo 'Connection failed: '.$e->getMessage();
}
