const loadProducto = async()=>{
    let response = await fetch('/AppOffers/VProducto/getProducto/'+location.pathname.substr(1).split('/')[2])
    response = await response.json()
    if(response.status==203){
        const sectionProductos= document.getElementById('detalle-section')
        let html = ''
        const producto=response.response.data
            html+=`
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"></h3>
              <div class="col-10">
                <img src="/AppOffers/public/img/Products/${producto.imagen}" class="img-fluid logo-producto" alt="producto">
              </div>
            </div>
            <div class="col-12 col-sm-5">
              <h3 class="my-3">${producto.nombre}</h3>
              <p>${producto.caracteristica}</p>
              <p><strong>${producto.empresa}</strong></p>
              <h4>Ver colores</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                  <i class="fas fa-circle fa-2x text-plomo"></i>
                </label>
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Precio: ${producto.precio}
                </h2>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-whatsapp-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                      <i class="fas fa-comments fa-2x"></i>
                </a>
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
