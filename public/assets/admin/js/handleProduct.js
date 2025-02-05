$(document).ready(function () {
    $("#productStorageDateSelect").on("change", function () {
        var webroot = window.location.origin;
        var date = $(this).val();
        var product_id = $(this).attr("data-product-id");

        $.ajax({
            url: webroot + "/fiama/admin/AmountOfAProductAtADate",
            type: "POST",
            data: {
                date,
                product_id,
                // customerId,
            },
            success: function (response) {
                if (response == "fail") {
                    alert("An error occurred! Please try again later!");
                    $("#edit-product-storage").val(0);
                } else {
                    $("#edit-product-storage").val(response);
                }
            },
            error: function (xhr) {
                // Handle any errors that occur during the AJAX request
                alert("An error occurred! Please try again later!");
            },
        });
    });

    $(".btnDisableCustomer").on("click", function () {
        var webroot = window.location.origin;
        var customer_id = $(this).attr("data-customer-id");
        // var customerId = $(this).data("customer-id");

        $.ajax({
            url: webroot + "/fiama/User/disableCustomer",
            type: "POST",
            data: {
                customer_id,
            },
            success: function (response) {
                console.log(response);
                if (response == "pass") {
                    alert("Success");
                    window.location.href =
                        webroot + "/fiama/admin/customer?action=profile&id=" + customer_id;
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

    $(".btnEnableCustomer").on("click", function () {
        var webroot = window.location.origin;
        var customer_id = $(this).attr("data-customer-id");
        // var customerId = $(this).data("customer-id");

        $.ajax({
            url: webroot + "/fiama/User/enableCustomer",
            type: "POST",
            data: {
                customer_id,
            },
            success: function (response) {
                console.log(response);
                if (response == "pass") {
                    alert("Success");
                    window.location.href =
                        webroot + "/fiama/admin/customer?action=profile&id=" + customer_id;
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

    $(".btnDisableEmployee").on("click", function () {
        var webroot = window.location.origin;
        var employee_id = $(this).attr("data-employee-id");
        // var customerId = $(this).data("customer-id");

        $.ajax({
            url: webroot + "/fiama/User/disableEmployee",
            type: "POST",
            data: {
                employee_id,
            },
            success: function (response) {
                console.log(response);
                if (response == "pass") {
                    alert("Success");
                    window.location.href =
                        webroot + "/fiama/admin/employee?action=profile&id=" + employee_id;
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

    $(".btnEnableEmployee").on("click", function () {
        var webroot = window.location.origin;
        var employee_id = $(this).attr("data-employee-id");
        // var customerId = $(this).data("customer-id");

        $.ajax({
            url: webroot + "/fiama/User/enableEmployee",
            type: "POST",
            data: {
                employee_id,
            },
            success: function (response) {
                console.log(response);
                if (response == "pass") {
                    alert("Success");
                    window.location.href =
                        webroot + "/fiama/admin/employee?action=profile&id=" + employee_id;
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
});
