
const loadCompany = async()=>{
    let response = await fetch('/AppOffers/Home/getCompany_solicitud/'+location.pathname.substr(1).split('/')[3])
    response = await response.json()
    console.log(response)
    if(response.status==203){
        const empresa=response.response.data
        document.getElementById("imagen").src="/AppOffers/Public/img/companies/"+empresa.imagen
        document.getElementById("razonSocial").innerHTML=empresa.razonSocial
        document.getElementById("ruc").innerHTML=empresa.ruc
        document.getElementById("direccion").innerHTML=empresa.direccion
        document.getElementById("telefono").innerHTML=empresa.telefono
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
    loadCompany()
})


