$(document).ready(function () {
  var entrar=0;
  opcion = 0;
  $.ajax({
      url:"../../procesos/cajas/consCaja.php",
      type:"POST",
      datatype:"JSON",
      data: {
        opcion: opcion,
      },
      success: function (data) {
      result = JSON.parse(data);
        if (result.length != 0) {
            entrar = result[0].cjcierre;
          if (entrar == 0) {
            $(".container").css('display', 'block');
          }
          else if (entrar == 1){
            $(".container").css('display', 'none');
            $(".mensajeCajaCerrada").css('display', 'flex');
          }
        }
        else {
            $(".container").css('display', 'none');
            $(".mensajeCajaCerrada").css('display', 'flex');
          }
        
    }
  })

  tablaMesasEnProceso();
  tablaMesasOcuapada()
  tablaMesasFinalizada()
  function tablaMesasEnProceso() {
    $('#tablaMesasEnProceso').DataTable().destroy();
    opcion = 2;
    tablaProductos = $("#tablaMesasEnProceso").DataTable({
      lengthMenu: [[5], [5]],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Pedidos",
        "infoEmpty": "Mostrando 0 to 0 of 0 Pedidos",
        "infoFiltered": "(Filtrado de _MAX_ total Pedidos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Pedidos",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
      },
      ajax: {
        url: "../../procesos/mesas/consMesas.php",
        method: "POST", //usamos el metodo POST
        data: { 
          opcion: opcion,
        }, //enviamos opcion 3
        dataSrc: "",
      },
      columns: [
        { data: "mesaid" },
        { data: "empnom" },
        { data: "empnom" },
        { data: "empnom" },
        { data: "empnom" },
        { data: "empnom" },
        { data: "empnom" },
        { data: "empnom" },
      ],
    });

  }

  
  function tablaMesasOcuapada() {
    $('#tablaMesasOcupada').DataTable().destroy();
    opcion = 9;
    tablaProductos = $("#tablaMesasOcupada").DataTable({
      lengthMenu: [[5], [5]],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Pedidos",
        "infoEmpty": "Mostrando 0 to 0 of 0 Pedidos",
        "infoFiltered": "(Filtrado de _MAX_ total Pedidos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Pedidos",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
      },
      ajax: {
        url: "../../procesos/mesas/consMesas.php",
        method: "POST", //usamos el metodo POST
        data: { 
          opcion: opcion,
        }, //enviamos opcion 3
        dataSrc: "",
      },
      columns: [
        { data: "mesaid" },
        { data: "fvid" },
        { data: "empnom" },
        { data: "mesadescripcion" },
        { data: "created_at" },
        { data: "Minutos" },
        { data: "updated_at" },
        { defaultContent:
          "<div class='text-center'><button class='btn btn-secondary btn-sm btnEditarPedido' title='Editar Mesa'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnEliminarMesa' title='Elimnar Mesa'><i class='material-icons'>delete_outline</i></button></div>",
      }
      ],
    });

  }

  function tablaMesasFinalizada() {
    $('#tablaMesasFinalizada').DataTable().destroy();
    opcion = 7;
    tablaProductos = $("#tablaMesasFinalizada").DataTable({
      lengthMenu: [[5], [5]],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Pedidos",
        "infoEmpty": "Mostrando 0 to 0 of 0 Pedidos",
        "infoFiltered": "(Filtrado de _MAX_ total Pedidos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Pedidos",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
      },
      ajax: {
        url: "../../procesos/mesas/consMesas.php",
        method: "POST", //usamos el metodo POST
        data: { 
          opcion: opcion,
        }, //enviamos opcion 3
        dataSrc: "",
      },
      columns: [
        { data: "mesaid" },
        { data: "fvid" },
        { data: "empnom" },
        { data: "mesadescripcion" },
        { data: "created_at" },
        { data: "Minutos" },
        { data: "updated_at" },
        { defaultContent:
          "<div class='text-center'><button class='btn btn-info btn-sm btnLiberarMesa' title='Liberar Mesa'><i class='material-icons'>done</i></button></div>",
      }
      ],
    });

  }

  $(document).on("click", "#addPedidoMesa", function () {
    mesaid = $("#idMesa").val();
    mozo = $("#idMozo").val();
    fvid = $("#mesaFactura").val();

    opcion = 0;
    $.ajax({
        url:"../../procesos/mesas/consMesas.php",
        type:"POST",
        datatype:"JSON",
        data: {
          opcion: opcion,
          fvid: fvid,
        },
        success: function (data) {
          result = JSON.parse(data)
          tipo = result[0].tipo
          if (tipo == 0) {
            opcion = 1;
            $.ajax({
                url:"../../procesos/mesas/consMesas.php",
                type:"POST",
                datatype:"JSON",
                data: {
                  opcion: opcion,
                  fvid: fvid,
                  mesaid: mesaid,
                  mozoid: mozo,
                },
                success: function (data) {
                  tablaMesasEnProceso();
                  tablaMesasFinalizada();
                },
            })
          }
          else if (tipo == 1) {
            alert('Ya se asigno esta venta a una mesa')
          }
          else {
            alert('Ya se asigno esta venta a un delivery')
          }
        },
    })

    $("#idMesa").val('');
    $("#idMozo").val('');
    $("#mesaFactura").val('');
  });

  $(document).on("click", ".btnEditarPedido", function () {
    opcion = 3
    fila = $(this).closest("tr");
    fvid = fila.find("td:eq(1)").text();
    $.ajax({
        url:"../../procesos/mesas/consMesas.php",
        type:"POST",
        datatype:"JSON",
        data: {
          opcion: opcion,
          fvid: fvid,
        },
        success: function (data) {
          result = JSON.parse(data)
          numeroestadoactual = result[0].mesaestado
          estadoactual = result[0].mesadescripcion
          factura = result[0].fvid
          $("#numeroDePedido").html(factura);
          $("#numeroDeFactura").val(factura);
          $("#mesaEstadoActual").val(estadoactual);
          $("#mesaModal").css('display', 'flex');
        }
    })
  });

  $(document).on("click", "#TerminarDeEditarPedido", function () {
    factura = $("#numeroDeFactura").val();
    estadoactual = $("#mesaEstadoActual").val();
    estadonuevo = $("#mesaEstadoNuevo").val();
    if (estadonuevo != 3){
    opcion = 4
      $.ajax({
        url:"../../procesos/mesas/consMesas.php",
        type:"POST",
        datatype:"JSON",
        data: {
          opcion: opcion,
          fvid: factura,
          estado: estadonuevo,
        },
        success: function (data) {
          $("#mesaModal").css('display', 'none');
          $("#mesaEstadoNuevo").val('');
          tablaMesasEnProceso();
          tablaMesasFinalizada();
          tablaMesasOcuapada();
        }
      })
    }
    else {
      opcion = 6
      $.ajax({
        url:"../../procesos/mesas/consMesas.php",
        type:"POST",
        datatype:"JSON",
        data: {
          opcion: opcion,
          fvid: factura,
          estado: estadonuevo,
        },
        success: function (data) {
          $("#mesaModal").css('display', 'none');
          $("#mesaEstadoNuevo").val('');
          tablaMesasEnProceso();
          tablaMesasFinalizada();
          tablaMesasOcuapada();
        }
      })
    } 
  })

  $(document).on("click", "#cerrarMesa", function () {
    $("#mesaModal").css('display', 'none');
    $("#mesaEstadoNuevo").val('');
  })

  $(document).on("click", ".btnEliminarPedido", function () {
      opcion = 5
      fila = $(this).closest("tr");
      fvid = fila.find("td:eq(1)").text();
      $.ajax({
        url:"../../procesos/mesas/consMesas.php",
        type:"POST",
        datatype:"JSON",
        data: {
          opcion: opcion,
          fvid: fvid,
        },
        success: function (data) {
          tablaMesasEnProceso();
          tablaMesasFinalizada();
          tablaMesasOcuapada();
      }
    })
  })

  $(document).on("click", ".btnLiberarMesa", function () {
    opcion = 8
    fila = $(this).closest("tr");
    fvid = fila.find("td:eq(1)").text();
    $.ajax({
      url:"../../procesos/mesas/consMesas.php",
      type:"POST",
      datatype:"JSON",
      data: {
        opcion: opcion,
        fvid: fvid,
      },
      success: function (data) {
        tablaMesasEnProceso();
        tablaMesasFinalizada();
        tablaMesasOcuapada();
    }
  })
})

})
