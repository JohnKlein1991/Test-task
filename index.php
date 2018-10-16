<?php       
        require_once 'header.php';
        echo "<table><tr><th>ID</th><th>Название</th></tr>";  
        $db = new SQLite3('data.db');
        $sql = 'SELECT * FROM offers';
        $result = $db->query($sql);
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>"
                    ."<td>$row[id]</td><td><a href='offers.php?id=$row[id]'>$row[name]</a></td>"
                . "</tr>";
        };
        echo "</table>";
        ?>
       </body>
</html>