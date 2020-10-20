addEventListener('DOMContentLoaded',()=>{
    cargarTablaPedidos()
    cargarTablaPedidosPersonalizados()
})

const cargarTablaPedidos = async()=>{
    let response = await fetch('/AppOffers/Pedido/getAllPedidos')
    let estado
    let nro=0
    response = await response.json()
    if(response.status==203 || response.status==304){
        nro++
        const sectionCompanies= document.getElementById('rpta')
        let html = ''
        for (const pedido of response.response.data) {
            if(pedido.estado=='1' ){
                estado="Pendiente"
            }else if(pedido.estado=='2'){
                estado="Leido"
            }
            html+=
            `<tr id="${pedido.id}">
                <td>${nro}</td>
                <td>${pedido.nombre}</td>  
                <td>${pedido.fecha}</td>
                <td>${estado}</td>                    
                <td class="a-right a-right" width="100px">
                    <a href="/AppOffers/Pedido/detallePedido/${pedido.id}" class="btn btn-outline-primary"><i class="fas fa-eye" style="pointer-events:none;"></i></a>
                    <button type="button" class="btn btn-outline-success aceptarPedido"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
                    <button type="button" class="btn btn-outline-danger rechazarPedido"><i class="fas fa-times" style="pointer-events:none;"></i></button>
                </td>
            </tr>
          `
        }
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
    if(response.status==203 || response.status==304){
        nro++
        const sectionCompanies= document.getElementById('rpta2')
        let html = ''
        for (const pedido of response.response.data) {
            if(pedido.estado=='1' ){
                estado="Pendiente"
            }else if(pedido.estado=='2'){
                estado="Leido"
            }
            html+=
            `<tr id="${pedido.id}">
                <td>${nro}</td>
                <td>${pedido.nombre}</td>
                <td>${pedido.fecha}</td>
                <td>${estado}</td>                    
                <td class="a-right a-right" width="100px">
                    <a href="/AppOffers/Pedido/detallePedidoPersonalizado/${pedido.id}" class="btn btn-outline-primary"><i class="fas fa-eye" style="pointer-events:none;"></i></a>
                    <button type="button" class="btn btn-outline-success aceptarPedido"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
                    <button type="button" class="btn btn-outline-danger rechazarPedido"><i class="fas fa-times" style="pointer-events:none;"></i></button>
                </td>
            </tr>
          `
        }
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