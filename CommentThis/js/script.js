 $('header a').each(function () {
        if (this.href == location.href) $(this).addClass('active');
    });

  

$('#b-create').click(function () {
    $('#content').load('../require/create.php');
    //$('.autoriz').load('/require/create.php');
});

$('.t-block a').click(function () {
    $('#content').load('../require/opennews.php'); 
});

$('#b-search').click(function () {
    $('#last-news').hide(600);
    $('#top-news').hide(600);
    $('#events').hide(600);
    $('#search').toggle(600);

});


$('#b-events').click(function () {
    $('#search').hide(600);
    $('#last-news').hide(600);
    $('#top-news').hide(600);
    $('#events').toggle(600);

});

$('#b-top-news').click(function () {

    $('#search').hide(600);
    $('#last-news').hide(600);
    $('#events').hide(600);
    $('#top-news').toggle(600);

});

$('#b-last-news').click(function () {
    $('#search').hide(600);
    $('#top-news').hide(600);
    $('#events').hide(600);
    $('#last-news').toggle(600);
    $('#content').load('../require/news.php');
});
