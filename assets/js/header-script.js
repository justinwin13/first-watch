// redirects to home page after clicking the logo
$(".header-logo").click(()=> {
    $(location).attr('href','/home.php');
});

// redirects to cart page whent he shopping cart is clicked
$(".fa-shopping-bag").click(()=> {
    $(location).attr('href','/cart.php');
});

