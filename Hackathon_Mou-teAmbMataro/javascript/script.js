/* PUBLICIDAD */
$(function () {
    var crono = setInterval(function () {
        $.ajax(
            url: "192.168.1.103",
            method: "POST",
            succes: function (data) {
                $("aside#banner").empty();
                $("aside#banner").prepend(data);
            }
        )

    }, 10000); //repetim cada xms

    $("aside#banner img").click() {
        $.ajax(
            url: "192.168.1.103",
            method: "POST",
            data: {
                id: $("aside#banner img").attr("id").substring(3)
            },

            succes: function (data) {
                var image = $("aside#banner img").attr("lurl");
                location.href = image;
            }
        }
    )
}

// cuando haga un click en el banner que antes de abrir la pestaña que actualice el contador de clicks
// que cada x tiempo se haga una peticion para cambiar el banner, osea actualizar el banner eliminar el antiguo y poner el nuevo.
// que lo haga con substring para saltar los 3 primeros caracteres
// id de la imagen quitar los 3 primeros caracteres cuando me envien la peticion
// cuando haga click que vaya a la url que php me manda

});

/* CATEGORIA */
$(function () {
    $("option").change(function () {
        alert("prueba");
    });
});


/* ACTIVIDADES */
$(function () {
    var crono = setInterval(function () {

    }, 10000); //repetim cada xms

});

/* CONFIGURACION */
