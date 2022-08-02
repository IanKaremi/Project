<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cart - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content=""#8a5cffff>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/feed.css">
        <link rel="stylesheet" href="css/common.css">
</head>
<body>
    <?php
    include_once"config.php";

    session_start();
    include_once"userid.php";

    foreach($_SESSION['cart'] as $key => $value)
    {
        $_SESSION['total_price']=0;
        
        $query="SELECT * FROM `works_list` WHERE ID='$value'";
        $_SESSION['value']= $value;
        $qr= $con ->query($query) or die($con->error);
        if(isset($_SESSION['cart'])){

            $query="SELECT * FROM `works_list` WHERE ID IN (".implode(',',$_SESSION['cart']).")";
            $qr= $con ->query($query) or die($con->error);

              if(!$qr || mysqli_num_rows($qr) > 0)
              {
                  while($row = $qr->fetch_assoc()) {
                      echo"<hr> <div class='entry'>";
                      echo "<div class='img'> <img src="
                      .$row['Art'].">"

                      ."</div><div><p align=left id='entry_title'>"
                      .$row['Name']."    "
                      ."</p><p align=left id='entry_artist'>"
                      .$row['Artist Name']."    "
                      ."</p></div><div>"
                      ."</div><div>"
                      ."</div><div>"
                      ."</div><div>"."Price: Ksh. "
                      .$row['Price']."/ USD $".$row['Price']/120
                      ."</div>";
                      echo"</div>";

                      $_SESSION['total_price'] += $row['Price']; 
                    }

                  echo"<hr>";
                }
        
             
           
       }else{
           echo" Zero results";
       };

     
    }
    ?>
    <script src="https://www.paypal.com/sdk/js?client-id=AfhYlRr_VKV_EIjjXbTeWuMGKSrlg06i89eqUawPNbhSR-agAqj3BCjji1j2V13A7PJY8UFo5J2k4lit&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <!--<script src="paypal.js" async defer></script> -->
    <script>
        function total(){
        price = <?php echo($_SESSION['total_price']);?>/100;
        console.log(price)
    }
    total()
    paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: price // Can also reference a variable or function
                }
                }]
            });
        },
        // Finalize the transaction on the server after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:
                
                actions.redirect('http://127.0.0.1/NeoTones/write.php');
        });
        },
        onCancel: (data, actions) =>{
            actions.redirect('http://127.0.0.1/NeoTones/pages/index.php');
        }
    }).render('#paypal-button-container');
    </script>


 </body>
</html>