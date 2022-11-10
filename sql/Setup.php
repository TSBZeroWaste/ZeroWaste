<?php

class Setup extends DAO {

    // データベース初期化
    public function initDB() {
        parent::dropAll();
        parent::setUpTables();
    }
}
?>