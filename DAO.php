<?php

require_once('config.php');

class DAO {

    function __construct() {
        $this->pdo = new PDO(DSN, DB_USER, DB_PASS);
    }

    public function jobs() {
        $sql = 'SELECT * FROM zw_jobs';
        return $this->pdo->query($sql);
    }

    // テーブルをセットアップ
    public function setUpTables() {
        
    }
}

?>