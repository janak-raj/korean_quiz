<?php
    class DatabaseConfig {
        protected function integrate() {
            try {
                $server = "localhost";
                $user = "root";
                $password = "";
                $database = "hanguk_quiz";

                $fuse = new PDO("mysql:host=$server;dbname=$database", $user, $password);
                $fuse->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

                return $fuse;
            } catch (PDOException $e) {
                print "Error: ".$e->getMessage()."<br/>";
                die();
            }
        }
    }
?>