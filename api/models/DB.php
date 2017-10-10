<?php

    define("DB_HOST", 'localhost');
    define("DB_NAME", 'blog');
    define("DB_USER", 'altman_eddie');
    define("DB_PASS", '');

class DB {
    protected $dbh;
    protected $sth;
    
    function __construct() {
        try {
           $this->dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME , DB_USER, DB_PASS);
        //   echo 'Connection with success!';
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }    
    } 
    
    protected function selectAll($sql, $data = array()) {
        //echo $sql;
        $this->sth = $this->dbh->prepare($sql);
        $this->sth->execute($data);
        return $this->sth->fetchAll(PDO::FETCH_ASSOC);    
    }
    
    protected function countAll() {
        return $this->sth->rowCount();    
    }
    
    protected function insertItem($sql, $data) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $this->dbh->lastInsertId();   
    }
}