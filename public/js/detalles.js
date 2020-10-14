const loadProducto = async()=>{
    let response = await fetch('/AppOffers/VProducto/getProducto/'+location.pathname.substr(1).split('/')[2])
    response = await response.json()
    if(response.status==203){
        const sectionProductos= document.getElementById('detalle-section')
        let html = ''
        const producto=response.response.data
            html+=`<div class="row">
            <div class="col-11">
                <h4>
                    <i class="fas fa-globe"></i>${producto.empresa}
                    <small class="float-right">Fecha: ${producto.fecha}</small>
                </h4>
            </div>
        </div>
        <!-- info row -->
        <br>
        <div class="row invoice-info">
            <div class="col-sm-5 invoice-col">    
                Ruc:${producto.ruc}<br>
                Dirección:${producto.direccion}<br>
                Telefono:${producto.telefono}<br> 
            </div>
            <!-- /.col -->
            <br>
            <div class="col-sm-1 invoice-col"> </div>
            <div class="col-sm-6 invoice-col">
                Nombre:${producto.nombre}<br>   
                Caracteristicas:${producto.caracteristica}<br>
                stock:${producto.stock}<br>
            </div>
        </div>
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-6">
                <img width="450px" height="400px" src="/AppOffers/public/img/Products/${producto.imagen}" alt="">
            </div>
            <div class="col-5">
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>${producto.precio}</td>
                        </tr>
                        <tr>
                            <th>IGV (18%)</th>
                            <td>${producto.precio*0.18}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>${producto.precio*(1+0.18)}</td>
                        </tr>
                    </table>
                    <a href="https://wa.link/56i2xn"><i class="fab fa-whatsapp-square fa-2x"></i> Contactar empresa</a>
                    
                </div>
            </div>
        </div>
        `
        sectionProductos.innerHTML = html
    }
    else{
        Swal.fire(
            'Error',
            response.response.message,
            'error'
          )
    }
}

loadProducto()
