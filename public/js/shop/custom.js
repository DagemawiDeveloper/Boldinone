$(document).ready(function () {
    $("#add_to_wishlist").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var product_id = $(this)
            .closest(".product__box")
            .find(".product_id")
            .val();
        alert(product_id);
        // $.ajax({
        //     method: "POST",
        //     url: "/customers/wishList",
        //     data: {
        //         product_id: product_id,
        //     },
        //     success: function (response) {
        //         alertify.set("notifier", "position", "top-right");
        //         alertify.success(response.message);
        //     },
        // });
    });
});
