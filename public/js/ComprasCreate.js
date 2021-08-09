$(document).ready(function () {
    if (document.getElementById("date")) {
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;
        //var today = year + "-" + month + "-" + day;
        var today = day + "-" + month + "-" + year;
        $("#date").attr("value", today);
    }
});

$(".close").click(function (e) {
    $(".modal-backdrop").remove();
});

function delColorFocus(x) {
    x.style.background = "White";
}

function setColorFocus(x) {
    x.style.background = "Aqua";
}
function setColorFocus2(x, color1) {
    x.style.color = "white";
    x.style.background = color1;
}
function delColorFocus2(x, bcolor, color) {
    x.style.color = color;
    x.style.background = bcolor;
}

function ticketCarreraCaballoList(ticketId) {
    var url = "/dashboard/ticketdetalle";
    var p = {
        _token: _token,
        ticketId: ticketId,
    };

    document.getElementById("carrera_caballo_id").selectedIndex = "-1";
    $("#caballos_tab").click();

    $.post(url, p, function (result) {
        $("#tblCaballos").empty();

        let hipodromo_text = $("#programa_id option:selected").text();
        let carrera_text = $("#m_carrera").val();

        total = 0;
        for (let index = 0; index < result.length; index++) {
            const element = result[index];

            let mG = new Intl.NumberFormat("de-DE").format(element.ganador);

            $("#tblProductos").append(`
                            <tr id="tr-${element.id}">
                                <td>${hipodromo_text}</td>
                                <td style="text-align: center;">${carrera_text}</td>
                                <td style="text-align: center; font-weight: bold;">${
                                    element.numero
                                }</td>
                                <td style="font-weight: bold;">${
                                    element.nombre
                                }</td>
                                <td style="text-align: right;">${new Intl.NumberFormat(
                                    "de-DE"
                                ).format(element.ganador)}</td>
                                <td style="text-align: right;">${new Intl.NumberFormat(
                                    "de-DE"
                                ).format(element.place)}</td>
                                <td style="text-align: right;">${new Intl.NumberFormat(
                                    "de-DE"
                                ).format(element.show)}</td>
                                <td style="text-align: center;">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_caballo(${
                                        element.id
                                    })"> <i class="fas fa-trash-alt" style="color:white; text-align: center;"></i></button>
                                </td>
                            </tr>
     `);

            total +=
                parseInt(element.ganador) +
                parseInt(element.place) +
                parseInt(element.show);
        }

        $("#totalTicket").empty();
        if (total > 0) {
            const totalp = document.getElementById("totalTicket");
            const importe = document.createElement("span");
            importe.classList.add("ml-3", "font-weight-bold");
            importe.textContent =
                "Total: " +
                new Intl.NumberFormat("de-DE").format(total) +
                " Bs";
            totalp.append(importe);
            document.getElementById("btnImprimir").disabled = false;
        } else document.getElementById("btnImprimir").disabled = true;

        TabTickets();
        disableGPS(true);
        document.getElementById("btnAgregar").disabled = true;
    });
}

$("#productos").on("click", "button", function () {
    var producto = $(this).data();
    //var id = table.row($(this)).data();
    // alert(JSON.stringify(producto));
    console.log(producto);
});

function SeleccionarProducto(obj) {
    var rowID = $(obj).attr("id");
    // console.log("Entrando...");

    // $("#m_ganador").val("");
    // $("#m_place").val("");
    // $("#m_show").val("");
    // disableGPS(false);

    var productoId = rowID;
    // console.log(productoId);

    // $("#m_numero").val(datos.numero);
    // $("#m_caballo").val(datos-nombre);

    if (productoId) {
        var url = "/panel/articulos/productoget";
        var p = {
            _token: _token,
            productoId: productoId,
        };
        $.post(url, p, function (result) {
            // $("#tblProductos").empty();

            total = 0;
            for (let index = 0; index < result.length; index++) {
                const element = result[index];

                // let mG = new Intl.NumberFormat("de-DE").format(element.precio);

                $("#tblProductos").append(`
                                <tr id="tr-${element.id}">                                    
                                    <td style="text-align: center; font-weight: bold;">${element.categoria}</td>
                                    <td style="width: 200px; style="font-weight: bold;">${element.nombre}</td>  

                                    <td>                                    
                                    <input class="form-control form-control-sm"
                                                    style="width: 110px; font-weight: bold; text-align: right"
                                                    type="text" id="Cantidad" onfocusout="delColorFocus(this)"
                                                    onfocus="setColorFocus(this)">
                                    </td>
                                    
                                    <td>                                    
                                    <input class="form-control form-control-sm"
                                                    style="width: 110px; font-weight: bold; text-align: right"
                                                    type="text" id="p_compra" onfocusout="delColorFocus(this)"
                                                    onfocus="setColorFocus(this)">
                                    </td>   
                                    <td>                                                                    
                                    <input class="form-control form-control-sm"
                                                    style="width: 110px; font-weight: bold; text-align: right"
                                                    type="text" id="Sub_total" onfocusout="delColorFocus(this)"
                                                    onfocus="setColorFocus(this)">
                                    </td>

                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_producto(${element.id})"> <i class="fas fa-trash-alt" style="color:white; text-align: center;"></i></button>
                                    </td>
                                </tr>
         `);

                // total +=
                //     parseInt(element.ganador) +
                //     parseInt(element.place) +
                //     parseInt(element.show);
            }

            // $("#totalTicket").empty();
            // if (total > 0) {
            //     const totalp = document.getElementById("totalTicket");
            //     const importe = document.createElement("span");
            //     importe.classList.add("ml-3", "font-weight-bold");
            //     importe.textContent =
            //         "Total: " +
            //         new Intl.NumberFormat("de-DE").format(total) +
            //         " Bs";
            //     totalp.append(importe);
            //     document.getElementById("btnImprimir").disabled = false;
            // } else document.getElementById("btnImprimir").disabled = true;
        });
    }
}

function eliminar_producto(id) {
    Swal.fire({
        title: "¿Está seguro que desea eliminar este caballo?",
        text: "¡No podrás revertir esto!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "¡Sí, bórralo!",
        cancelButtonColor: "#d33",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.value) {
            // var url = "/dashboard/ticketCarreraCaballoDrop";
            var p = {
                _token: _token,
                id: id,
            };
            $.post(url, p, function (result) {
                // ticketCarreraCaballoList(ticketId);
            });

            Swal.fire("Eliminado!", "El caballo ha sido eliminado.", "success");
        }
    });
}