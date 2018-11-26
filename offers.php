<?php

        require_once 'header.php';
        $db = new SQLite3('data.db');
        //Находим id всех чекбоксов и составляем из них массив
        $allcheckbox = 'SELECT id FROM clicks';
        $res = $db->query($allcheckbox);
        $checkboxarray = array();
        $i = 0;
        while ($x = $res->fetchArray(SQLITE3_NUM)){
            $checkboxarray[$i] = "$x[0]";
            $i++;
        };
        $checkboxlength = $i;
        
        
       if ($_SERVER['REQUEST_METHOD'] === 'POST'){
       if(isset($_POST['name'])){
           $data = $_POST['name'];
           echo "<div>$data</div>";
   }else{
       echo "<div>Данных нет</div>";
   }
       
       echo "<div>Кликни <a href='index.php'>сюда</a>, чтобы вернуться на главную</div>";
   }

   if ($_SERVER['REQUEST_METHOD'] === 'GET'){

 $id = strtolower($_GET['id']);

     echo "<form>"
            . "<table>"
        . "<tr>"
                . "<th></th><th>ID</th><th>Offer ID</th><th>Hash</th><th>Datetime</th>"
        . "</tr>";
        $sql = "SELECT * FROM clicks WHERE offer_id=$id";
        $result = $db->query($sql);
        while ($row = $result->fetchArray(SQLITE3_ASSOC)){
            echo "<tr>"
            . "<td><input type='checkbox' name='$row[id]'></td><td>$row[id]</td><td>$id</td><td>$row[hash]</td><td>$row[datetime]</td></tr>";
            };
            echo "</table>"
            ."<input type='hidden' name='checkboxlength' value='$checkboxlength'>"
            ."<input type='hidden' name='offerid' value='$id'>"
            . "<input name='orderid' type='number' placeholder='Номер заказа' required>"
            . "<input name='ordersum' type='text' placeholder='Сумма заказа' required>"
            . "<textarea name='comment' placeholder='Комментарий'></textarea>"        
            . "</form>"
            . "<button id='formsend'>Сохранить</button>";
   }
   


        ?>

        <script src='require.js'></script>
    </body>
</html>
