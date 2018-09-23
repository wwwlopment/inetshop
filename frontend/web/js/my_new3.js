$(document).ready(function() {

    var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
    };

    $().UItoTop({ easingType: 'easeOutQuart' });

    $('#example').countdown({
        date: '12/24/2020 15:59:59',
        offset: -8,
        day: 'Day',
        days: 'Days'
    }, function () {
        alert('Done!');
    });
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "pagination",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
});
