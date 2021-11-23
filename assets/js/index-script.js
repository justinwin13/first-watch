// button listener to change to register cards
$(".card-btn").click(() => {
    $(".login-container").hide();
    $(".register-container").show();
    $(".card").hide();
    $(".card-2").show();
});

// button listener to change to login cards
$(".card-btn-2").click(() => {
    $(".register-container").hide();
    $(".login-container").show();
    $(".card-2").hide();
    $(".card").show();
});