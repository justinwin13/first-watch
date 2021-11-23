// click functions for each item
$(".item01").click(()=> {
    $(location).attr('href','/item01.php');
});

$(".item02").click(()=> {
    $(location).attr('href','/item02.php');
});

$(".item03").click(()=> {
    $(location).attr('href','/item03.php');
});

$(".item04").click(()=> {
    $(location).attr('href','/item04.php');
});

$(".item05").click(()=> {
    $(location).attr('href','/item05.php');
});

$(".item06").click(()=> {
    $(location).attr('href','/item06.php');
});

$(".item07").click(()=> {
    $(location).attr('href','/item07.php');
});

$(".item08").click(()=> {
    $(location).attr('href','/item08.php');
});

// ajax function for search bar
$("#search-bar").keydown(function() {
    $(".ajax-list").html("<li>loading...</li>");
});
$("#search-bar").keyup(function() {
    var txt = $(this).val();
    if (txt != '') {
        $.ajax({
            url: "/assets/php/ajax_response.php",
            context: document.body,
            method: "POST",
            data: {search:txt},
            dataType: "text"
        }).done(function(data) {
            $(".ajax-list").html(data);
        });
    }
    else {
        $(".ajax-list").html("<li>No results.</li>");
    }
    
});
    
    
