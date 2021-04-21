document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
})

function iniciarApp() {
    
    registroSeccion();
}

function registroSeccion() {
    
    const nombre = document.querySelector('#nombre');
    const apellido = document.querySelector('#apellido');
    const email = document.querySelector('#email');

    const pase_dia = document.querySelector('#pase_dia');
    const pase_completo = document.querySelector('#pase_completo');
    const pase_dosdias = document.querySelector('#pase_dosdias');

    const btnCalcular = document.querySelector('#calcular');
    const errorDiv = document.querySelector('.error');
    const btnRegistro = document.querySelector('#btnRegistro');
    const listaProductosDiv = document.querySelector('.lista-productos');
    const sumaTotalDiv = document.querySelector('.suma-total');

    const etiquetas = document.querySelector('#etiquetas');
    const camisas = document.querySelector('#camisa_evento');
    const regalo = document.querySelector('#regalo');

    

    if (document.querySelector('#calcular')) {
        btnCalcular.addEventListener('click', calcularMontos);

        function calcularMontos(e) {
        
            if (regalo.value === '') {
                alert('Debes elegir un regalo');
                regalo.focus();  
            }else{
                const boletosDia = parseInt(pase_dia.value);
                const boletosCompleto = parseInt(pase_completo.value);
                const boletosDosDias = parseInt(pase_dosdias.value);
                const cantEtiquetas = parseInt(etiquetas.value);
                const cantCamisas = parseInt(camisas.value);
    
    
                let precioTotal = (boletosDia * 30)  +  (boletosCompleto* 50) + (boletosDosDias * 45) +
                ((cantCamisas * 10) * 0.93) + (cantEtiquetas * 2);
                
    
               let listadoProductos = [];
    
                if (boletosDia >= 1) {
                    listadoProductos = [...listadoProductos, boletosDia + ' Pase(s) por día'];
                }
    
                if (boletosCompleto >= 1) {
                    listadoProductos = [...listadoProductos, boletosCompleto + ' Pase(s) completos'];
                }
    
                if (boletosDosDias >= 1) {
                    listadoProductos = [...listadoProductos, boletosDosDias + ' Pase(s) por dos día'];
                }
    
                if (cantEtiquetas >= 1) {
                    listadoProductos = [...listadoProductos, cantEtiquetas + ' Etiqueta(s)'];
                }
    
    
                if (cantCamisas >= 1) {
                    listadoProductos = [...listadoProductos, cantCamisas + ' Camisa(s)'];
                }
    
                listaProductosDiv.innerHTML = '';
                // const contenidoProductos = document.createElement('P');
                // contenidoProductos.classList.add('contenido-productos');
    
    
                for (let i = 0; i < listadoProductos.length; i++) {
                    listaProductosDiv.innerHTML += listadoProductos[i]+ '</br>';
                     
                }
                
    
               sumaTotalDiv.innerHTML = "$" + precioTotal.toFixed(2);
            }
        }
    }

    
}

