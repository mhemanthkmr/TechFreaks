$(document).ready(function () {
    var button;
    var box;
    $('#switch-light-1').click(function () {
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
                    'light': 1
                }
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_on': true,
                    'light': 1
                }
            });
        }
    });


    $('#switch-light-2').click(function () {
        if (!$(this).is(':checked')) {

            button = 2;
            console.log(button);
            box = 1;
            console.log(box);
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_off': true,
                    'light': 2
                }
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_on': true,
                    'light': 2
                }
            });
        }
    });


    $('#switch-light-3').click(function () {
        if (!$(this).is(':checked')) {

            button = 3;
            console.log(button);
            box = 1;
            console.log(box);
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_off': true,
                    'light': 3
                }
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_on': true,
                    'light': 3
                }
            });
        }
    });


    $("#switch-light-4").click(function () {
        if (!$(this).is(':checked')) {

            button = 4;
            console.log(button);
            box = 1;
            console.log(box);
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_off': true,
                    'light': 4
                }
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_on': true,
                    'light': 4
                }
            });
        }
    });

    $("#switch-light-5").click(function () {
        if (!$(this).is(':checked')) {

            button = 4;
            console.log(button);
            box = 1;
            console.log(box);
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_off': true,
                    'light': 5
                }
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_on': true,
                    'light': 5
                }
            });
        }
    });

    $(".click").click(function () {
        if (box == 1) {
            $.ajax({
                type: "POST",
                url: "firebasecode.php",
                data: {
                    'light_off': true,
                }
            });

        }
    });



    $('#checkbox1').click(function () {
        if ($(this).is(':checked')) {

            button = 1;
            box = 2;
            console.log(button);
            console.log(box);
            $(".show1").attr('src', 'led1.jpg');
            $("#show1").addClass("text-success").removeClass("text-danger");
            $('#text1 span').text('LIGHT 1 ON');
        }
    });


    $('#checkbox2').click(function () {
        if ($(this).is(':checked')) {

            button = 2;
            console.log(button);
            box = 2;
            console.log(box);
            $(".show2").attr('src', 'led1.jpg');
            $("#show2").addClass("text-success").removeClass("text-danger");
            $('#text2 span').text('LIGHT 2 ON');

        }
    });


    $('#checkbox3').click(function () {
        if ($(this).is(':checked')) {

            button = 3;
            console.log(button);
            box = 2;
            console.log(box);
            $(".show3").attr('src', 'led1.jpg');
            $("#show3").addClass("text-success").removeClass("text-danger");
            $('#text3 span').text('LIGHT 3 ON');

        }
    });


    $("#checkbox4").click(function () {
        if ($(this).is(':checked')) {

            button = 4;
            console.log(button);
            box = 2;
            console.log(box);
            $(".show4").attr('src', 'led1.jpg');
            $("#show4").addClass("text-success").removeClass("text-danger");
            $('#text4 span').text('LIGHT 4 ON');

        }
    });




    $(".click").click(function () {
        if (box == 2) {
            var url = 'https://io.adafruit.com/api/v2/muthu0297/feeds/remote/data';
            $.ajax({
                url: url,
                type: 'post',
                data: { value: button + "ON" },
                headers: { "X-AIO-Key": "df06c93a6dea42deaebf0721de53a5bb" },
                // contentType: 'application/json',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                }
            });

        }
    });

});  