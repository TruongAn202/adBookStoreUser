<?php
    function connectdb(){
        // $servername = "sql207.infinityfree.com";
        // $username = "if0_37577996";
        // $password = "mqfxbdhp";
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
        $conn = new PDO("mysql:host=$servername;dbname=dbbookstore1;charset=utf8mb4", $username, $password);
        //$conn = new PDO("mysql:host=$servername;dbname=if0_37577996_dbbookstore1", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET NAMES 'utf8mb4'");
        //echo "Connected successfully";
        } catch(PDOException $e) {
        //echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }
    function get_all($sql){
        $conn=connectdb();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr=$stmt->fetchAll(); // trả về tất cả (hiển thị)
        $conn=null; //đóng kết nối
        return $arr;
    }
    
?>