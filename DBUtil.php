<?php
    namespace phpdemo;
    use PDO;
    class DBUtil
    {
        /**
        * 架构函数
        * @access public
        * @param 
        */
        public function __construct()
        {
            
        }

        /**
        * 
        * @access public
        * @return string
        */
        public static function helloWorld()
        {
            return "Hello World! length:".strlen("Hello world!");;
        }

        public static function showUser(){
            try {  
                $pdo = new PDO("mysql:host=localhost;dbname=userdb_unittest", "root", "MySql2015");  
            } catch (PDOException $e) {  
                echo 'Connection failed: ' . $e->getMessage();  
            }  
            $sql = "select * from users";  
            echo $sql . "<BR>";  
            $pdo->query('set names utf8;');  
            $result = $pdo->query($sql);  
            $rows = $result->fetchAll();  
            foreach ($rows as $row) {  
                $username = $row["user_name"];  
                $pwd = $row["password"];  
                echo $username;  
                echo "<BR>";  
            }  
        }
    }
?>