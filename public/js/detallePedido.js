const loadPedido = async()=>{
    let response = await fetch('/AppOffers/Pedido/getDetalle/'+location.pathname.substr(1).split('/')[3])
    response = await response.json()
    if(response.status==203){
        const sectionCompanies= document.getElementById('detalle_pedido')
        let html = ''
        for (const pedido of response.response.data) {
            console.dir(pedido)
            html+=
            `<div class="row">
                <div class="col-11">
                    <h4> 
                        <strong>${pedido.nombre} </strong><br>
                        <strong>Nro de pedido: </strong>${pedido.numero}<br>
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-6 float-left">
                    <img width="450px" height="400px" src="/AppOffers/public/img/Products/${pedido.imagen}" alt="">
                </div>
                <div class="col-6 float-right">
                    <h4><small><strong>Fecha: </strong> ${pedido.fecha}<small><br></h4>
                    <h4><small><strong>Usuario: </strong> ${pedido.usuario}<small><br></h4>
                    <h4><small><strong>Precio: </strong> ${pedido.precio}<small></h4>
                    <h4><small><strong>Caracteristicas: </strong> ${pedido.caracteristica}<small></h4>
                </div>          
            </div>
        <!-- info row -->
            <br>
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
