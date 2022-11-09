<?php

require_once(__DIR__.'/../config.php');

class DAO {

    public $pdo;

    function __construct(bool $is_debug) {
        if ($is_debug) {
            $this->pdo = new PDO(TEST_DSN, TEST_DB_USER, TEST_DB_PASS);
        } else {
            $this->pdo = new PDO(DSN, DB_USER, DB_PASS);
        }
    }

    /* テーブルの初期化 */

    // テーブルがなければ作成
    protected function setUpTables() {
        $sql_array = array(
            'setup/user.sql',// 0: user
            'setup/address.sql',// 1: address
            'setup/job.sql',// 2: job
            'setup/item.sql',// 3: item
            'setup/collection.sql',// 4: collection
            'setup/sold.sql',// 5: sold
            'setup/selling.sql',// 6: selling
            'setup/want.sql',// 7: want
            'setup/meisai.sql',// 8: meisai
        );
        for ($i = 0; $i < count($sql_array); $i++) {
            $sql = file_get_contents($sql_array[$i]);
            $this->pdo->query($sql);
            /*
            try {
                $this->pdo->query($sql);
            } catch (PDOException $e) {
                echo ''.$i.'番目のSQL<br>';
                echo $e->getTraceAsString().'<br><br>';
            }
            */
        }
    }

    // すべてのテーブルを削除
    protected function dropAll() {
        $sql = file_get_contents('drop/drop.sql');
        $this->pdo->query($sql);
    }

    /* SELECT文 */

    // jobデータ取得
    public function getJobs() {
        $sql = file_get_contents(__DIR__.'/select/job.sql');
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
