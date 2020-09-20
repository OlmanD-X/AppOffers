const selectCat= $('#selectcategoria').select2()
const selectSubcat= $('#selectsubcategoria').select2()
const sectionCaracteristica= document.getElementById('cuerpo')
const btnNewSolicitud = document.getElementById('newSolicitud')

const loadCategorias = async ()=>{
    // const idSubcategoria=$("#selectsub").val();
    let response = await fetch(`/AppOffers/Caracteristica/getAllCategoria`)
    response = await response.json()
    if(response.status==203){
        for (const item of response.response.data) {
            var data = {
                id: item.idCategoria,
                text: item.descripcion
            };
            var newOption = new Option(data.text, data.id, false, false)
            selectCat.append(newOption)
        }
        selectCat.trigger('change');
    }
}

loadCategorias()

$('#selectcategoria').on('change', async function (e) {
    $('#selectsubcategoria').empty();
    if(selectCat.val()!=""){
        var data = {
            id: "",
            text: "Seleccione una subcategoria"
        };
        var newOption = new Option(data.text, data.id, false, false)
        selectSubcat.append(newOption)
        let response = await fetch(`/AppOffers/Caracteristica/getAllSubcategoriaByCategory/${selectCat.val()}`)
        response = await response.json()
        if(response.status==203){
            for (const item of response.response.data) {
                var data = {
                        id: item.idSubcategoria,
                        text: item.descripcion
                };
                var newOption = new Option(data.text, data.id, false, false)
                selectSubcat.append(newOption)
            }
            selectSubcat.trigger('change');
            document.getElementById('cmbSub').hidden = false
        }
    }   
  });

  $('#selectsubcategoria').on('change', async function (e) {
    sectionCaracteristica.innerHTML = ''
    if(selectSubcat.val()!=""){
        let response = await fetch(`/AppOffers/Caracteristica/getCaracteristica/${selectSubcat.val()}`)
        response = await response.json()
        if(response.status==203){
                let html = ''
                for (const item of response.response.data) {
                    html+=`<div class="form-group">
                    <div class="row">
                        <div class="row col-12">
                            <label class="col-3 descripcion" data-carac-id="${item.idCaracteristica}">${item.descripcion}</label>
                            <input type="text" name="" class="form-control col-9 valor" onkeypress="return LetrasNumeros(event)">
                        </div>
                    </div>
                    </div>`
                }
                sectionCaracteristica.innerHTML = html
        }
    }   
  });

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

 btnNewSolicitud.addEventListener('click',async ()=>{
    let idSubcat = selectSubcat.val()
    let arrayDatosCaracteristicas=[]
    let arrayCaracteristicas = document.querySelectorAll('.valor')
    let arrayLabels = document.querySelectorAll('.descripcion')
    for(let i=0; i<arrayCaracteristicas.length;i++){
        let obj = {caract:arrayLabels[i].getAttribute('data-carac-id'),valor:arrayCaracteristicas[i].value}
        arrayDatosCaracteristicas.push(obj)
    }
    const data = new FormData()
    data.append('subcategoria',idSubcat)
    data.append('datos',JSON.stringify(arrayDatosCaracteristicas))
    let response = await fetch('/AppOffers/Cotizaciones/addSolicitacion',{
        method:'POST',
        body : data,
    })
    response = await response.json()
    if(response.status==203){
                
    }
 })