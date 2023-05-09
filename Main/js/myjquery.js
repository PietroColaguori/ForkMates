$(".c1").click(function () {
    $(this).css("color", "blue");
});

$(".c1").dblclick(function () {
    $(this).hide();
});

$("span.c2").click(function () {
    $(".c1").hide();
});

$(".lol2").click(function () {
    $(this).css({top: 200, left: 200, position:'absolute'})
})