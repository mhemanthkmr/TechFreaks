var url = "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/r1/data";
$(document).ready(function () {
  var button;
  var box;
  $("#switch-light-1").click(function () {
    if (!$(this).is(":checked")) {
      button = 1;
      box = 1;
      console.log(button);
      console.log(box);
      var url = "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/r1/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 10 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: "application/json",
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    } else {
      var url = "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/r1/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 11 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: "application/json",
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    }
  });

  $("#switch-light-2").click(function () {
    if (!$(this).is(":checked")) {
      button = 2;
      console.log(button);
      box = 1;
      console.log(box);
      var url =
        "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay2/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 20 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: 'application/json',
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    } else {
      var url =
        "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay2/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 21 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: 'application/json',
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    }
  });

  $("#switch-light-3").click(function () {
    if (!$(this).is(":checked")) {
      button = 3;
      console.log(button);
      box = 1;
      console.log(box);
      var url =
        "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay3/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 30 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: 'application/json',
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    } else {
      var url =
        "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay3/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 31 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: 'application/json',
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    }
  });

  $("#switch-light-4").click(function () {
    if (!$(this).is(":checked")) {
      button = 4;
      console.log(button);
      box = 1;
      console.log(box);
      var url =
        "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay4/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 41 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: 'application/json',
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    } else {
      var url =
        "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay4/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 40 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: 'application/json',
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    }
  });

  $("#switch-light-5").click(function () {
    if (!$(this).is(":checked")) {
      button = 4;
      console.log(button);
      box = 1;
      console.log(box);
      var url =
        "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay5/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 51 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: 'application/json',
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    } else {
      var url =
        "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/relay5/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 50 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: 'application/json',
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    }
  });

  $(".click").click(function () {
    if (box == 1) {
      $.ajax({
        type: "POST",
        url: "firebasecode.php",
        data: {
          light_off: true,
        },
      });
    }
  });

  $("#checkbox1").click(function () {
    if ($(this).is(":checked")) {
      button = 1;
      box = 2;
      console.log(button);
      console.log(box);
      $(".show1").attr("src", "led1.jpg");
      $("#show1").addClass("text-success").removeClass("text-danger");
      $("#text1 span").text("LIGHT 1 ON");
    }
  });

  $("#checkbox2").click(function () {
    if ($(this).is(":checked")) {
      button = 2;
      console.log(button);
      box = 2;
      console.log(box);
      $(".show2").attr("src", "led1.jpg");
      $("#show2").addClass("text-success").removeClass("text-danger");
      $("#text2 span").text("LIGHT 2 ON");
    }
  });

  $("#checkbox3").click(function () {
    if ($(this).is(":checked")) {
      button = 3;
      console.log(button);
      box = 2;
      console.log(box);
      $(".show3").attr("src", "led1.jpg");
      $("#show3").addClass("text-success").removeClass("text-danger");
      $("#text3 span").text("LIGHT 3 ON");
    }
  });

  $("#checkbox4").click(function () {
    if ($(this).is(":checked")) {
      button = 4;
      console.log(button);
      box = 2;
      console.log(box);
      $(".show4").attr("src", "led1.jpg");
      $("#show4").addClass("text-success").removeClass("text-danger");
      $("#text4 span").text("LIGHT 4 ON");
    }
  });

  $(".click").click(function () {
    if (box == 2) {
      var url = "https://io.adafruit.com/api/v2/mhemanthkmr143/feeds/r1/data";
      $.ajax({
        url: url,
        type: "post",
        data: { value: 0 },
        headers: { "X-AIO-Key": "aio_NDVr79btXbvAJEp3JS9xACWWcgGn" },
        // contentType: 'application/json',
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
      });
    }
  });
});
