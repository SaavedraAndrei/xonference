<template>
  <layout ref="layout">
    <div slot="c_mi_menu_materiales">
       <div class="content" style="display: block">
         <h1>HOLA MUNDO</h1>
       </div>
       </div>
  </layout>
</template>

<script>
import layout from "./Components/layout_usuarios";
export default {
  components: {
    layout
  }
//   data() {
//     return {
//       dni: null
//     };
//   },
//   mounted() {
//     document.title = "Registrar asistencia";
//     $(function() {
//       var actualizarHora = function() {
//         var fecha = new Date(),
//           hora = fecha.getHours(),
//           minutos = fecha.getMinutes(),
//           segundos = fecha.getSeconds(),
//           diaSemana = fecha.getDay(),
//           dia = fecha.getDate(),
//           mes = fecha.getMonth(),
//           anio = fecha.getFullYear(),
//           ampm;

//         var $pHoras = $("#horas"),
//           $pSegundos = $("#segundos"),
//           $pMinutos = $("#minutos"),
//           $pAMPM = $("#ampm"),
//           $pDiaSemana = $("#diaSemana"),
//           $pDia = $("#dia"),
//           $pMes = $("#mes"),
//           $pAnio = $("#anio");
//         var semana = [
//           "domingo",
//           "lunes",
//           "martes",
//           "miercoles",
//           "jueves",
//           "viernes",
//           "sabado"
//         ];
//         var meses = [
//           "enero",
//           "febrero",
//           "marzo",
//           "abril",
//           "mayo",
//           "junio",
//           "julio",
//           "agosto",
//           "septiembre",
//           "octubre",
//           "noviembre",
//           "diciembre"
//         ];

//         $pDiaSemana.text(semana[diaSemana]);
//         $pDia.text(dia);
//         $pMes.text(meses[mes]);
//         $pAnio.text(anio);
//         if (hora >= 12) {
//           hora = hora - 12;
//           ampm = "PM";
//         } else {
//           ampm = "AM";
//         }
//         if (hora == 0) {
//           hora = 12;
//         }
//         if (hora < 10) {
//           $pHoras.text("0" + hora);
//         } else {
//           $pHoras.text(hora);
//         }
//         if (minutos < 10) {
//           $pMinutos.text("0" + minutos);
//         } else {
//           $pMinutos.text(minutos);
//         }
//         if (segundos < 10) {
//           $pSegundos.text("0" + segundos);
//         } else {
//           $pSegundos.text(segundos);
//         }
//         $pAMPM.text(ampm);
//       };

//       actualizarHora();
//       var intervalo = setInterval(actualizarHora, 1000);
//     });

//     this.EstablecerCamara();
//   },

//   methods: {
//     EstablecerCamara() {
//       if (screen.width <= 400) {
//         Webcam.set({
//           width: 150,
//           height: 150,
//           image_format: "jpeg",
//           jpeg_quality: 90
//         });
//         Webcam.attach("#my_camera");
//       } else {
//         Webcam.set({
//           width: 320,
//           height: 240,
//           image_format: "jpeg",
//           jpeg_quality: 90
//         });
//         Webcam.attach("#my_camera");
//       }
//     },
//     RegistrarAsistencia() {
//       self = this;
//       Webcam.snap(function(data_uri) {
//         axios
//           .post("/marcado_asistencia/verificar_usuario_asistencia", {
//             dni: $("#txtAsistenciaDni").val()
//           })
//           .then(function(response) {
//             let resultado = response.data;
//             // console.log(resultado);
//             if (resultado == "SIN TOKEN") {
//               Swal.fire({
//                 icon: "info",
//                 title: "¡Ups!",
//                 text:
//                   "No se puede realizar el proceso, debe validar el token de acceso."
//               });
//               return false;
//             } else if (resultado == "NO EXISTE") {
//               Swal.fire({
//                 icon: "error",
//                 title: "¡Ups!",
//                 text: "El DNI ingresado no existe, intente nuevamente."
//               });
//               return false;
//             } else if (resultado == "SI MARCADO") {
//               Swal.fire({
//                 icon: "warning",
//                 title: "¡Ups!",
//                 text:
//                   "Tu asistencia ya está registrada, intente en otro momento."
//               });
//               return false;
//             } else if (resultado == "FUERA DE HORARIO") {
//               Swal.fire({
//                 icon: "warning",
//                 title: "¡Ups!",
//                 text:
//                   "Usted se encuentra en fuera de horario, la operación no puede continuar."
//               });
//               return false;
//             } else if (resultado == "NO MARCADO") {
//               let data = new FormData();

//               data.append("dni", $("#txtAsistenciaDni").val());
//               data.append("foto", data_uri);

//               self.$inertia.post(route("registrar_asistencia"), data, {
//                 preserveScroll: true,
//                 onStart: visit => {
//                   let timerInterval;
//                   Swal.fire({
//                     title: "REGISTRANDO",
//                     html: "Espere porfavor...",
//                     timer: 5000,
//                     allowOutsideClick: false,
//                     timerProgressBar: true,
//                     didOpen: () => {
//                       Swal.showLoading();
//                       timerInterval = setInterval(() => {
//                         const content = Swal.getContent();
//                         if (content) {
//                           const b = content.querySelector("b");
//                           if (b) {
//                             b.textContent = Swal.getTimerLeft();
//                           }
//                         }
//                       }, 100);
//                     },
//                     willClose: () => {
//                       clearInterval(timerInterval);
//                     }
//                   });
//                 },
//                 onSuccess: () => {
//                   Swal.fire({
//                     icon: "success",
//                     title: "¡ÉXITO!",
//                     allowOutsideClick: false,
//                     preConfirm: result => {
//                       $("#txtAsistenciaDni").val(null);
//                     }
//                   });
//                 }
//               });
//             }
//           });
//       });
//     }
//   }
};
</script>


