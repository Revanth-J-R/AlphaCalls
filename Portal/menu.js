let cart = [];
let itemSet = [];
const cartIcons = document.getElementsByClassName("cart-icon");


let itemqty = 1, itemno = 1;
function containsItem(list, itemToCheck, itemSizeCheck) {
    for (let i = 0; i < list.length; i++) {
        if (list[i][1] === itemToCheck && list[i][2] == itemSizeCheck) {
            return true; // The item is already in the list
        }
    }
    return false; // The item is not in the list
}

function findIndex(list, val, sval) {
    for (let i = 0; i < list.length; i++) {
        if (list[i][1] == val && list[i][2] == sval) {
            return i;
        }
    }
}


function printItems(list, result) {
    for (let i = 0; i < list.length; i++) {
        result += "<tr><td>" + list[i][0] + "</td><td>" + list[i][1] + "</td><td>" + list[i][2] + "</td><td>" + list[i][3] + "</td><td>" + list[i][4]
            + "</td><td><button class=\"deselect\" data-pizza-name=\"" + list[i][1] + "\"data-pizza-size=\"" + list[i][2] + "\">-</button></td></tr>";
    }
    return result;
}

function updateItems(list, result) {
    result = []
    for (let i = 0; i < list.length; i++) {
        result += "<tr><td>" + list[i][0] + "</td><td>" + list[i][1] + "</td><td>" + list[i][2] + "</td><td>" + list[i][3] + "</td><td>" + list[i][4]
            + "</td><td><button class=\"deselect\" data-pizza-name=\"" + list[i][1] + "\"data-pizza-size=\"" + list[i][2] + "\">-</button></td></tr>";
    }
    return result;
}

function totFun(list) {
    let tot = 0;
    for (let i = 0; i < list.length; i++) {
        tot += parseInt(list[i][4]);
    }
    return tot;
}

for (let i = 0; i < cartIcons.length; i++) {
    cartIcons[i].addEventListener("click", function (event) {
        itemname = cartIcons[i].getAttribute("data-pizza-name");
        itemprice = cartIcons[i].getAttribute("data-pizza-price");
        itemsize = cartIcons[i].getAttribute("data-pizza-size");
        itemId = cartIcons[i].getAttribute("data-pizza-id");
        if (containsItem(cart, itemname, itemsize) == true) {
            let j = findIndex(cart, itemname, itemsize);
            cart[j][3] += 1;
            itemqty = cart[j][3];
            itemprice = itemprice * itemqty;
            cart[j][4] = itemprice;
        }
        else {
            itemqty = 1;
            itemSet.push(itemId);
            cart.push([itemno, itemname, itemsize, itemqty, itemprice]);
            itemno += 1;
        }
        let result = "";
        let tot = totFun(cart);
        result = printItems(cart, result);
        // console.log(cart);
        console.log("Item Set: ", itemSet);
        document.getElementById("cart-items").innerHTML = result;
        document.getElementById("cart-total").innerHTML = tot;

        let deselects = document.getElementsByClassName("deselect");
        // console.log("length", deselects.length);

        for (let j = 0; j < deselects.length; j++) {
            deselects.addEventListener("click", function (event) {
                console.log("clicked");
                itemname = deselects[j].getAttribute("data-pizza-name");
                itemsize = deselects[j].getAttribute("data-pizza-size");
                k = findIndex(cart, itemname, itemsize);
                cart[j][3] -= 1;
                let tot = totFun(cart);
                result = updateItems(cart, result);
                document.getElementById("cart-items").innerHTML = result;
                document.getElementById("cart-total").innerHTML = tot;
            });
        }
    });
}




document.getElementById('sendButton').addEventListener('click', function () {
    console.log("F");
    var cartTotal = document.getElementById('cart-total').innerText;
    window.location.href = 'payment-gateway.php?cartTotal=' + encodeURIComponent(cartTotal);
});

