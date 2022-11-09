<?php

class Setup extends DAO {

    function __construct($is_debug){
        parent::__construct($is_debug);
    }

    // データベース初期化
    public function init_db() {
        parent::dropAll();
        parent::setUpTables();
    }
}
?>