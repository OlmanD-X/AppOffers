document.addEventListener('DOMContentLoaded',()=>{
    loadProductos()
})

let btnIngresar = document.getElementById('btnIngresar')
if(btnIngresar!=undefined){
    btnIngresar.addEventListener('click',()=>{
        location.href = '/AppOffers/Login'
    })
}


const loadProductos = async()=>{
    let response = await fetch('/AppOffers/VProducto/getProductos')
    response = await response.json()
    if(response.status==203){
        const sectionProductos= document.getElementById('Productos-section')
        let html = ''
        for (const producto of response.response.data) {
            html+=`<article class="col-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row mb-2">
                                    <div class="col-7">
                                        <span class="card-text font-weight-bold d-block" style="font-size:1.5em;">${producto.nombre}</span>
                                        <span class="card-text d-block" style="font-size:0.9em;"> Descripcion: ${producto.descripcion}</span>
                                        <span class="card-text d-block" style="font-size:0.9em;">Empresa: ${producto.empresa}</span>
                                    </div>
                                    <div class="col-5 container-logo-producto">
                                        <img src="/AppOffers/public/img/Products/${producto.imagen}" width="150px" height="140px" alt="producto">
                                    </div>
                                </div>
                                <div class="row mt-1" data-producto-id=${producto.idProducto}>
                                	<div class="col-6">
					                  <span class="card-text d-block" style="font-size:1.5em;">Precio: ${producto.precio}</span>
					                </div>
                                    <div class="col-6">
                                        <a href="/AppOffers/Detalles/${producto.idProducto}" class="btn btn-outline-info col-10"><i class="fas fa-sign-in-alt" style="pointer-events:none;"></i> Ver Detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>`
        }
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