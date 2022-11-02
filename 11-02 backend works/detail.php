<?php
  include('../config/dbconfig.php');
  if (!isset($_GET['item_id'])) {
    echo "<script>window.history.go(-1)</script>";
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="./js/jquery.min.js"></script>
<title>商品詳細</title>
</head>
<body>
<?php include('head.php');?>

<?php
  $sql = "select * from goods where item_id=".$_GET['item_id'];
  $result = mysqli_query($link,$sql) or die('データベースへ接続できません'.mysqli_error($link));
  $row = mysqli_fetch_assoc($result);
  if (!$row) {
    echo "<center style='padding-top:50px;'><h2>商品は存在しない！</h2><center>";
    exit;
  }
?>
<div class="content">
  <div class="content_box" style="padding-top:10px;">
    <div class="t_about clearfix">
      <div class="l_about">
        <div><img src="../admin/include/uploads/<?php echo $row['picture'];?>" width="100%" /></div>
      </div>
      <div class="r_about">
        <input type="hidden" id="item_id" value="<?php echo $row['item_id'];?>" />
        <div class="r_top"><?php echo $row['item_name'];?></div>
        <div class="r_main">
          <div>价格 <span style="font-size:24px; color:#ff3300;">¥<?php echo $row['price'];?></span></div>
          
          <div class="choose-btns clearfix"> 
            <div class="choose-amount">
              <div class="wrap-input">
                <input class="text buy-num" id="buy-num" value="1" data-max="200">
                <a class="btn-reduce" href="javascript:reduceNum('-');" data-disabled="1">-</a>
                <a class="btn-add" href="javascript:addNum('+');" data-disabled="1">+</a>
              </div>
            </div>
              <div>
                <a href="javascript:addShop();" class="pay_now2">気になる</a>
              </div>
          </div>
         
          <div>支払い <span><img src="images/xinyong.png" /></span>クレジットカード <span><img src="images/daofukuan.png" /></span>現金</div>
        </div>
      </div>
    </div>
    <script>
      function addNum() {
        let num = +$("#buy-num").val();
        $("#buy-num").val(num+1);
      }
      function reduceNum() {
        let num = +$("#buy-num").val()-1;
        if (num<1) {
          return;
        }
        $("#buy-num").val(num);
      }
      function addShop() {
        let buyNum = +$("#buy-num").val();
        let item_id = +$("#item_id").val();
        window.location.href = 'action.php?a=cart&item_id='+item_id+'&num='+buyNum;
      }
    </script>
    <div class="b_about">
      <div class="title">
        <div class="current">商品詳細</div>
      </div>
      <div class="b_about_main">
        <?php echo $row['detail'];?>
      </div>
    </div>
  </div>
</div>
<div class="foot">
  
  <div class="footer">
    
   ZEROWASTE@copyright
  </div>
  <div> </div>
</div>
</body>
</html>
