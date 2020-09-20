document.addEventListener('DOMContentLoaded',()=>{
    loadCompanies()
})

document.getElementById('companies-section').addEventListener('click',async (e)=>{
    if(e.target.type == "button"){
        if(e.target.classList.contains('editCompany')){
            const idUN = e.target.parentElement.parentElement.getAttribute('data-company-id');
            let response = await fetch('/AppOffers/Home/getCompany/'+idUN)
            response = await response.json()
                if(response.status==203){
                    const company=response.response.data
                    document.getElementById("razonEdit").value=company.razonSocial
                    document.getElementById("rucEdit").value=company.ruc
                    document.getElementById("direccionEdit").value=company.direccion
                    document.getElementById("imagen").src="/AppOffers/Public/img/companies/"+company.imagen
                    document.getElementById("telefonoEdit").value=company.telefono
                    document.getElementById("id").value=company.idEmpresa
                }
                else{
                    Swal.fire(
                        'Error',
                        response.response.message,
                        'error'
                    )
                }     
        }
        else if(e.target.classList.contains('deleteCompany')){
            const idUN = e.target.parentElement.parentElement.getAttribute('data-company-id');
            Swal.fire({
                title: `Desea eliminar la empresa ${idUN}?`,
                text: "Confirme para eliminar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar'
            }).then(async (result) => {
                if (result.value) {
                    let response = await fetch('/AppOffers/Home/delete/'+idUN,{
                        method:'POST'
                    })
                    response = await response.json()
                    if(response.status==202){
                        Swal.fire(
                            'Se elimino el registro',
                            response.response.message,
                            'success'
                          )
                        loadCompanies();
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
                }
            })
        }
    }
})

updateCompany.addEventListener('click',async ()=>{
    const data = new FormData()
    const idUN = document.getElementById("id").value
    data.append('telefono',telefonoEdit.value)
    data.append('direccion',direccionEdit.value)
    data.append('id',idUN)
    let response = await fetch('/AppOffers/Home/updateEmpresa/',{
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
          loadCompanies()
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

const loadCompanies = async()=>{
    let response = await fetch('/AppOffers/Home/getCompanies')
    response = await response.json()
    if(response.status==203){
        const sectionCompanies= document.getElementById('companies-section')
        let html = ''
        for (const company of response.response.data) {
            //console.dir(company)
            html+=`<article class="col-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row mb-2">
                                    <div class="col-7">
                                        <span class="card-text font-weight-bold d-block" style="font-size:1.5em;">${company.razonSocial}</span>
                                        <span class="card-text d-block" style="font-size:0.9em;"> Ruc: ${company.ruc}</span>
                                        <span class="card-text d-block" style="font-size:0.9em;">Direccion: ${company.direccion}</span>
                                        <span class="card-text d-block" style="font-size:0.9em;">Teléfono: ${company.telefono}</span>
                                    </div>
                                    <div class="col-5 container-logo-company">
                                        <img src="/AppOffers/public/img/companies/${company.imagen}" class="img-fluid logo-company" alt="Logo">
                                    </div>
                                </div>
                                <div class="row mt-1" data-company-id=${company.idEmpresa}>
                                    <div class="col-4">
                                        <a href="/AppOffers/Home/index_detalles/${company.idEmpresa}" class="btn btn-outline-info col-10"><i class="fas fa-sign-in-alt" style="pointer-events:none;"></i> Detalles</a>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-outline-primary col-10 editCompany" data-toggle="modal" data-target="#editCompany"><i class="fas fa-pen-alt" style="pointer-events:none;"></i> Editar</button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-outline-danger col-10 deleteCompany" data-toggle="modal" data-target="#deleteCompany"><i class="fas fa-trash-alt" style="pointer-events:none;"></i> Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>`
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