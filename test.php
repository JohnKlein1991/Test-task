<?php
$testdb = new SQLite3('test.db');
$comment = $testdb->escapeString($_POST['comment']);
$orderId = (int)$_POST['orderid'];
$orderSum = $testdb->escapeString($_POST['ordersum']);
$offerId = (int)$_POST['offerid'];
$checkboxlength = $_POST['checkboxlength'];
$clicksArr = [];
$clicksStr = '';
$strArrHash = '';
$testdb->close();
        
        for ($i = 0; $i <= $checkboxlength; $i++){
                if ($_POST[$i] == 'on'){
                    $sql1 = "SELECT hash FROM clicks WHERE id=$i";
                    $db = new SQLite3('data.db');
                    $result = $db->query($sql1);
                    

                    $resultArr = $result->fetchArray(SQLITE3_NUM);
                    $clicksStr = "'".$resultArr[0]."'";
                    array_push($clicksArr, $clicksStr);

                };                
            };      $db->close();
                    $strArrHash = '['.implode(',',$clicksArr).']';

$db = new SQLite3('data.db');
$sql = "INSERT INTO tickets (offer_id, order_id, order_sum, comment, clicks)"
        . "VALUES (\"$offerId\", \"$orderId\", \"$orderSum\", \"$comment\", \"$strArrHash\");";
$result = $db->query($sql);
if ($result)    {echo "Спасибо за Вашу заявку!";}
else {    echo "Упс, к сожалению ,что-то пошло не так, попробуйте еще раз";}
