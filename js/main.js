$(window).scroll(function () {
    let position = $(this).scrollTop();
    if (position > 57) {
        $(".header2").addClass("fixed-nav")
        $(".scroll-to-top-btn").show()
    } else {
        $(".header2").removeClass("fixed-nav");
        $(".scroll-to-top-btn").hide()
    }
})

// tooltip
$(function () {
    $('[rel="tooltip"]').tooltip(); 
})

$(function () {
  $('[data-toggle="popover"]').popover()
})



