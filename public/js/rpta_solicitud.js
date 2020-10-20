document.addEventListener('DOMContentLoaded',()=>{
    loadSolicitudesPersonalizadas()
    loadSolicitudes()
})

const loadSolicitudesPersonalizadas = async()=>{
    let response = await fetch('/AppOffers/Cotizaciones/get_solicitudPersonalizada_empresa')
    let nro=0
    response = await response.json()
    if(response.status==203){
        nro++
        const sectionCompanies= document.getElementById('rpta')
        let html = ''
        let estado = ''
        for (const solicitud of response.response.data) {
            if(solicitud.stateEmpresa=='1' ){
                estado="Respondió a solicitud"
            }else if(solicitud.stateEmpresa=='2'){
                estado="Proceso"
            }else if(solicitud.stateEmpresa=='3'){
                estado="Aceptado"
            }
            html+=
            `<tr idPersonalizada="${solicitud.idSolicitud+'/'+solicitud.idEmpresa}">
                <td>${nro}</td>
                <td>${solicitud.nombre}</td>
                <td>${solicitud.razonSocial}</td>
                <td>${solicitud.fecha}</td>
                <td>${estado}</td>           
                <td class="a-right a-right" width="100px">
                    <a href="/AppOffers/Cotizaciones/detalles_cotizacion/${solicitud.idSolicitud}/${solicitud.idEmpresa}/True" class="btn btn-outline-primary"><i class="fas fa-eye" style="pointer-events:none;"></i></a>
                    <button type="button" class="cotizacion-aceptada btn btn-outline-success"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
                    <button type="button" class="cotizacion-personalizada-eliminada btn btn-outline-danger"><i class="far fa-trash-alt" style="pointer-events:none;"></i></button>
                </td>
            </tr>
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


const loadSolicitudes = async()=>{
    let response = await fetch('/AppOffers/Cotizaciones/get_solicitud_empresa')
    let nro=0
    response = await response.json()
    if(response.status==203){
        nro++
        const sectionCompanies= document.getElementById('rpta_solicitud')
        let html = ''
        let estado = ''
        for (const solicitud of response.response.data) {
            if(solicitud.stateEmpresa=='1' ){
                estado="Respondió a solicitud"
            }else if(solicitud.stateEmpresa=='2'){
                estado="Proceso"
            }else if(solicitud.stateEmpresa=='3'){
                estado="Aceptado"
            }
            html+=
            `<tr id="${solicitud.idSolicitud}">
                <td>${nro}</td>
                <td>${solicitud.nombre}</td>
                <td>${solicitud.razonSocial}</td>
                <td>${solicitud.fecha}</td>
                <td>${estado}</td>           
                <td class="a-right a-right" width="100px">
                    <a href="/AppOffers/Cotizaciones/detalles_cotizacion/${solicitud.idSolicitud}/${solicitud.idEmpresa}/False" class="btn btn-outline-primary"><i class="fas fa-eye" style="pointer-events:none;"></i></a>
                    <button type="button" class="cotizacion-aceptada btn btn-outline-success"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
                    <button type="button" class="cotizacion-eliminada btn btn-outline-danger"><i class="far fa-trash-alt" style="pointer-events:none;"></i></button>
                </td>
            </tr>
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

$(document).on('click','.cotizacion-aceptada', async function() {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('id');
    let estado = await fetch('/AppOffers/Cotizaciones/actualizar_estado_aceptado/'+id);
    estado = await estado.json()
    if(estado.status==200){
        Swal.fire(
            'Solicitud aceptada',
          )
    }
});


$(document).on('click','.cotizacion-eliminada', async function() {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('id');
    console.log(id)
    let estado = await fetch('/AppOffers/Cotizaciones/eliminar_solicitud_empresa/'+id);
    estado = await estado.json()
    if(estado.status==200){
        Swal.fire(
            'Solicitud eliminada',
          )
    }
    loadSolicitudes()
});

$(document).on('click','.cotizacion-personalizada-eliminada', async function() {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('idPersonalizada');
    console.log(id)
    let estado = await fetch('/AppOffers/Cotizaciones/eliminar_solicitudPersonalizada_empresa/'+id);
    estado = await estado.json()
    if(estado.status==200){
        Swal.fire(
            'Solicitud eliminada',
          )     
    }
    loadSolicitudesPersonalizadas()
});