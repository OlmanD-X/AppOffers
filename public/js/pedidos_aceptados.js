addEventListener('DOMContentLoaded',()=>{
    cargarTablaPedidos()
    cargarTablaPedidosPersonalizados()
})

const cargarTablaPedidos = async()=>{
    let response = await fetch('/AppOffers/CotizacionEmpresa/leer_cotizacion_producto')
    let estado
    response = await response.json()
    if(response.status==203){
        const sectionCompanies= document.getElementById('rpta')
        let html = ''
        for (const pedido of response.response.data) {
            if(pedido.estado=='3' ){
                estado="Aceptado"
            }
            html+=
            `<tr id="${pedido.id}">
                <td>${pedido.numero}</td>
                <td>${pedido.nombre}</td>  
                <td>${pedido.fecha}</td>
                <td>${estado}</td>                    
                <td class="a-right a-right" width="100px">
                    <a href="/AppOffers/Pedido/detallePedido/${pedido.id}" class="btn btn-outline-primary"><i class="fas fa-eye" style="pointer-events:none;"></i></a>
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
    let response = await fetch('/AppOffers/CotizacionEmpresa/leer_cotizaciones_personalizadas')
    console.log()
    let estado
    response = await response.json()
    if(response.status==203){
        const sectionCompanies= document.getElementById('rpta2')
        let html = ''
        for (const pedido of response.response.data) {
            if(pedido.estado=='3' ){
                estado="Aceptado"
            }
            html+=
            `<tr id="${pedido.id}">
                <td>${pedido.numero}</td>
                <td>${pedido.subcategoria}</td>
                <td>${pedido.fecha}</td>
                <td>${estado}</td>                    
                <td class="a-right a-right" width="100px">
                    <a href="/AppOffers/Pedido/detallePedidoPersonalizado/${pedido.id}" class="btn btn-outline-primary"><i class="fas fa-eye" style="pointer-events:none;"></i></a>
                    <button type="button" class="btn btn-outline-danger rechazarPedido"><i class="fas fa-times" style="pointer-events:none;"></i></button>
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