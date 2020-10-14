const loadSolicitud_empresa = async()=>{
    let estado = await fetch('/AppOffers/Cotizaciones/actualizar_estado/'+location.pathname.substr(1).split('/')[3])
    let response = await fetch('/AppOffers/Cotizaciones/get_rpta_empresa/'+location.pathname.substr(1).split('/')[3])
    let nro=0
    response = await response.json()
    if(response.status==203){
        nro++
        const sectionCompanies= document.getElementById('detalle_solicitud')
        let html = ''
        for (const solicitud of response.response.data) {
            html+=
            `<div class="row">
                <div class="col-11">
                    <h4>
                        <i class="fas fa-globe"></i>${solicitud.empresa}
                        <small class="float-right">Fecha: ${solicitud.fecha}</small>
                    </h4>
                </div>
            </div>
            <!-- info row -->
            <br>
            <div class="row invoice-info">
                <div class="col-sm-5 invoice-col">    
                    Ruc:${solicitud.ruc}<br>
                    Dirección:${solicitud.direccion}<br>
                    Telefono:${solicitud.telefono}<br> 
                    Nro de solicitud:${solicitud.numero}<br>
                </div>
                <!-- /.col -->
                <br>
                <div class="col-sm-1 invoice-col"> </div>
                <div class="col-sm-6 invoice-col">
                    Nombre:${solicitud.nombre}<br>   
                    Caracteristicas:${solicitud.caracteristica}<br>
                    stock:${solicitud.stock}<br>
                </div>
            </div>
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-6">
                    <img width="450px" height="400px" src="/AppOffers/public/img/Products/${solicitud.imagen}" alt="">
                </div>
                <div class="col-5">
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>${solicitud.precio}</td>
                            </tr>
                            <tr>
                                <th>IGV (18%)</th>
                                <td>${solicitud.precio*0.18}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>${solicitud.precio*(1+0.18)}</td>
                            </tr>
                        </table>
                        <a href="https://wa.link/56i2xn"><i class="fab fa-whatsapp-square fa-2x"></i> Contactar empresa</a>
                        
                    </div>
                </div>
            </div>
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
    loadSolicitud_empresa()
})
