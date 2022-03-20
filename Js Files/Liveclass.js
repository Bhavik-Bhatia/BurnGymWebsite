var today = new Date();
var dd = String(today.getDate() + 2).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;

document.getElementById("date").min = today;

$('.contact').click(function() {
    $("#reg_details").modal({
        fadeDuration: 200,
        showClose: false
    });
});

var tl2 = gsap.timeline({
    defaults: {
        duration: 1,
        delay: 0
    }
});

tl2.to("section#Liveclass .container1 .image #img_live_video", {
    y: 'random(-10,10,-4)',
    repeat: -1,
    yoyo: true,
    repeatRefresh: true
})