// when the logout button is clicked, it will redirect to logout.php which will destroy the curret session and send user to index.php
$(".logout-btn").click(()=> {
    $(location).attr('href','/assets/php/logout.php');
});