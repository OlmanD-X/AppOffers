document.addEventListener('DOMContentLoaded',()=>{
    loadUsuarios()
})

document.getElementById('usuarios-section').addEventListener('click',async (e)=>{
    if(e.target.type == "button"){
        if(e.target.classList.contains('editusuario')){
            const idUN = e.target.parentElement.parentElement.getAttribute('data-usuario-id');
            let response = await fetch('/AppOffers/Usuarios/getUsuario/'+idUN)
            
            response = await response.json()
                if(response.status==203){
                    const company=response.response.data
                    document.getElementById("id").value=company.idUsuario
                    document.getElementById("usuarioEdit").value=company.usuario
                }
                else{
                    Swal.fire(
                        'Error',
                        response.response.message,
                        'error'
                    )
                }     
        }
        else if(e.target.classList.contains('deleteUsuario')){
            const id = e.target.parentElement.parentElement.getAttribute('data-usuario-id');
            Swal.fire({
                title: `Desea eliminar Usuario ${id}?`,
                text: "Confirme para eliminar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar'
            }).then(async (result) => {
                if (result.value) {
                    let response = await fetch('/AppOffers/Usuarios/deleteUsuario/'+id,{
                        method:'POST'
                    })
                    response = await response.json()
                    if(response.status==202){
                        Swal.fire(
                            'Se elimino el registro',
                            response.response.message,
                            'success'
                          )
                        loadUsuarios();
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

const loadUsuarios = async()=>{
    let response = await fetch('/AppOffers/Usuarios/getUsuarios')
    response = await response.json()
    if(response.status==203){
        const sectionUsuarios= document.getElementById('usuarios-section')
        let html = ''
        for (const usuario of response.response.data) {
            //console.dir(usuario)
            html+=`<article class="col-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row mb-2">
                                    <div class="col-7">
                                        <span class="card-text font-weight-bold d-block" style="font-size:1.5em;">${usuario.razonSocial}</span>
                                        <span class="card-text d-block" style="font-size:0.9em;"> Usuario: ${usuario.usuario}</span>
                                        <span class="card-text d-block" style="font-size:0.9em;">Tipo de usuario: ${usuario.descripcion}</span>
                                        <span class="card-text d-block" style="font-size:0.9em;">Estado:<i class="fas fa-check"></i> </span>
                                    </div>
                                    <div class="col-5 container-logo-usuario">
                                        <img src="/AppOffers/public/img/companies/${usuario.imagen}" width="150px" height="120px" alt="${usuario.imagen}">
                                    </div>
                                </div>
                                <div class="row mt-1" data-usuario-id=${usuario.idUsuario}>
                                    <div class="col-8">
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-outline-primary col-10 editusuario" data-toggle="modal" data-target="#editusuario"><i class="fas fa-pen-alt" style="pointer-events:none;"></i></button>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-outline-danger col-10 deleteUsuario" data-toggle="modal" data-target="#deleteUsuario"><i class="fas fa-trash-alt" style="pointer-events:none;"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>`
        }
        sectionUsuarios.innerHTML = html
    }
    else{
        Swal.fire(
            'Error',
            response.response.message,
            'error'
          )
    }
}
/*
btnAddCompany.addEventListener('click',async (e)=>{
    const firstName = document.getElementById('firstName')
    const lastName = document.getElementById('lastName')
    const email = document.getElementById('email')
    const usuario = document.getElementById('usuario')
    const password = document.getElementById('password')
    const idtipo = document.getElementById('idtipo')
    const idempresa = document.getElementById('idempresa')
    const data = new FormData()
    data.append('firstName',firstName.value)
    data.append('lastName',lastName.value)
    data.append('email',email.value)
    data.append('usuario',usuario.value)
    data.append('password',password.value)
    data.append('idtipo',idtipo.value)
    data.append('idempresa',idempresa.value)

    let response = await fetch('/AppOffers/Usuarios/addUsuario',{
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
        loadUsuarios()
        firstName.value = ''
        lastName.value = ''
        email.value = ''
        usuario.value = ''
        password.value = ''
        idtipo.value= ''
        idempresa.value= ''
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
*/
