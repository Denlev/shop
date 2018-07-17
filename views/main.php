<script type="text/javascript" src="../resources/js/products.js"></script>
<script type="text/javascript" src="../resources/js/rating.js"></script>
<?php foreach ($arrOfProducts as $product): ?>
    <div class="productMain">
        <span class="productName"><?= $product['name'] ?></span><br>
        <img class="productLogo" src="../../resources/img/<?= $product['photo'] ?>"><br>
        <span><?= $product['price'] ?>$</span><br>

         <?php if(isset($_SESSION['rate'.$product['name']])){
                echo "Current rating : ".$_SESSION['rate'.$product['name']];
            }else{?>
<!--        create 5 stars-->
        <?php for($i=1; $i<=5; $i++):?>
            <img class="star" src="../resources/img/star.png" width="25" height="20" data-count="<?=$i?>"
             data-title="<?=$product['name']?>" data-url="../star/<?=$product['name']?>/<?=$i?>">
        <?php endfor;?>
        <?php } ?>
        <div class="avg" data-title="<?=$product['name']?>"></div>
        <div><a class="clickMain" href="../add/<?= $product['name'] ?>">
                <button class="button">Add to cart</button>
            </a></div>
    </div>

<?php endforeach; ?>
