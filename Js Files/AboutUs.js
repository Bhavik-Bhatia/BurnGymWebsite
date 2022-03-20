$('.contact').click(function() {
    $("#contact_details").modal({
        fadeDuration: 200,
        showClose: false

    });
});

// ---------------------------------------------------------------------------------------------------------
// Green Sock

var tl2 = gsap.timeline({
    defaults: {
        duration: 1,
        delay: 0
    }
});

tl2.to("section#About_Us .container1 .image #img_yoga", {
    x: 'random(-10,10,6)',
    repeat: -1,
    yoyo: true,
    repeatRefresh: true
})
tl2.to("section#About_Us .container1 .content1 h1", {
    x: 'random(-10,10,6)',
    repeat: -1,
    yoyo: true,
    repeatRefresh: true
})
tl2.to("section#About_Us .container4 h2", {
    x: 'random(-10,10,6)',
    repeat: -1,
    yoyo: true,
    repeatRefresh: true
})

// ---------------------------------------------------------------------------------------------------------

VanillaTilt.init(document.querySelectorAll("section#About_Us .container2 p"), {
    max: 15,
    speed: 100,
    glare: true,
    "max-glare": 1,
    reverse: true
});

VanillaTilt.init(document.querySelectorAll("section#About_Us .container2 p"));

VanillaTilt.init(document.querySelectorAll("section#About_Us .container4 p"), {
    max: 15,
    speed: 100,
    glare: true,
    "max-glare": 1,
    reverse: true
});

VanillaTilt.init(document.querySelectorAll("section#About_Us .container4 p"));