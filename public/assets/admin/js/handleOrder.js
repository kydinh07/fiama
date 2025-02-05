$(document).ready(function () {
    $(".btnVerifyOrder").on("click", function () {
        var webroot = window.location.origin;
        var orderId = $(this).attr("data-order-id");
        // var customerId = $(this).data("customer-id");

        $.ajax({
            url: webroot + "/fiama/Order/handleOrderStatus",
            type: "POST",
            data: {
                orderId,
                status: "verified",
                // customerId,
            },
            success: function (response) {
                if (response == "pass") {
                    alert("Success");
                    window.location.reload();
                } else {
                    alert("An error occurred! Please try again later!");
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred! Please try again later!");
            },
        });
    });

    $(".btnDeliverOrder").on("click", function () {
        var webroot = window.location.origin;
        var orderId = $(this).attr("data-order-id");
        // var customerId = $(this).data("customer-id");

        $.ajax({
            url: webroot + "/fiama/Order/handleOrderStatus",
            type: "POST",
            data: {
                orderId,
                status: "delivering",
                // customerId,
            },
            success: function (response) {
                if (response == "pass") {
                    alert("Success");
                    window.location.reload();
                } else {
                    alert("An error occurred! Please try again later!");
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred! Please try again later!");
            },
        });
    });

    $(".btnVerifyDoneOrder").on("click", function () {
        var webroot = window.location.origin;
        var orderId = $(this).attr("data-order-id");
        // var customerId = $(this).data("customer-id");

        $.ajax({
            url: webroot + "/fiama/Order/handleOrderStatus",
            type: "POST",
            data: {
                orderId,
                status: "done",
                // customerId,
            },
            success: function (response) {
                if (response == "pass") {
                    alert("Success");
                    window.location.reload();
                } else {
                    alert("An error occurred! Please try again later!");
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred! Please try again later!");
            },
        });
    });

    $(".btnVerifyPaymentOrder").on("click", function () {
        var webroot = window.location.origin;
        var orderId = $(this).attr("data-order-id");
        // var customerId = $(this).data("customer-id");

        $.ajax({
            url: webroot + "/fiama/Order/handlePaidOrder",
            type: "POST",
            data: {
                orderId,
                paid: 1,
                // customerId,
            },
            success: function (response) {
                console.log(response);
                if (response == "pass") {
                    alert("Success");
                    window.location.reload();
                } else {
                    alert("An error occurred! Please try again later!");
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred! Please try again later!");
            },
        });
    });

    $(".btnCancelOrder").on("click", function () {
        var webroot = window.location.origin;
        var orderId = $(this).attr("data-order-id");
        // var customerId = $(this).data("customer-id");

        $.ajax({
            url: webroot + "/fiama/Order/handleOrderStatus",
            type: "POST",
            data: {
                orderId,
                status: "canceled",
                // customerId,
            },
            success: function (response) {
                if (response == "pass") {
                    alert("Success");
                    window.location.reload();
                } else {
                    alert("An error occurred! Please try again later!");
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred! Please try again later!");
            },
        });
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
});
