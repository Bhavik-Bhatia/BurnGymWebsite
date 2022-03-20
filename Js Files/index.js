$(document).ready(function() {
    $(".menu_btn").click(function() {
        $(".menu_btn").toggleClass("change");
        $(".blackbgcontainer").toggleClass("blackbg");
        $(".nav_items_mobile").toggleClass("active");
        $("html").toggleClass("active");
    });
});

function video_slide(video_name, nav_btn) {

    document.getElementById("video_bg").src = video_name;
    $(".nav-btn").removeClass("active");
    $(nav_btn).addClass("active");
    let video = String(video_name);
    if (video.includes("Videos/video.mp4")) {
        $("section #content1").css("display", "none");
        $("section #content2").css("display", "none");
        $("section #content3").css("display", "block");

    } else if (video.includes("Videos/video2.mp4")) {
        $("section #content1").css("display", "block");
        $("section #content2").css("display", "none");
        $("section #content3").css("display", "none");

    } else {
        $("section #content1").css("display", "none");
        $("section #content2").css("display", "block");
        $("section #content3").css("display", "none");

    }

}

function video_sliding() {
    $(".nav-btn").removeClass("active");
    let video = String(video_bg.src);
    if (video.includes("Videos/video.mp4")) {
        video_bg.src = "Videos/video2.mp4";
        $("#nav-btn3").addClass("active");
        $("section #content1").css("display", "block");
        $("section #content2").css("display", "none");
        $("section #content3").css("display", "none");

    } else if (video.includes("Videos/video2.mp4")) {
        video_bg.src = "Videos/video3.mp4";
        $("#nav-btn1").addClass("active");
        $("section #content1").css("display", "none");
        $("section #content2").css("display", "block");
        $("section #content3").css("display", "none");

    } else {
        video_bg.src = "Videos/video.mp4";
        $("#nav-btn2").addClass("active");
        $("section #content1").css("display", "none");
        $("section #content2").css("display", "none");
        $("section #content3").css("display", "block");

    }
}

video_bg.addEventListener('ended', function() {
    video_sliding();
}, false);