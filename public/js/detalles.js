let btnIngresar = document.getElementById('btnIngresar')
if(btnIngresar!=undefined){
    btnIngresar.addEventListener('click',()=>{
        location.href = '/AppOffers/Login'
    })
}

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
                            <td>${(producto.precio*0.18).toFixed(2)}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>${(producto.precio*(1+0.18)).toFixed(2)}</td>
                        </tr>
                    </table>
                </div>
                <br>
            <!--    <div class="row">
                    Cantidad:
                    <div class="col-2">
                        <select class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <br>-->
                <div class="row"> 
                 <!--   <div class="col-6">
                        <button type="button" class="solicitar btn btn-outline-primary"><i class="far fa-paper-plane fa-1x"></i>Cotiza por cantidad</button>
                    </div> -->
                    <div class="col-6">
                        <a href="https://wa.link/56i2xn" class="btn btn-outline-primary"><i class="fab fa-whatsapp fa-1x"></i> Contactar empresa</a>
                    </div>
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

$(document).on('click','.solicitar', async function() {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('id');
    let estado = await fetch('/AppOffers/Cotizaciones/enviar_solicitud/'+location.pathname.substr(1).split('/')[2]);
    estado = await estado.json()
    if(estado.status==200){
        Swal.fire(
            'Solicitud aceptada',
          )
    }
});


loadProducto()
