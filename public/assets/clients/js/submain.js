$(document).ready(function () {
    $("a.AddToCart").on("click", function (e) {
        e.preventDefault();

        var productId = $(this).data("product-id");
        var username = $(this).data("username");

        $.ajax({
            url: "ShoppingCart/AddToCart",
            type: "POST",
            data: {
                productId: productId,
                username: username,
            },
            success: function (response) {
                // Handle the response from the server
                console.log(response);
                if (response.msg == "pass") {
                    $("#SlightRightCartProductArea").append(
                        `
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="${window.location.origin + "/fiama"}${
                            response.img
                        }" alt="Image"></a>
                    <span onclick="DeleteProductFromCart(${response.customer_id},${
                            response.product_id
                        })" class="mini-cart-item-delete"><i class="icon-trash"></i></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">${response.title}</a></h6>
                    <div class="d-flex">
                      <span class="mini-cart-quantity">1</span>
                      <span style="display: block;" class="ms-2 me-2">x</span>
                      <span>$</span>
                      <span class="mini-cart-price">${response.price}</span>
                    </div>
                    <div class="">
                        <button style="padding: 2px 6px; line-height: 1;" data-customer-id="${
                            response.customer_id
                        }" data-product-id="${
                            response.product_id
                        }" class="btnDecreaseShoppingCart btn btn-info" >-</button>
                        <button style="padding: 2px 6px; line-height: 1;" data-customer-id="${
                            response.customer_id
                        }" data-product-id="${
                            response.product_id
                        }" class="btnIncreaseShoppingCart btn btn-info" >+</button>
                    </div>
                </div>
            </div>
          `
                    );
                    var cart_count_text = $("#Header-cart-count").text();
                    var cart_count = parseFloat(cart_count_text);
                    $("#Header-cart-count").text(cart_count + 1);

                    var totalText = $("#mini-cart-total").text();
                    var total = parseFloat(totalText);
                    $("#mini-cart-total").text(total + parseFloat(response.price));

                    alert("Add Successfully!");
                } else {
                    alert(response.msg);
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred while adding product to cart. Please try again later.");
            },
        });
    });

    $(document).on("click", ".btnDecreaseShoppingCart", function (e) {
        e.preventDefault();

        var product_id = $(this).attr("data-product-id");
        var customer_id = $(this).attr("data-customer-id");

        var $btn = $(this); // Lưu tham chiếu đến button được click

        $.ajax({
            url: "ShoppingCart/decreaseShoppingCart",
            type: "POST",
            data: {
                product_id,
                customer_id,
            },
            success: function (response) {
                // Handle the response from the server
                if (response.msg == "pass") {
                    var priceText = $btn.closest(".mini-cart-info").find(".mini-cart-price").text();
                    var price = parseFloat(priceText);
                    console.log(priceText);
                    var quantityText = $btn
                        .closest(".mini-cart-info")
                        .find(".mini-cart-quantity")
                        .text();
                    var quantity = parseInt(quantityText);

                    var totalText = $("#mini-cart-total").text();
                    var total = parseFloat(totalText);

                    $("#mini-cart-total").text(total - price);
                    $btn.closest(".mini-cart-info")
                        .find(".mini-cart-quantity")
                        .text(quantity - 1);
                } else {
                    alert(response.msg);
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert(
                    "An error occurred while decrease amount of product. Please try again later."
                );
            },
        });
    });

    //ADDRESS

    $(document).on("click", "#myaccount-add-address-btn", function (e) {
        e.preventDefault();
        $("#myaccount-add-address-modal").modal("show");
    });

    $(document).on("click", "#btn-close-add-address-modal", function (e) {
        e.preventDefault();
        $("#myaccount-add-address-modal").modal("hide");
    });

    $(document).on("change", "#address-modal-select-province", function (e) {
        e.preventDefault();
        console.log("cc");
        $("#address-modal-select-district").html("");
        $("#address-modal-select-ward").html("");
        const province_id = $("#address-modal-select-province option:selected").attr(
            "data-province-id"
        );

        const webroot = window.location.origin;

        $.getJSON(
            webroot + "/fiama/public/assets/addresses/quan-huyen/" + province_id + ".json",
            function (data) {
                var districtOptionHtml = `<option value="" selected>Choose district</option>`;
                var districts = data;
                Object.keys(districts).forEach(function (key) {
                    districtOptionHtml += `<option value="${districts[key].name}" data-district-id="${districts[key].code}">${districts[key].name}</option>`;
                });
                $("#address-modal-select-district").html(districtOptionHtml);
            }
        );
    });

    $(document).on("click", ".btn-delete-address", function (e) {
        const address_id = $(this).attr("data-address-id");
        $.ajax({
            url: "User/DeleteAddress",
            type: "POST",
            data: {
                address_id,
            },
            success: function (response) {
                alert(response);
                window.location.reload();
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred while deleting your address. Please try again later.");
            },
        });
    });

    $(document).on("change", "#address-modal-select-district", function (e) {
        e.preventDefault();
        const district_id = $("#address-modal-select-district option:selected").attr(
            "data-district-id"
        );
        console.log("[id]: ", district_id);
        const webroot = window.location.origin;

        $.getJSON(
            webroot + "/fiama/public/assets/addresses/xa-phuong/" + district_id + ".json",
            function (data) {
                var wardOptionHtml = `<option value="" selected>Choose ward</option>`;
                var wards = data;
                Object.keys(wards).forEach(function (key) {
                    wardOptionHtml += `<option value="${wards[key].name}">${wards[key].name}</option>`;
                });
                $("#address-modal-select-ward").html(wardOptionHtml);
            }
        );
    });

    //END

    $(document).on("click", ".btnIncreaseShoppingCart", function (e) {
        e.preventDefault();

        var product_id = $(this).attr("data-product-id");
        var customer_id = $(this).attr("data-customer-id");

        var $btn = $(this); // Lưu tham chiếu đến button được click

        $.ajax({
            url: "ShoppingCart/increaseShoppingCart",
            type: "POST",
            data: {
                product_id,
                customer_id,
            },
            success: function (response) {
                // Handle the response from the server

                if (response.msg == "pass") {
                    var priceText = $btn.closest(".mini-cart-info").find(".mini-cart-price").text();
                    var price = parseFloat(priceText);
                    console.log(priceText);
                    var quantityText = $btn
                        .closest(".mini-cart-info")
                        .find(".mini-cart-quantity")
                        .text();
                    var quantity = parseInt(quantityText);

                    var totalText = $("#mini-cart-total").text();
                    var total = parseFloat(totalText);

                    $("#mini-cart-total").text(total + price);
                    $btn.closest(".mini-cart-info")
                        .find(".mini-cart-quantity")
                        .text(quantity + 1);
                } else {
                    alert(response.msg);
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert(
                    "An error occurred while decrease amount of product. Please try again later."
                );
            },
        });
    });
});

function DeleteProductFromCart(customer_id, product_id) {
    $.ajax({
        url: "ShoppingCart/DeleteProductFromCart",
        type: "POST",
        data: {
            productId: product_id,
            customerId: customer_id,
        },
        success: function (response) {
            // Handle the response from the server
            console.log(response);
            if (response.msg == "pass") {
                alert("Remove Successfully!");
                location.reload();
            } else {
                alert(response.msg);
            }
        },
        error: function (xhr) {
            // Handle any errors that occur during the AJAX request
            alert("An error occurred while remove product from cart. Please try again later.");
        },
    });
}
