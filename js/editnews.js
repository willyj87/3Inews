/**
 * Created by root on 18/01/17.
 */


function adresse() {
    $test = document.getElementById("chemin1").value;
    document.getElementById("image").value = $test.replace("C:\\fakepath\\", "");
    $test2 = document.getElementById("image").value;
}
$(".modal-wide").on("show.bs.modal", function () {
    var height = $(window).height() - 200;
    $(this).find(".modal-body").css("max-height", height);
});
$('#colorselector').colorselector({
    callback: function (value, color, title) {
        $("#colorValue").val(value);
        $("#colorColor").val(color);
        $("#colorTitle").val(title);

    }
});

$('#colorselector2').colorselector({
    callback: function (value, color, title) {
        $("#colorValue").val(value);
        $("#colorTitle").val(title);
        $("#colorColor2").val(color);
    }
});