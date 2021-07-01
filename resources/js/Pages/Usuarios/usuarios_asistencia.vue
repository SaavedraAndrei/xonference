<template>
  <layout ref="layout">
    <div slot="c_mi_menu_materiales">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>CONFERENCIA DE {{nombre}}</strong>
          </div>
          <div class="card-title">PANEL DE CONFERENCIA</div>
          <div class="card-body card-block">
            <div class="form-row">
              <div class="meet-container">
                <div
                  id="meet"
                  class="meet-body"
                  style="align: center; margin: 0 auto:"
                ></div>
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
          <br>
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
  props: {
    datos_fecha: Array,
  },
  data() {
    return {
      submitted: false,
      title_modal: null,
      nombre: [],
      dni_uno: null,
      id:[],
      frmRegistrarAsistencia: {
        modo: "NUEVO",
        dni: null,
      },
    };
  },
  mounted() {
    this.nombre= this.datos_fecha[0].nombre;
    this.id= this.datos_fecha[0].id;
    self = this;

    const domain = "8x8.vc";
    const options = {
      roomName:
        "vpaas-magic-cookie-7ae1fe3f898449ef82ec67cded0ac6f5/AndreiMeet",
      parentNode: document.querySelector("#meet"),
      jwt: "eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtN2FlMWZlM2Y4OTg0NDllZjgyZWM2N2NkZWQwYWM2ZjUvZDBjYTI2IiwidHlwIjoiSldUIiwiYWxnIjoiUlMyNTYifQ.eyJhdWQiOiJqaXRzaSIsImNvbnRleHQiOnsidXNlciI6eyJpZCI6IjBmOGI3NzYwLWMxN2YtNGExMi1iMTM0LWM2YWMzNzE2NzE0NCIsIm5hbWUiOiJBbmRyZWkgU2FhdmVkcmEiLCJhdmF0YXIiOiJodHRwczovL2xpbmsudG8vdXNlci9hdmF0YXIvcGljdHVyZSIsImVtYWlsIjoiNzM0NTUwNzNAY29udGluZW50YWwuZWR1LnBlIiwibW9kZXJhdG9yIjoidHJ1ZSJ9LCJmZWF0dXJlcyI6eyJsaXZlc3RyZWFtaW5nIjoidHJ1ZSIsInJlY29yZGluZyI6InRydWUifX0sImV4cCI6MTY5NjI4NDA1MiwiaXNzIjoiY2hhdCIsIm5iZiI6MTU5NjE5NzY1Miwicm9vbSI6IioiLCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtN2FlMWZlM2Y4OTg0NDllZjgyZWM2N2NkZWQwYWM2ZjUifQ.tHYgtlk8GfS76ykpSCK-GruyqvG8OCCZ3Jx3uUt4AnOoOqSGg-Gui3epklYrhqbxErmrG3wcXTsmqGhb94CMcj417QuxWiq8vpiGaM1sOf7D_b1oY7TiEW69JNBGbo8RHFY76hGwrVNRm2VuJJblNwobTJvmiv-6AqgUixeMwgaDwysKhb5pF7aR53ioMJQS4dNTrPSnWSQ_6VZnR-shhv5MhHKmz6O_U6SwKLxtfEM9NKeEofX3bHJ0Njuni59hWtRV_fOAwry7SrUItOfptrink6MzAFP4a5TGP2qV6FAMNBoLqXiBefrThvZGmDV5jP8YV8dM7dBPuldBHXq6DOxtdC0Xr6sc32CO5d-u4qM2ByYHmUP6-eiwm7tuVE-I14QJbmL8v0O_kHiFMTghp4Jx0M9c6SbY5Jqn_L-p2NbrE5AbAmft6h2jRfGg2UdUnNNk7EVrOm_wHCW3p9hMoJzzSLTJnhyS39fisKd1Jiq5_IAu_bTnA5BFVRjGTRiTuLHylxTG_N-Da238XBVjwyc4j4Csg3Ftc2LYSiE2ZABB8fncWuZZiscaenusj8XfDAxuFh3RTxA7PaKDEpJ_7hIU0xNj4BNLhpoR-3exAI2v36cEQLNwpVdxBz1sg4zBSlZY0cgC8zvLrtHDGVwSuOQsxv4fPs61ls-bAv8I5Po",
    };

    const api = new JitsiMeetExternalAPI(domain, options);

    window.onload = () => {
      initIframeAPI();
    };
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
      this.frmRegistrarAsistencia.dni =
        this.$inertia.page.props.user_session.usuario_dni;

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
      axios
      .post(route("asistencia.verificar"), data)
      .then(function (response) {
        let resultado = response.data;
        console.log(resultado);

        if (resultado == "NO EXISTE") {
          Swal.fire({
            icon: "error",
            title: "¡Ups!",
            text: "El DNI ingresado no existe.",
          });
          return false;
        } else if (response.data == "SI MARCADO") {
          console.log("si marcado");
          Swal.fire({
            icon: "warning",
            title: "¡Ups!",
            text: "Tu asistencia ya está registrada.",
          });
          return false;
        } else if (response.data == "FUERA DE HORARIO") {
          Swal.fire({
            icon: "warning",
            title: "¡Ups!",
            text: "Usted se encuentra en fuera de horario, la operación no puede continuar.",
          });
          return false;
        } else if (response.data != "NO MARCADO") {
          console.log("holi no marcado");
          //   console.log("resultado");
          //   let data = new FormData();
          //   data.append("dni", self.frmRegistrarAsistencia.dni);
          data.append("evento", self.id);
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
.jitsi-meet {
  width: 100% !important;
  margin: 0 auto;
  text-align: center;
}

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

