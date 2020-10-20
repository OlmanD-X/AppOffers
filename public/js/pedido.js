
addEventListener('DOMContentLoaded',()=>{
    cargarTablaPedidos()
})
addEventListener('DOMContentLoaded',()=>{
    cargarTablaPedidosPersonalizados()
})

const cargarTablaPedidos = async()=>{
    let response = await fetch('/AppOffers/Pedido/getAllPedidos')
    let estado
    let nro=0
    response = await response.json()
    if(response.status==203){
        const sectionCompanies= document.getElementById('rpta')
        let html = ''
        for (const pedido of response.response.data) {
            nro++
            if(pedido.estado=='1' ){
                estado="Pendiente"
            }else if(pedido.estado=='2'){
                estado="Leido"
            }
            html+=
            `<tr id="${pedido.id}">
                <td>${nro}</td>
                <td>${pedido.numero}</td>
                <td>${pedido.nombre}</td>  
                <td>${estado}</td>                    
                <td class="a-right a-right" width="100px">
                    <a href="/AppOffers/Pedido/detallePedido/${pedido.id}" class="btn btn-outline-primary leerPedido"><i class="fas fa-eye" style="pointer-events:none;"></i></a>
                    <button type="button" class="btn btn-outline-success aceptarPedido"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
                    <button type="button" class="btn btn-outline-danger rechazarPedido"><i class="fas fa-times" style="pointer-events:none;"></i></button>
                </td>
            </tr>
          `
        }
        sectionCompanies.innerHTML = html
    }else if(response.status==304){
        const sectionCompanies= document.getElementById('rpta')
        let html = ''
        sectionCompanies.innerHTML = html
    }
    else{
        Swal.fire(
            'Error',
            response.response.message,
            'error'
          )
    }
}

const cargarTablaPedidosPersonalizados = async()=>{
    let response = await fetch('/AppOffers/Pedido/getAllPedidosPersonalizados')
    let estado
    let nro=0
    response = await response.json()
    if(response.status==203){
        const sectionCompanies= document.getElementById('rpta2')
        let html = ''
        for (const pedido of response.response.data) {
            nro++
            if(pedido.estado=='1' ){
                estado="Pendiente"
            }else if(pedido.estado=='2'){
                estado="Leido"
            }
            html+=
            `<tr id="${pedido.id}">
                <td>${nro}</td>
                <td>${pedido.numero}</td>
                <td>${estado}</td>                    
                <td class="a-right a-right" width="100px">
                    <a href="/AppOffers/Pedido/detallePedidoPersonalizado/${pedido.id}" class="btn btn-outline-primary leerPedidoP"><i class="fas fa-eye" style="pointer-events:none;"></i></a>
                    <button type="button" class="btn btn-outline-success aceptarPedidoP"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
                    <button type="button" class="btn btn-outline-danger rechazarPedidoP"><i class="fas fa-times" style="pointer-events:none;"></i></button>
                </td>
            </tr>
          `
        }
        sectionCompanies.innerHTML = html
    }else if(response.status==304){
        const sectionCompanies= document.getElementById('rpta2')
        let html = ''
        sectionCompanies.innerHTML = html
    }
    else{
        Swal.fire(
            'Error',
            response.response.message,
            'error'
          )
    }
}
$(document).on('click','.aceptarPedido', async function () {
    const element = $(this)[0].parentElement.parentElement;
    const idSolicitud = $(element).attr('id');
    let response = await fetch(`/AppOffers/Pedido/aceptar/${idSolicitud}`)
    response = await response.json()
    if(response.status==201){
        cargarTablaPedidos()
    }
})

$(document).on('click','.leerPedido', async function () {
    const element = $(this)[0].parentElement.parentElement;
    const idSolicitud = $(element).attr('id');
    let response = await fetch(`/AppOffers/Pedido/leer/${idSolicitud}`)
    response = await response.json()
    if(response.status==201){
        cargarTablaPedidos()
    }
})

$(document).on('click','.rechazarPedido', async function () {
    const element = $(this)[0].parentElement.parentElement;
    const idSolicitud = $(element).attr('id');
    let response = await fetch(`/AppOffers/Pedido/rechazar/${idSolicitud}`)
    response = await response.json()
    if(response.status==201){
        cargarTablaPedidos()
    }
})

$(document).on('click','.aceptarPedidoP', async function () {
    const element = $(this)[0].parentElement.parentElement;
    const idSolicitud = $(element).attr('id');
    let response = await fetch(`/AppOffers/Pedido/aceptarPersonalizado/${idSolicitud}`)
    response = await response.json()
        if(response.status==201){
            cargarTablaPedidosPersonalizados()
        }
})

$(document).on('click','.leerPedidoP', async function () {
    const element = $(this)[0].parentElement.parentElement;
    const idSolicitud = $(element).attr('id');
    let response = await fetch(`/AppOffers/Pedido/leerPersonalizado/${idSolicitud}`)
    response = await response.json()
    if(response.status==201){
        cargarTablaPedidosPersonalizados()
    }
})

$(document).on('click','.rechazarPedidoP', async function () {
    const element = $(this)[0].parentElement.parentElement;
    const idSolicitud = $(element).attr('id');
    let response = await fetch(`/AppOffers/Pedido/rechazarPersonalizado/${idSolicitud}`)
    response = await response.json()
        if(response.status==201){
            cargarTablaPedidosPersonalizados()
        }
})

