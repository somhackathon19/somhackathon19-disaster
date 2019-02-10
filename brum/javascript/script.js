/* PUBLICIDAD */
$(function () {
    var crono = setInterval(function () {
        $.ajax({
            url: "http://localhost/brum/bannerModule.php",
            method: "POST",
            succes: function (data) {
                $("aside#banner").empty();
                $("aside#banner").prepend(data);
            }
        });

    }, 100); //repetim cada xms

    $("aside#banner img").click(function() {
        $.ajax({
            url: "http://localhost/brum/bannerModule.php",
            method: "POST",
            data: {
                id: $("aside#banner img").attr("id").substring(3)
            },

            succes: function () {
                location.href = $("aside#banner img").attr("lurl");;
            }
        });
    });
});

