$(".minus-btn").on("click", function(e) {
    var input = $(this).siblings("input").val();
    input = parseInt(input);
    if (input > 1) {
        $(this)
            .siblings("input")
            .val((input -= 1));
        var cursor = $(this).parent().siblings(".total-price");

        price = parseInt(cursor.text());
        console.log(price);
        real = cursor.text(price);
    }
});

$(".plus-btn").on("click", function(e) {
    var input = $(this).siblings("input").val();
    input = parseInt(input);
    $(this)
        .siblings("input")
        .val((input += 1));
    var cursor = $(this).parent().siblings(".total-price");

    price = parseInt(cursor.text());
    console.log(price);
    real = cursor.text((price += price));
});
$(".delete-btn").on("click", function() {
    $(this).parent().parent().remove();
    console.log(22);
});