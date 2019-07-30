addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); }
//new WOW().init();
wow = new WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    offset: 0
});
wow.init();