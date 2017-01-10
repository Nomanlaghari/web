
<?php

session_start();

include_once('config.php');

$itemCount = 0;

if(isset($_SESSION['cart'])){
   
   $itemCount = count(isset($_SESSION['cart']) ? $_SESSION['cart'] : array());

}
?>

<!DOCTYPE html>

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/css.css" type="text/css" />


<!--End Google+ Open Graph-->

<title>Simple Shoping Cart in php</title>

</head>

<body>

<div class="hdr"><img src="http://coderglass.com/images/logo.png"/></div>

<h2 class="hlab">Simple shopping CART system!!</h2>

    <nav>
			<div class="nav-bar">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="cart.php">View Cart</a></li>
				<li><div class="cart-a">{ <?php echo $itemCount; ?> }</div></li>   
            </ul>
            <div class="clear"></div>
           </div>

    </nav>


	<div class="container main-cude">


        <p class="msg">

        <?php if(isset($_REQUEST['msg'])){

			switch($_REQUEST['msg']):

			case 'add':

            $msg = $_REQUEST['p'] . " was added to your cart.";

            break;

            case 'exists':

            $msg = $_GET['p'] . " already in your cart.";

            break;

            endswitch;

            echo $msg;

            }

        ?>

        </p>

    <h2>Products in shop</h2>

        <ul class="item-cont">
           
		   <li>Product Name</li>
           <li>Price</li>
          
		</ul>

    <div class="clear"></div>

        <?php

			$qur = mysqli_query($con,"SELECT * FROM  `product` ");

                while($r = mysqli_fetch_array($qur)){

                extract($r);
        ?>
   
    <div>

    <div class="inline-pr"><?=$productName?></div>

    <div class="inline-pr"><?=$price?></div>

    <div class="inline-pr">
	<a href="curd.php?action=add&pid=<?=$productID?>&p=<?=$productName?>" class="button-cart">Add to Cart</a>
	</div>

    </div>

    <?php }?>

    <div class="clear"></div>


</div>


<div class="resv">
	<a href="http://coderglass.com"> coderglass.com</a>
	<a href="http://coderglass.com" style="float:right">Powered By:- Coder Glass</a>
</div>

</body>
</html>