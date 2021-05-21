<template>
  <layout ref="layout">
    <div slot="c_mi_menu_materiales">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>CONFERENCIA</strong>
          </div>
          <div class="card-title">PANEL DE CONFERENCIA</div>
          <div class="card-body card-block">
            <div class="form-row">
              <div class="form-group col-xs-4">
                <label for="text-input" class="form-control-label label-title"
                  >aqui ira conferencia</label
                >
              </div>
            </div>
          </div>

          <div class="card-title">PANEL DE MARCADO DE ASISTENCIA</div>
          <div class="card-body card-block">
            <div class="text-center mb-2">
              <button
                class="btn btn-action btn-icon-split"
                id="btnRegistrarAsistencia"
                @click="RegistrarAsistencia()"
              >
                <span class="icon text-white">
                  <i class="far fa-id-badge"></i>
                </span>
                <span class="text font-size-layout">Registrar Asistencia</span>
              </button>
            </div>
            <br />
            <br />
          </div>
        </div>
      </div>

      <!-- The Modal -->
      <div id="mdlRegistrarAsistencia" class="modal">
        <div class="modal-content w-50">
          <div class="modal-body">
            <div class="content" style="display: block">
              <div class="card">
                <div class="card-header">
                  <strong>MARCAR ASISTENCIA</strong>
                </div>
                <div class="card-body card-block">
                  <!-- <header class="container-header-asistencia">
                    <img v-bind:src="'/img/logo.svg'" alt="logo-principal" />
                  </header> -->
                  <div class="container-datetime">
                    <div class="widget">
                      <div class="fecha">
                        <p id="diaSemana" class="diaSemana"></p>
                        <p>,</p>
                        <p id="dia" class="dia"></p>
                        <p>de</p>
                        <p id="mes" class="mes"></p>
                        <p>del</p>
                        <p id="anio" class="anio"></p>
                      </div>
                      <div class="reloj">
                        <p id="horas" class="horas"></p>
                        <p>:</p>
                        <p id="minutos" class="minutos"></p>
                        <p>:</p>
                        <p id="segundos" class="segundos"></p>
                        <p id="ampm" class="ampm"></p>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <label class="form-control-label" for="inpDni">DNI</label>
                    <input
                      class="form-control center"
                      maxlength="8"
                      style="max-width: 200px"
                      id="inpDni"
                      oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      v-model="dni_uno"
                      disabled
                    />
                  </div>
                  <hr />
                  <div class="text-right">
                    <button
                      class="btn btn-action btn-icon-split font-size-layout"
                      value="Guardar"
                      @click="GuardarRegistro()"
                    >
                      <span class="icon text-white">
                        <i class="fas fa-save"></i>
                      </span>
                      <span class="text">Registrar</span>
                    </button>
                    <button
                      class="btn btn-cancel btn-icon-split font-size-layout"
                      type="button"
                      id="btnCancelarRegistro"
                    >
                      <span class="icon text-white">
                        <i class="fas fa-times"></i>
                      </span>
                      <span class="text">Cancelar</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>

