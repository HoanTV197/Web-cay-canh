function addCart(itemProduct) {
    const dataCart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingItem = dataCart.find(item => item.code === itemProduct.code);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        dataCart.push(itemProduct);
    }

    localStorage.setItem('cart', JSON.stringify(dataCart)); // Lưu vào localStorage
    alert('Thêm vào giỏ hàng thành công');
    updateCartCount(); 
    genderHTMLCart();
}

function renderTotalCart() {
    const dataCart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
    const totsaCart = dataCart.reduce(
        (accumulator, currentValue) => accumulator + Number(currentValue.price)*Number(currentValue.quantity),
        0,
    );
    $("#total-cart").text(`${new Intl.NumberFormat().format(totsaCart)} .000VNĐ`)
    $('input[name="total-cart"]').val(totsaCart)
}


function genderHTMLCart() {
    const dataCart = JSON.parse(localStorage.getItem('cart')) || [];
    let string = "";

    dataCart.forEach((item, index) => {
        string += `
            <tr id="box-item-cart-${item.code}">
                <td class='img-product-cart'>
                    <a href=''>
                        <img src='../../assets/public/images/products/${item.image}' alt="${item.name}">
                    </a>
                </td>
                <td>
                    <a href='' class='pull-left'>${item.name}</a>
                    <input type='hidden' value='${item.code}' name="cart[${index}][code]" />
                </td>
                <td>
                    <span class='amount'>${new Intl.NumberFormat().format(item.price)}.000 VNĐ</span>
                </td>
                <td>
                    <div class='quantity clearfix'>
                        <input class='form-control' type='number' min='1' step='1' max='${item.max}' name="cart[${index}][quantity]" value='${item.quantity}' onInput='onChangeSL(value, ${JSON.stringify(item)})'>
                    </div>
                </td>
                <td>
                    <span class='amount' id="amount-${item.code}">
                        ${new Intl.NumberFormat().format(item.quantity * item.price)}.000VNĐ
                    </span>
                </td>
                <td>
                    <a class='remove' title='Xóa' onClick='onRemoveProduct(${JSON.stringify(item)})'><i class='fas fa-trash-alt'></i></a>
                </td>
            </tr>
        `;
    });

    $("#body-cart").html(string);
    this.renderTotalCart();
}

function onRemoveProduct(dataItem) {
    const dataCart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
    const data = dataCart.filter((item) => item.code != dataItem.code);
    localStorage.setItem('cart', JSON.stringify(data));
    $(`#box-item-cart-${dataItem.code}`).remove();
    this.renderTotalCart();
    updateCartCount();
}

function onChangeSL(value, dataItem) {
    if (dataItem?.price <= 0) {
        onRemoveProduct(dataItem);
    }
    const price = +dataItem?.price;
    const priceNew = +value * price;
    const dataCart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
    dataCart.map((item) => {
        if (item.code == dataItem.code) {
            item.quantity = value;
        }
        return item;
    });

    localStorage.setItem('cart', JSON.stringify(dataCart));
    $(`#amount-${dataItem.code}`).text(`${new Intl.NumberFormat().format(priceNew)}.000VNĐ`);
    this.renderTotalCart();
    updateCartCount();
}

function handleOrderSuccess() {
    localStorage.removeItem("cart");
    setTimeout(() => {
        $("#body-cart").empty();
        $("#total-cart").text(`VNĐ`);
        $('input[name="total-cart"]').val(0);
        alert("Bạn mua hàng thành công");
        window.location.href = '/btlPHP/view/pages/index.php?pages=trangchu';
    }, 200);
    updateCartCount();
}


// Các hàm khác..




