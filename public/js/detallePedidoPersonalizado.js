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
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#agregarCaracteristica"><i class="fas fa-paper-plane"></i> Contraoferta</button>
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

const btnNew = document.getElementById('addCaracteristica')

btnNew.addEventListener('click',async ()=>{
    const data = new FormData()
    data.append('caracteristicas',JSON.stringify(arrayDatosCaracteristicas))
    let response = await fetch('/AppOffers/Pedido/addContraoferta',{
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
          loadPedido()
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

$('#agregarCaracteristica').on('shown.bs.modal', async function () {
    let response = await fetch('/AppOffers/Pedido/getCaracteristicaPedido/'+location.pathname.substr(1).split('/')[3])
    arrayDatosCaracteristicas=[]
    response = await response.json()
    if(response.status==203){
        const sectionCaracteristica= document.getElementById('cuerpo')
        let html = ''
        for (const item of response.response.data) {
            html+=`<div class="form-group">
            <div class="row">
                <div class="row col-12">
                    <label class="col-3 descripcion">${item.tipo}</label>
                    <input type="text" name="" class="form-control col-9 valor" onkeypress="return LetrasNumeros(event)">
                </div>
            </div>
            </div>`
        }
        sectionCaracteristica.innerHTML = html
    }
    let arrayCaracteristicas = document.querySelectorAll('.valor')
    let arrayLabels = document.querySelectorAll('.descripcion')
        for(let i=0; i<arrayCaracteristicas.length;i++){
            let obj = {caract:arrayLabels[i].textContent,valor:arrayCaracteristicas[i].value}
            arrayDatosCaracteristicas.push(obj)
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