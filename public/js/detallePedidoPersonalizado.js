const loadPedido = async()=>{
    let response = await fetch('/AppOffers/Pedido/getDetallePersonalizado/'+location.pathname.substr(1).split('/')[3])
    response = await response.json()
    if(response.status==203){
        const sectionCompanies= document.getElementById('detalle_pedido')
        let html = ''
        for (const pedido of response.response.data) {
            html+=
            `
            <div class="row">
                <div class="col-11">
                    <h4>
                        <strong>Producto Personalizado </strong><br>
                        <strong>Nro de pedido: </strong>${pedido.numero}<br>
                    </h4>
                </div>
            </div>
            <!-- info row -->
            <br>
            <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                    Fecha:${pedido.fecha}<br>   
                    Usuario:${pedido.usuario}<br>
                    Caracteristicas:${pedido.caracteristica}<br>
                </div>
            </div>
            <br>
            <a href="/AppOffers/Pedido/detallePedidoPersonalizado/${pedido.id}" class="btn btn-outline-primary"><i class="fas fa-paper-plane" style="pointer-events:none;"></i>Contraoferta</a>
            <a href="https://wa.link/56i2xn"><i class="fab fa-whatsapp-square fa-2x"></i> Contactar empresa</a>

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

document.addEventListener('DOMContentLoaded',()=>{
    loadPedido()
})
