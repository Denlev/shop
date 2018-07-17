
?><!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="../../resources/lib/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="../../resources/css/layout.css">
    <link rel="stylesheet" href="../../resources/css/products.css">
    <link rel="stylesheet" href="../../resources/css/cart.css">
    <title>Shop</title>
</head>
<body>
<header>
    <a id="logo" href="/">SHOP</a>
    <span id="cash">Your current cash: <span id="cashNum"><?echo$_SESSION['cash']?></span>$</span>
    <a id="cart" href="../cart"><img src="../../resources/img/cart.png"></a></div>
</header>
</body>
<div id="content">



{content}

</div>

</body>
</html>