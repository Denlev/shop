<script type="text/javascript" src="../../resources/js/products.js"></script>
<div id="selectedProducts">
    <?php foreach ($products as $product): ?>
        <?php if (isset($_SESSION[$product['name']]) AND $_SESSION[$product['name']] != 0): ?>
            <div class="productCart" data-name="<?=$product['name']?>">
                <span class="<?= $product['price'] ?>"></span>
                <img src="../../resources/img/<?= $product['photo'] ?>"><?= $product['name'] ?>
                x <span class="countOfProduct" data-name="<?=$product['name']?>" ><?= $_SESSION[$product['name']]  ?> </span> =
                <span class="count" data-name="<?=$product['name']?>"><?= ($_SESSION[$product['name']] * floatval($product['price'])) ?></span>$
                <a data-name="<?=$product['name']?>"
                   data-price="<?=$product['price']?>" href="../any/<?= $product['name'] ?>/">
                    <button class="remove">add</button>
                </a>
                <a data-name="<?=$product['name']?>"
                   data-price="<?=$product['price']?>" href="../remove/<?= $product['name'] ?>/">
                    <button class="remove">remove</button>
                </a>
                <br>
            </div>

        <?php endif;
            endforeach ?>
    <hr>

        <span id="sum">Sum of all selected products is : <span><?= $products['sumOfAll'] ?></span>$</span><br>
    <hr>
    <form action="../cart" method="post">
        <div id="transport">
            <span>Choose transport:</span><br>
            <label>Pick up - 0$<input type="radio" name="transport" value="0" required></label>
            <label>UPS - 5$<input type="radio" name="transport" value="5"></label>
            <hr>
        </div>
        <input id="payBtn" type="submit" name="pay" value="Confirm Pay">
    </form>
</div>