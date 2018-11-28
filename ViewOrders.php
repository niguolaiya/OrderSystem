<!DOCTYPE html>
<html>
    <head>
        <?php 
            require 'verification.php';
        ?>
        <link rel="stylesheet" type="text/css" href="Main.css" >
    </head>
    
    <body>
        <?php 
            include 'NavBar.html';
        ?>
        
        <div id="body-content">

            <?php
            
                $cartId = "";
                $cartCost = "";
                $cartNumber = "";
                $cartArray = [];
                $username = $_SESSION['username'];
            
                $conn = oci_connect('sizheng', 'Dec371996', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

                $cartQuery = "SELECT co.ID, co.TOTAL_COST, co.TOTAL_NUMBER FROM USER_T u INNER JOIN CART_ORDER co ON u.USERNAME = '$username'";
                $stid = oci_parse($conn, $cartQuery);
            
                oci_define_by_name($stid, 'ID', $cartId);
                oci_define_by_name($stid, 'TOTAL_COST', $cartCost);
                oci_define_by_name($stid, 'TOTAL_NUMBER', $cartNumber);

                oci_execute($stid,OCI_DEFAULT);

                while($row = oci_fetch_array($stid, OCI_ASSOC))
                {
                    array_push($cartArray, array($cartId, $cartCost, $cartNumber));
                }
            
                oci_free_statement($stid);
                
                foreach($cartArray as $cartRow) {
                    echo "<div style='display:flex;'>";
                        echo "<div style='flex: 1; border: solid black 1px; border-radius: 10px; padding: 10px; height: 90px; margin-right: 10px; background-color: #EFEFFF;'>";
                            echo "<br/><div style='float: left;'><b>ORDER ID:</b></div> <div style='float: right;'>$cartRow[0]</div><br/>";
                            echo "<div style='float: left;'><b>TOTAL COST:</b></div> <div style='float: right;'>$$cartRow[1]</div><br/>";
                            echo "<div style='float: left;'><b>TOTAL ITEMS:</b></div> <div style='float: right;'>$cartRow[2]</div><br/><br/>";
                        echo "</div>";

                        $itemQuery = "SELECT i.NAME, i.PRICE, i.CATEGORY, ci.NUMBER_OF_ITEM FROM CART_ITEM ci INNER JOIN ITEM i ON ci.ORDER_ID = '$cartRow[0]' AND ci.ITEM_ID = i.ID";

                        $stid = oci_parse($conn, $itemQuery);

                        oci_execute($stid,OCI_DEFAULT);
                        
                        echo "<div style='flex: 4;'>";
                            echo "<table>";
                                echo "<tr><th>NAME</th><th>PRICE</th><th>CATEGORY</th><th>NUMBER OF ITEM</th></tr>";
                                while($row = oci_fetch_array($stid, OCI_ASSOC))
                                {
                                    $count = 0;
                                    echo "<tr>";
                                    foreach ($row as $item)    
                                    {
                                        if($count == 1) {
                                            echo "<td style='text-align: right;'>$";
                                        } elseif ($count == 3) {
                                            echo "<td style='text-align: center;'>";
                                        } else {
                                            echo "<td>";
                                        }
                                        echo $item."</td>";
                                        $count += 1;
                                    }
                                    echo "</tr>";
                                }
                            echo "</table>";
                        echo "</div>";
                    echo "</div><br/><br/>";
                    
                    oci_free_statement($stid);
                }

                oci_close($conn);
            
                //echo "<script type='text/javascript'>alert('$query');</script>";
            ?>
            
        </div>
        
    </body>
</html>

