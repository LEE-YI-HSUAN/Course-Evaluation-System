<?
//管理員看到的
  session_start();
  include("myaqli_obj_connMyaql.php");
  //選擇資料表
  $sql_query = "SELECT * FROM course";
  //將資料一筆一筆讀取
  $all_result = $db_link -> query($sql_query);
  $db_link->close();
  //$total_records = $all_result -> num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>課程評價系統</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="jquery-ui-1.11.3/external/jquery/jquery.js"></script>
   <script>
       $(document).ready(function(){
           $('.border').css({backgroundColor: 'white',color:'black'});
           $('.border').mousemove(function(){
               var $item = $(this).closest('.border');
                $item.css({backgroundColor: 'cadetblue',color:'white'});
           });
           $('.border').mouseout(function(){
               var $item = $(this).closest('.border');
                $item.css({backgroundColor: 'white',color:'black'});
           });
       });
        
    </script>
   
   
    <style>
        body{
            font-family:"微軟正黑體";
        }    
        h1{
            margin-top: 10px;
        }
        /*
        a{
            text-decoration: "none";
        }
        */
        .border{
            font-size: 30px;
            margin-top: 20px;
            padding: 5px 10px;
            border-radius: 10px;
            width: 950px;
        }
        .delete{
          width: 80px;
          height: 50px;
          float: right;
          margin-top: 22px;
          margin-right: 50px;
          font-size: 20px;
        }
    </style>
</head>
<body>
   <div class="container">
        <div class="text-center">
            <h1>課程評價系統</h1>
        </div>
        
        <div class="row">
      <div class="col-sm text-right" style="padding: 12px 0px;padding-right: 70px;">
          <a class="btn btn-outline-info" style="margin-right: 15px;" href="add_class.php" role="button">新增課程</a>
          <? if(!isset($_SESSION["loginMember"])||($_SESSION["loginMember"]=="")){?>
                <a class="btn btn-outline-danger" href="login.php" role="button">登入</a>
          <? } else{ ?>
                <a class="btn btn-outline-danger" href="signOut.php" role="button">登出</a>
          <? } ?>
      </div>
    </div>
      
       <div class="bg_black">
          <? while($row_result = $all_result->fetch_assoc()){
              echo "<a  class='btn border text-left' href='adm_mess.php?class={$row_result["subject"]}'>".$row_result['subject']."</a>"." <a class='btn delete text-center btn-outline-warning' href='delete_class.php?class={$row_result["subject"]}'>".
                "刪除"."</a>";
                
           } ?>
            
             <!--  <a  class='btn border text-left' style='width: 950px;' href='message.php?變形學'>變形學</a> 
              <input type='hidden' name='action' value='delete'>
              <input type='submit' class='btn text-center delete btn-outline-danger' value='刪除' name='delete'>
              <a  class='btn border text-left' href='message.php?符咒學'>符咒學</a>
              <a  class='btn border text-left' href='message.php?草藥學'>草藥學</a>  
 -->
       </div>
       
    </div>
</body>
</html>