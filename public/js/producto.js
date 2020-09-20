const btnNew = document.getElementById('nuevoProducto')
var arrayDatosCaracteristicas = []
//const btnAgregar = document.getElementById('agregarCaracteristica')

var table,filasTable,rowEdit,selectsub
table = $("#productos").DataTable();
selectsub = $("#selectsub").select2()

addEventListener('DOMContentLoaded',()=>{
    cargarTablaProductos()
})

btnNew.addEventListener('click',async ()=>{
    const nombre = document.getElementById('nombre')
    const descripcion = document.getElementById('descripcion')
    const precio = document.getElementById('precio')
    const oferta = document.getElementById('oferta')
    const stock = document.getElementById('stock')
    const stockminimo = document.getElementById('stockminimo')
    const imagen = document.getElementById('imagen')
    const data = new FormData()
    data.append('nombre',nombre.value)
    data.append('descripcion',descripcion.value)
    data.append('precio',precio.value)
    data.append('oferta',oferta.value)
    data.append('stock',stock.value)
    data.append('stockminimo',stockminimo.value)
    data.append('imagen',imagen.files[0])
    data.append('subcategorias',selectsub.val())
    data.append('caracteristicas',JSON.stringify(arrayDatosCaracteristicas))
    let response = await fetch('/AppOffers/Producto/addProducto',{
        method:'POST',
        body : data,
    })
    response = await response.json()
    if(response.status==200){
        Swal.fire(
            'Registro Exitoso',
            response.response.message,
            'success'
          )
        cargarTablaProductos()
        nombre.value=''
        descripcion.value = ''
        precio.value=''
        stock.value=''
        stockminimo.value=''
        imagen.value=''
        oferta.value=''
        selectsub.val('')
        selectsub.trigger('change')
    }
    else if(response.status<200){
        Swal.fire(
            'Alerta',
            response.response.message,
            'warning'
          )
    }
    else if(response.status>=300){
        Swal.fire(
            'Error',
            response.response.message,
            'error'
          )
    }
})
const cargarTablaProductos = async()=>{
    let response = await fetch('/AppOffers/Producto/getAllProducto')
    response = await response.json()
    if(response.status==203){
       productos = response.response.data
        table.clear().draw()
        filasTable = table.rows().count();
        for (const data of productos) {
            table.row.add([
                filasTable+1,
                data.nombre,
                data.descripcion,
                data.precio,
                data.stock,
                data.stockMin,
                `<img src="/AppOffers/public/img/Products/${data.imagen}" class="img-fluid logo-company" alt="imagen">`,
                `<button type="button" class="btn btn-outline-primary editar" data-toggle="modal" data-target="#editPerson"><i class="fas fa-edit" style="pointer-events:none;"></i></button>
                <button type="button" class="btn btn-outline-danger eliminarProducto"><i class="fas fa-trash" style="pointer-events:none;"></i></button>`
            ]).draw(false);
            table.context[0].aoData[filasTable].anCells[7].setAttribute('data-id', data.idProducto);
            filasTable++;
        } 
    }
}
  $('#agregarProducto').on('shown.bs.modal', async function () {
    let response = await fetch('/AppOffers/Caracteristica/getAllSubcategoria')
    response = await response.json()
    if(response.status==203){
        let array = []
        for (const item of response.response.data) {
            let obj = {id:item.idSubcategoria,text:item.descripcion}
            array.push(obj)
        }
        selectsub.select2({data:array}
            )
    }
  })

$('#agregarCaracteristica').on('shown.bs.modal', async function () {
    const idSubcategoria=$("#selectsub").val();
    let response = await fetch(`/AppOffers/Caracteristica/getCaracteristica/${idSubcategoria}`)
    response = await response.json()
    if(response.status==203){
        const sectionCaracteristica= document.getElementById('cuerpo')
        let html = ''
        for (const item of response.response.data) {
            html+=`<div class="form-group">
            <div class="row">
                <div class="row col-12">
                    <label class="col-3 descripcion">${item.descripcion}</label>
                    <input type="text" name="" class="form-control col-9 valor" onkeypress="return LetrasNumeros(event)">
                </div>
            </div>
            </div>`
        }
        sectionCaracteristica.innerHTML = html
    }
})

$(document).on('click', '#addCaracteristica', function() {
    arrayDatosCaracteristicas=[]
    let arrayCaracteristicas = document.querySelectorAll('.valor')
    let arrayLabels = document.querySelectorAll('.descripcion')
        for(let i=0; i<arrayCaracteristicas.length;i++){
            let obj = {caract:arrayLabels[i].textContent,valor:arrayCaracteristicas[i].value}
            arrayDatosCaracteristicas.push(obj)
        }
    $('#agregarCaracteristica').modal('hide')
});

$(document).on('click','.eliminarProducto', async function () {
    const element = $(this)[0].parentElement;
    const idProducto = $(element).attr('data-id');
    let response = await fetch(`/AppOffers/Producto/deleteProducto/${idProducto}`)
    response = await response.json()
        if(response.status==202){
                Swal.fire(
                    'Eliminación Exitosa',
                    response.response.message,
                    'success'
                  )
                cargarTablaProductos()
            }
        else if(response.status<200){
                Swal.fire(
                    'Alerta',
                    response.response.message,
                    'warning'
                  )
            }
        else if(response.status>=300){
                Swal.fire(
                    'Error',
                    response.response.message,
                    'error'
                  )
            }       
})



function LetrasNumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " abcdefghijklmnñopqrstuvwxyz";
    numeros=" 0123456789";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales){
         if(key == especiales[i]){
             tecla_especial = true;
             break;
         }
     }

     if(letras.indexOf(tecla)==-1 && numeros.indexOf(tecla)==-1 && !tecla_especial){
         return false;
     }
 }
  

