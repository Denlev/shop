
function isInteger(num) {
    return (num ^ 0) === num;
}

//Add product to cart from main page
$(document).ready(function () {
    $(".clickMain").click(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: $(this).attr('href'),
            data: $(".productName").val(),
            success: function (result) {
                alert(result + " was added to your cart!");
            }
        });
    });
});

//Add or Remove products from cart
$(document).ready(function () {
    $("#selectedProducts a").click(function (event) {
        var totalPrice = 0,
            lengthOfAllProducts = $("#selectedProducts .count").length;
        for (var i = 0; i < lengthOfAllProducts; i++) {
            totalPrice += parseFloat($("#selectedProducts .count").eq(i).html());
        }
        event.preventDefault();
        var dataName = $(this).data('name');
        var currentPrice = $(this).data('price');
        var text = $.trim($(this).text());
        //Add
        if (text === "add") {
            var count = prompt("Enter the quantity of the item", "");
            event.preventDefault();
            if (Number(count) <= 0 || !isInteger(Number(count))) {
                alert("Incorrect quantity");
            }
            else {
                $.ajax({
                    type: 'post',
                    url: $(this).attr('href') + count,
                    success: function (result) {
                        var countOfEachProduct = $('[class = countOfProduct][data-name = ' + dataName + ' ]');
                        countOfEachProduct.text(result);
                        //Add summary price of each product
                        $('[class=count][ data-name = ' + dataName + ']').text((result * currentPrice).toFixed(2));

                        //Sum of all selected products
                        var totalPrice = 0,
                            lengthOfAllProducts = $("#selectedProducts .count").length;
                        for (var i = 0; i < lengthOfAllProducts; i++) {
                            totalPrice += parseFloat($("#selectedProducts .count").eq(i).html());
                        }
                        $("#sum > span").text(totalPrice);

                        //Remove div when amount of product zero
                        if (countOfEachProduct.text() <= 0) {
                            $('[class=productCart][ data-name = ' + dataName + ']').remove();
                        }

                    }
                })
            }
        }
        //Remove
        if (text === "remove") {
            var count = prompt("Enter the quantity", "");
            var currentAmount = $('[class = countOfProduct][data-name = ' + dataName + ' ]').text();
            if (Number(count) > Number(currentAmount) || Number(count) <= 0 || !isInteger(Number(count))) {
                alert("You can't remove this quantity");
            } else {

                $.ajax({
                    type: 'post',
                    url: $(this).attr('href') + count,
                    success: function (result) {
                        var countOfEachProduct = $('[class = countOfProduct][data-name = ' + dataName + ' ]');
                        countOfEachProduct.text(result);
                        //Add summary price of each product
                        $('[class=count][ data-name = ' + dataName + ']').text((result * currentPrice).toFixed(2));

                        //Sum of all selected products
                        var totalPrice = 0,
                            lengthOfAllProducts = $("#selectedProducts .count").length;
                        for (var i = 0; i < lengthOfAllProducts; i++) {
                            totalPrice += parseFloat($("#selectedProducts .count").eq(i).html());
                        }
                        $("#sum > span").text(totalPrice);

                        //Remove div when amount of product zero
                        if (countOfEachProduct.text() <= 0) {
                            $('[class=productCart][ data-name = ' + dataName + ']').remove();
                        }

                    }
                });
            }
        }
    });
});