<style lang="css">
/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/

* {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}

html {
  font-size: 62.5%; /*Rest para REMS - 62.5% = 10px de 16px*/
}

body,
html {
  width: 100%;
  height: 100%;
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

body {
  background-image: url(/img/asistencia/fondo.png);
}

.container-header-asistencia {
  height: 5rem;
  background-color: transparent;
}

.container-header-asistencia img {
  position: relative;
  margin-left: 30%;
  width: 40%;
  padding: 1rem;
}

.container-datetime {
  position: relative;
  background-color: transparent;
  width: 100%;
  height: 7rem;
  margin: 0;
  padding: 0;
  margin-top: 5rem;
  font-size: 2rem;
}

.widget {
  width: 100%;
  height: auto;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}
.widget p {
  display: inline-block;
  margin: 0px;
}
.fecha {
  font-family: arial;
  text-align: center;
  background: transparent;
  color: white;
  width: 100%;
  height: fit-content;
}
.reloj {
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
  width: 100%;
  font-size: 2.6rem;
  height: fit-content;
  text-align: center;
  background: transparent;
  color: white;
}

.container-camara {
  position: absolute;
  margin-top: 2rem;
  background-color: transparent;
  left: -6rem;
  width: 20%;
}
.container-register-asistencia {
  position: absolute;
  margin-top: 2.5rem;
  width: 50%;
  height: 23rem;
  color: white;
  right: 0.5rem;
  padding: 0;
  background-color: rgba(229, 224, 224, 0.3);
  border-color: white;
  border-style: solid;
  border-width: 1px;
  border-radius: 2%;
}

.register-heading {
  position: relative;
  margin-top: 25%;
  width: 100%;
  text-align: center;
  font-size: 1.6rem;
}

.input-number {
  position: relative;
  margin-left: 5%;
  margin-top: 10%;
  margin-bottom: 10%;
  width: 90%;
  height: 4rem;
  text-align: center;
  font-size: 1.5rem;
}

.action-button {
  position: relative;
  margin-left: 5%;
  width: 90%;
  height: 4rem;
  font-size: 1.6rem;
}

.container-footer {
  position: absolute;
  bottom: 0;
  width: 9rem;
  background-color: orange;
}

@media (max-width: 400px) {
  .container-header-asistencia {
    height: 4rem;
  }
  .container-datetime {
    margin-top: 0.5rem;
    font-size: 1rem;
    height: 5rem;
  }

  .container-camara {
    margin-top: 0rem;
    left: 0rem;
  }

  .container-register-asistencia {
    margin-top: 0rem;
    height: 17rem;
  }

  .container-register-asistencia h1 {
    margin-top: 2rem;
    font-size: 1.2rem;
  }

  .message {
    display: none;
  }
}
</style>