const btnNewCategoria = document.getElementById('nuevaCategoria')
const btnActualizarCategoria = document.getElementById('actualizarCategoria')
const btnNewSubcategoria = document.getElementById('nuevaSubcategoria')
const btnNewCaracteristica = document.getElementById('nuevaCaracteristica')
var tablec,tablesub,tablecar,filasTablec,filasTablesub,filasTablecar,rowEdit,selectcategorias,selectsub
tablec = $("#categorias").DataTable();
tablesub = $("#subcategorias").DataTable();
tablecar = $("#caracteristicas").DataTable();

selectcategorias = $("#selectcategorias").select2()
selectsub = $("#selectsub").select2()


addEventListener('DOMContentLoaded',()=>{
    cargarTablaCategorias()
})

addEventListener('DOMContentLoaded',()=>{
    cargarTablaSubcategorias()
})

addEventListener('DOMContentLoaded',()=>{
    cargarTablaCaracteristicas()
})


btnNewCategoria.addEventListener('click',async ()=>{
    const descripcion = document.getElementById('descripcionCategoria')
    const data = new FormData()
    data.append('descripcion',descripcion.value)
    let response = await fetch('/AppOffers/Caracteristica/addCategoria',{
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
        cargarTablaCategorias()
        descripcion.value = ''
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
btnActualizarCategoria.addEventListener('click',async ()=>{
    const descripcion = document.getElementById('descripcionCategoriaEdit')
    const idCategoria = document.getElementById('idCat')
    const data = new FormData()
    data.append('descripcion',descripcion.value)
    data.append('idCategoria',idCategoria.value)
    let response = await fetch('/AppOffers/Caracteristica/updateCategoria',{
        method:'POST',
        body : data,
    })
    response = await response.json()
    console.dir(response)
    if(response.status==201){
        Swal.fire(
            'Actualización Exitosa',
            response.response.message,
            'success'
          )
        cargarTablaCategorias()
        cargarTablaSubcategorias()
        descripcion.value = ''
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
const cargarTablaCategorias = async()=>{
    let response = await fetch('/AppOffers/Caracteristica/getAllCategoria')
    response = await response.json()
    if(response.status==203){
        categorias = response.response.data
        tablec.clear().draw()
        filasTablec = tablec.rows().count();
        for (const data of categorias) {
            tablec.row.add([
                filasTablec+1,
                data.descripcion,
                `<button type="button" class="btn btn-outline-primary editCategoria" data-toggle="modal" data-target="#editarCategoria"><i class="fas fa-edit" style="pointer-events:none;"></i></button>
                <button type="button" class="btn btn-outline-danger eliminarCategoria"><i class="fas fa-trash" style="pointer-events:none;"></i></button>`
            ]).draw(false);
            tablec.context[0].aoData[filasTablec].anCells[2].setAttribute('data-id', data.idCategoria);
            filasTablec++;
        } 
    }
}

$(document).on('click','.editCategoria', async function () {
    const element = $(this)[0].parentElement;
    const idCategoria = $(element).attr('data-id');
    let response = await fetch(`/AppOffers/Caracteristica/getCategoria/${idCategoria}`)
    response = await response.json()
    if(response.status==203){
        const datos=response.response.data
        $("#descripcionCategoriaEdit").val(datos.descripcion);
        $("#idCat").val(datos.idCategoria);
    }
})

$(document).on('click','.eliminarCategoria', async function () {
    const element = $(this)[0].parentElement;
    const idCategoria = $(element).attr('data-id');
    let response = await fetch(`/AppOffers/Caracteristica/deleteCategoria/${idCategoria}`)
    response = await response.json()
    console.dir(response)
        if(response.status==202){
                Swal.fire(
                    'Eliminación Exitosa',
                    response.response.message,
                    'success'
                  )
                cargarTablaCategorias()
                descripcion.value = ''
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

btnNewSubcategoria.addEventListener('click',async ()=>{
    const descripcion = document.getElementById('descripcionSubcategoria')
    const data = new FormData()
    data.append('descripcion',descripcion.value)
    data.append('categorias',JSON.stringify(selectcategorias.select2('data')))
    let response = await fetch('/AppOffers/Caracteristica/addSubcategoria',{
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
        cargarTablaSubcategorias()
        descripcion.value = ''
        selectcategorias.val('')
        selectcategorias.trigger('change')
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

const cargarTablaSubcategorias = async()=>{
    let response = await fetch('/AppOffers/Caracteristica/getAllSubcategoria')
    response = await response.json()
    if(response.status==203){
       subcategorias = response.response.data
        tablesub.clear().draw()
        filasTablesub = tablesub.rows().count();
        for (const data of subcategorias) {
            tablesub.row.add([
                filasTablesub+1,
                data.categoria,
                data.descripcion,
                `<button type="button" class="btn btn-outline-primary editar" data-toggle="modal" data-target="#actualizarModal"><i class="fas fa-edit" style="pointer-events:none;"></i></button>
                <button type="button" class="btn btn-outline-danger eliminar"><i class="fas fa-trash" style="pointer-events:none;"></i></button>`
            ]).draw(false);
            tablesub.context[0].aoData[filasTablesub].anCells[3].setAttribute('data-id', data.idSubcategoria);
            filasTablesub++;
        } 
    }
}

$('#agregarSubcategoria').on('shown.bs.modal', async function () {
    let response = await fetch('/AppOffers/Caracteristica/getAllCategoria')
    response = await response.json()
    if(response.status==203){
        let array = []
        for (const item of response.response.data) {
            let obj = {id:item.idCategoria,text:item.descripcion}
            array.push(obj)
        }
        selectcategorias.select2({data:array})
    }
  })

  btnNewCaracteristica.addEventListener('click',async ()=>{
    const descripcion = document.getElementById('descripcionCaracteristica')
    const data = new FormData()
    data.append('descripcion',descripcion.value)
    data.append('subcategorias',JSON.stringify(selectsub.select2('data')))
    let response = await fetch('/AppOffers/Caracteristica/addCaracteristica',{
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
        cargarTablaCaracteristicas()
        descripcion.value = ''
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
const cargarTablaCaracteristicas = async()=>{
    let response = await fetch('/AppOffers/Caracteristica/getAllCaracteristica')
    response = await response.json()
    if(response.status==203){
       caracteristicas = response.response.data
        tablecar.clear().draw()
        filasTablecar = tablecar.rows().count();
        for (const data of caracteristicas) {
            tablecar.row.add([
                filasTablecar+1,
                data.subcategoria,
                data.descripcion,
                `<button type="button" class="btn btn-outline-primary editar" data-toggle="modal" data-target="#actualizarModal"><i class="fas fa-edit" style="pointer-events:none;"></i></button>
                <button type="button" class="btn btn-outline-danger eliminar"><i class="fas fa-trash" style="pointer-events:none;"></i></button>`
            ]).draw(false);
            tablecar.context[0].aoData[filasTablecar].anCells[3].setAttribute('data-id', data.idCaracteristica);
            filasTablecar++;
        } 
    }
}
  $('#agregarCaracteristica').on('shown.bs.modal', async function () {
    let response = await fetch('/AppOffers/Caracteristica/getAllSubcategoria')
    response = await response.json()
    if(response.status==203){
        let array = []
        for (const item of response.response.data) {
            let obj = {id:item.idSubcategoria,text:item.descripcion}
            array.push(obj)
        }
        selectsub.select2({data:array})
    }
  })