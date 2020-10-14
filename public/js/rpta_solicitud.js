document.addEventListener('DOMContentLoaded',()=>{
    loadSolicitudesPersonalizadas()
})

const loadSolicitudesPersonalizadas = async()=>{
    let response = await fetch('/AppOffers/Cotizaciones/get_solicitud_empresa')
    let nro=0
    response = await response.json()
    if(response.status==203){
        nro++
        const sectionCompanies= document.getElementById('rpta')
        let html = ''
        for (const solicitud of response.response.data) {
            html+=
            `<tr id="${solicitud.idSolicitud}">
                <td>${nro}</td>
                <td>${solicitud.nombre}</td>
                <td>${solicitud.stateEmpresa}</td>           
                <td class="a-right a-right" width="100px">
                    <a href="/AppOffers/Cotizaciones/detalles_cotizacion/${solicitud.idSolicitud}" class="btn btn-outline-primary"><i class="fas fa-eye" style="pointer-events:none;"></i></a>
                    <button type="button" class="cotizacion-aceptada btn btn-outline-danger"><i class="far fa-check-circle" style="pointer-events:none;"></i></button>
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
