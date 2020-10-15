

var table,filasTable,tablep,filasTablep
table = $("#pedidos").DataTable();
tablep = $("#pedidosP").DataTable();

addEventListener('DOMContentLoaded',()=>{
    cargarTablaPedidos()
})
addEventListener('DOMContentLoaded',()=>{
    cargarTablaPedidosPersonalizados()
})

const cargarTablaPedidos = async()=>{
    let response = await fetch('/AppOffers/Pedido/getAllPedidos')
    let estado
    response = await response.json()
    if(response.status==203 || response.status==304){
        pedidos = response.response.data
        table.clear().draw()
        filasTable = table.rows().count();
        for (const data of pedidos) { 
            if(data.estado=='1' ){
                estado="Pendiente"
            }else if(data.estado=='2'){
                estado="Leido"
            }
            table.row.add([
                filasTable+1,
                data.numero,
                data.nombre,
                estado,
                `<button type="button" class="btn btn-outline-primary verDetalle" data-toggle="modal" data-target="#verDetalle"><i class="fas fa-eye" style="pointer-events:none;"></i></button>
                <button type="button" class="btn btn-outline-success aceptarPedido"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
                <button type="button" class="btn btn-outline-danger rechazarPedido"><i class="fas fa-times" style="pointer-events:none;"></i></button>`

            ]).draw(false);
            table.context[0].aoData[filasTable].anCells[4].setAttribute('data-id', data.id);
            filasTable++;
        } 
    }
}

const cargarTablaPedidosPersonalizados = async()=>{
    let response = await fetch('/AppOffers/Pedido/getAllPedidosPersonalizados')
    let estado
    response = await response.json()
    if(response.status==203 || response.status==304){
        pedidos = response.response.data
        tablep.clear().draw()
        filasTablep = tablep.rows().count();
        for (const data of pedidos) { 
            if(data.estado=='1' ){
                estado="Pendiente"
            }else if(data.estado=='2'){
                estado="Leido"
            }
            tablep.row.add([
                filasTablep+1,
                data.numero,
                data.nombre,
                estado,
                `<button type="button" class="btn btn-outline-primary verDetalleP" data-toggle="modal" data-target="#verDetalleP"><i class="fas fa-eye" style="pointer-events:none;"></i></button>
                <button type="button" class="btn btn-outline-success aceptarPedidoP"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
                <button type="button" class="btn btn-outline-danger rechazarPedidoP"><i class="fas fa-times" style="pointer-events:none;"></i></button>`

            ]).draw(false);
            tablep.context[0].aoData[filasTablep].anCells[4].setAttribute('data-id', data.id);
            filasTablep++;
        } 
    }
}
$(document).on('click','.aceptarPedido', async function () {
    const element = $(this)[0].parentElement;
    const idSolicitud = $(element).attr('data-id');
    let response = await fetch(`/AppOffers/Pedido/aceptar/${idSolicitud}`)
    response = await response.json()
    if(response.status==201){
        cargarTablaPedidos()
    }
})

$(document).on('click','.aceptarPedidoP', async function () {
    const element = $(this)[0].parentElement;
    const idSolicitud = $(element).attr('data-id');
    let response = await fetch(`/AppOffers/Pedido/aceptarPersonalizado/${idSolicitud}`)
    response = await response.json()
        if(response.status==201){
            cargarTablaPedidosPersonalizados()
        }
})

$(document).on('click','.rechazarPedido', async function () {
    const element = $(this)[0].parentElement;
    const idSolicitud = $(element).attr('data-id');
    let response = await fetch(`/AppOffers/Pedido/rechazar/${idSolicitud}`)
    response = await response.json()
    if(response.status==201){
        cargarTablaPedidos()
    }
})

$(document).on('click','.rechazarPedidoP', async function () {
    const element = $(this)[0].parentElement;
    const idSolicitud = $(element).attr('data-id');
    let response = await fetch(`/AppOffers/Pedido/rechazarPersonalizado/${idSolicitud}`)
    response = await response.json()
        if(response.status==201){
            cargarTablaPedidosPersonalizados()
        }
})

$(document).on('click','.verDetalle', async function () {
    const element = $(this)[0].parentElement;
    const idSolicitud = $(element).attr('data-id');
    let response = await fetch(`/AppOffers/Pedido/detallePedido/${idSolicitud}`)
    response = await response.json()
    if(response.status==203){
        const sectionDetalle= document.getElementById('cuerpo')
        let html = ''
        const detalle=response.response.data
            html+=`
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"></h3>
              <div class="col-10">
                <img src="/AppOffers/public/img/Products/${detalle.imagen}" class="img-fluid logo-producto" alt="producto">
              </div>
            </div>
            <div class="col-12 col-sm-5">
              <h3 class="my-3">${detalle.nombre}</h3>
              <p><strong>Especificaciones</strong></p>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Precio: 
                </h2>
                <h2 class="mb-0">
                  Precio: 
                </h2>
              </div>
            </div>
            `
            sectionDetalle.innerHTML = html
    }
    else{
        Swal.fire(
            'Error',
            response.response.message,
            'error'
          )
    }
})