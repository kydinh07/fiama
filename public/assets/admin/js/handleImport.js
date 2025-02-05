$(document).ready(function () {
    $("#import-add-import-btn").on("click", function (e) {
        e.preventDefault();
        var webroot = window.location.origin;
        $.ajax({
            url: webroot + "/fiama/admin/GetAllProduct", //controller: admin, action: GetAllProduct
            type: "POST",
            data: {
                productId: 1,
            },
            success: function (products) {
                // console.log(products);
                // return;
                // Handle the response from the server
                $("#import-new-details-wrapper").append(`
            <div class="col-12 mb-5" style="background-color: aliceblue;">
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="Province">Chọn sản phẩm</label>
                            <div>
                            <select class="form-select" name="product_id[]" id="import-select-product">
                                ${products.map(
                                    (product) => `
                                    <option value="${product.Id}">${product.Title}</option>
                                `
                                )}
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="import-input-amount">Số lượng</label>
                            <input type="text" class="form-control" id="import-input-amount" name="amount[]" placeholder="Số lượng">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="import-input-value">Giá</label>
                            <input type="text" class="form-control" id="import-input-value" name="value[]" placeholder="Giá">
                        </div>
                    </div>
                </div>
            </div>
        `);
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred while getting products. Please try again later.");
            },
        });
    });

    $(".import-list-invoice-detail-btn-change").on("click", function (e) {
        e.preventDefault();
        var webroot = window.location.origin;
        var btn = $(this);
        var value = btn
            .closest(".import-list-invoice-detail")
            .find(".import-list-invoice-detail-value")
            .val();
        var amount = btn
            .closest(".import-list-invoice-detail")
            .find(".import-list-invoice-detail-amount")
            .val();
        var productId = $(this).attr("data-product-id");
        var importInvoiceId = $(this).attr("data-import-invoice-id");

        $.ajax({
            url: webroot + "/fiama/Import/changeImportDetail", //controller: admin, action: GetAllProduct
            type: "POST",
            data: {
                value,
                amount,
                productId,
                importInvoiceId,
            },
            success: function (response) {
                if (response.msg == "pass") {
                    alert("ok");
                    window.location.reload();
                } else {
                    alert(response.msg);
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred while getting products. Please try again later.");
            },
        });
    });
});
