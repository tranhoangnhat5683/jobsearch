jQuery(document).ready(function() {
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
});

$(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        $(".btn.btn-success").click();
    }
});