$(document).ready(function () {
    var button;
    var box;
    $('#fan-kitchen').click(function () {
        if (!$(this).is(':checked')) {

            button = 1;
            box = 1;
            console.log(button);
            console.log(box);
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_off': true,
                    'light': 6
                }
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_on': true,
                    'light': 6
                }
            });
        }
    });
});  