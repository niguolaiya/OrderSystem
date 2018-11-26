<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Main.css" >
    </head>
    
    <body>
        <?php include 'NavBar.html' ?>
        
        <div id="body-content">
            
            <?php echo 'Hello!'; ?>

            <?php
                $data = array(
                    array("Row1", "Item", "Item"), 
                    array("Row2", "Item", "Item"), 
                    array("Row3", "Item", "Item")
                );

                echo '<table>';
                echo '<tr><th>Col1</th><th>Col2</th><th>Col3</th></tr>';
                foreach($data as $row){
                    echo '<tr>';
                    foreach($row as $col){
                        echo '<td>'.$col.'</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
            ?>
            
        </div>
        
    </body>
</html>

