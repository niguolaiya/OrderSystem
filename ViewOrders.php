<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Main.css" >
    </head>
    
    <body>
        <div id="header">
            <div class="header-content">
                <div class="header-text">Shopping</div>
            </div>
            <div class="header-content">
                <div class="header-text">Orders</div>
            </div>
            <div class="header-content">
                <div class="header-text">Cart</div>
            </div>
            <div class="header-content" id="login">
                <div class="header-text">Login</div>
            </div>
        </div>
        
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