<script>
import layout from "./Components/layout_usuarios";
export default {
  components: {
    layout,
  },
  props: {},
  data() {
    return {
      submitted: false,
      title_modal: null,
      dni_uno: null,
      frmRegistrarAsistencia: {
        modo: "NUEVO",
        dni: null,
      },
    };
  },
  mounted() {
    self = this;
    // this.frmRegistrarAsistencia.dni = this.$inertia.page.props.user_session.usuario_dni;
    //   console.log(this.frmRegistrarAsistencia.dni);
    $(function () {
      var actualizarHora = function () {
        var fecha = new Date(),
          hora = fecha.getHours(),
          minutos = fecha.getMinutes(),
          segundos = fecha.getSeconds(),
          diaSemana = fecha.getDay(),
          dia = fecha.getDate(),
          mes = fecha.getMonth(),
          anio = fecha.getFullYear(),
          ampm;

        var $pHoras = $("#horas"),
          $pSegundos = $("#segundos"),
          $pMinutos = $("#minutos"),
          $pAMPM = $("#ampm"),
          $pDiaSemana = $("#diaSemana"),
          $pDia = $("#dia"),
          $pMes = $("#mes"),
          $pAnio = $("#anio");
        var semana = [
          "domingo",
          "lunes",
          "martes",
          "miercoles",
          "jueves",
          "viernes",
          "sabado",
        ];
        var meses = [
          "enero",
          "febrero",
          "marzo",
          "abril",
          "mayo",
          "junio",
          "julio",
          "agosto",
          "septiembre",
          "octubre",
          "noviembre",
          "diciembre",
        ];

        $pDiaSemana.text(semana[diaSemana]);
        $pDia.text(dia);
        $pMes.text(meses[mes]);
        $pAnio.text(anio);
        if (hora >= 12) {
          hora = hora - 12;
          ampm = "PM";
        } else {
          ampm = "AM";
        }
        if (hora == 0) {
          hora = 12;
        }
        if (hora < 10) {
          $pHoras.text("0" + hora);
        } else {
          $pHoras.text(hora);
        }
        if (minutos < 10) {
          $pMinutos.text("0" + minutos);
        } else {
          $pMinutos.text(minutos);
        }
        if (segundos < 10) {
          $pSegundos.text("0" + segundos);
        } else {
          $pSegundos.text(segundos);
        }
        $pAMPM.text(ampm);
      };

      actualizarHora();
      var intervalo = setInterval(actualizarHora, 1000);
    });
 
 },
  methods: {
    hidenav() {
      return this.$refs.layout.hide_nav();
    },
    shownav() {
      return this.$refs.layout.show_nav();
    },
    RegistrarAsistencia() {
      this.submited = false;
      this.dni_uno = this.$inertia.page.props.user_session.usuario_dni;
      this.frmRegistrarAsistencia.dni = this.$inertia.page.props.user_session.usuario_dni;

      $("#mdlRegistrarAsistencia").css("display", "block");
      $("#btnCancelarRegistro").click(function () {
        $("#mdlRegistrarAsistencia").css("display", "none");
        $("#footer-navigator").css("display", "flex");
      });
      $("#footer-navigator").css("display", "none");
    },
    GuardarRegistro() {
      this.submited = true;
      self = this;
      let data = new FormData();
      data.append("dni", self.frmRegistrarAsistencia.dni);
      axios.post(route("asistencia.verificar"), data)
      .then(function (response) {
        let resultado = response.data;
        console.log(resultado);
        
        if (resultado == 'NO EXISTE') {
          Swal.fire({
            icon: "error",
            title: "¡Ups!",
            text: "El DNI ingresado no existe.",
          });
          return false;
        } else
        if (response.data == 'SI MARCADO') {
          console.log('si marcado')
          Swal.fire({
            icon: "warning",
            title: "¡Ups!",
            text: "Tu asistencia ya está registrada.",
          });
          return false;
        } else
        if (response.data == 'FUERA DE HORARIO') {
          Swal.fire({
            icon: "warning",
            title: "¡Ups!",
            text:
              "Usted se encuentra en fuera de horario, la operación no puede continuar.",
          });
          return false;
        } else
        
         if(response.data = 'NO MARCADO') {
            console.log('holi no marcado')
        //   console.log("resultado");
        //   let data = new FormData();
        //   data.append("dni", self.frmRegistrarAsistencia.dni);
          self.$inertia.post(route("asistencia.registrar"), data, {
            preserveScroll: true,
            onStart: (visit) => {
              let timerInterval;
              Swal.fire({
                title: "REGISTRANDO",
                html: "Espere porfavor...",
                timer: 5000,
                allowOutsideClick: false,
                timerProgressBar: true,
                didOpen: () => {
                  Swal.showLoading();
                  timerInterval = setInterval(() => {
                    const content = Swal.getContent();
                    if (content) {
                      const b = content.querySelector("b");
                      if (b) {
                        b.textContent = Swal.getTimerLeft();
                      }
                    }
                  }, 100);
                },
                willClose: () => {
                  clearInterval(timerInterval);
                },
              });
            },
            onSuccess: () => {
              Swal.fire({
                icon: "success",
                title: "¡ÉXITO!",
                allowOutsideClick: false,
                // preConfirm: (result) => {
                  
                // },
              });
            },
          });
        }
      });




    },
  },
};
</script>
<style lang="css">
.container-datetime {
  position: relative;
  background-color: transparent;
  width: 100%;
  height: 8rem;
  margin: 0;
  padding: 0;
  margin-top: 1.5rem;
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
  color: black;
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
  color: black;
}
@media (max-width: 400px) {
  .container-datetime {
    margin-top: 0.5rem;
    font-size: 1rem;
    height: 5rem;
  }
}
</style>

