$(document).ready(function(){
    $("span.qtybtn").click(function(){
        var newQty = $(this).parent().find('input').val();
        newQty = ($(this).hasClass("inc"))?++newQty:--newQty;
        var id = $(this).parent().find('input').attr('id');
        changePrice(newQty, id);
    });

    $("input[type=text].changeQty").change(function(){
        var newQty = $(this).val();
        var id = (this).id;
        changePrice(newQty, id);
    });
});
function changePrice(newQty, id){
    var price = $("tr#"+id).find('.p-price').text();
    price = parseFloat(Number(price.replace(/[^0-9.-]+/g,"")));
    var newTotal = newQty * price;

    var oldTotal = $("tr#"+id).find('.total-price').text();
    oldTotal = parseFloat(Number(oldTotal.replace(/[^0-9.-]+/g,"")));

    var subTotal = $("li.subtotal").find('span').text();
    subTotal = parseFloat(Number(subTotal.replace(/[^0-9.-]+/g,"")));
    subTotal = (subTotal-oldTotal) + newTotal;

    var cartTotal = subTotal + 50 + (subTotal * 0.03);

    newTotal = new Intl.NumberFormat('en-US', { 
        style: 'currency', 
        currency: 'USD' 
    }).format(newTotal);

    subTotal = new Intl.NumberFormat('en-US', { 
        style: 'currency', 
        currency: 'USD' 
    }).format(subTotal);

    cartTotal = new Intl.NumberFormat('en-US', { 
        style: 'currency', 
        currency: 'USD' 
    }).format(cartTotal);

    $("tr#"+id).find('.total-price').text(newTotal);
    $("li.subtotal").find('span').text(subTotal);
    $("li.cart-total").find('span').text(cartTotal);
    
}