<template>
  <layout ref="layout">
    <div slot="c_foros">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>FORO</strong>
          </div>
          <div class="card-title">PANEL DE PREGUNTAS</div>
          <div class="card-body card-block">
            <div class="form-row">
              <div class="form-group col-xs-4">
                <label for="lblUsuario" class="form-control-label label-title"
                  >PREGUNTA:</label
                >
                <label
                  id="inpUsuario"
                  name="nombres"
                  class="form-control-label label-title"
                  style="max-width: 400px"
                  :value="pregunta_muostrar"
                  disabled
                  >{{ pregunta_muostrar }}</label
                >
                <input a type="hidden" name="dni" class="form-control" />
              </div>
            </div>
            <label class="form-control-label"
              >------------------------------------------------------------------------------------------------------------------------</label
            >
            <div class="form-row">
              <div class="form-group col-xs-4">
                <label for="lblAgencia" class="form-control-label label-title"
                  >CONFERENCIA</label
                >
                <input
                  type="text"
                  id="inpAgencia"
                  name="conferencia"
                  class="form-control center"
                  style="width: 250px"
                  :value="pregunta_conferencia"
                  disabled
                />
              </div>
            </div>
          </div>

          <div class="card-title">PANEL DE RESPUESTAS</div>
          <div class="card-body card-block">
            <div class="text-center mb-2">
              <button
                class="btn btn-action btn-icon-split"
                id="btnRegistrarAsistencia"
                @click="ResponderForo()"
              >
                <span class="icon text-white">
                  <i class="far fa-id-badge"></i>
                </span>
                <span class="text font-size-layout">Responder foro</span>
              </button>
            </div>
            <br />
          </div>
          <div id="tabla_permisos">
            <table class="table table-hover" id="tblPreguntas">
              <thead>
                <tr>
                  <th>EDITAR</th>
                  <th>TITULO</th>
                  <th>USUARIO</th>
                  <!-- <th>CONFERENCIA</th> -->
                </tr>
              </thead>
              <tbody>
                <tr v-for="respuesta in listar_respuestas" :key="respuesta.id">
                  <td class="table-bordered" align="center">
                    <button
                      class="btn btn-action btn-icon-split"
                      @click="EditarRespuesta(respuesta)"
                    >
                      <span class="icon text-white-50">
                        <i class="fas fa-edit" style="color: white"></i>
                      </span>
                    </button>
                  </td>
                  <td class="table-bordered" align="center">
                    {{ respuesta.titulo }}
                  </td>
                  <td class="table-bordered" align="center">
                    {{ respuesta.nombres + " " +respuesta.apellidoPaterno }}
                  </td>
                  <!-- <td class="table-bordered" align="left"> -->
                    <!-- {{ pregunta.nombreConferencia }} -->
                  <!-- </td> -->
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- The Modal -->
        <div id="modalResponderPregunta" class="modal">
          <!-- Modal content -->
          <div class="modal-content w-36">
            <div class="modal-body">
              <div class="content" style="display: block">
                <div class="card">
                  <div class="card-header">
                    <div id="c_titulo">
                      <strong id="title">{{ title_modal }}</strong>
                    </div>
                  </div>
                  <div class="card-title">DATOS DEL PERMISO</div>
                  <div class="card-body card-block">
                    <form @submit.prevent="GuardarRespuesta">
                      <input
                        type="text"
                        id="txtModal"
                        v-model="frmResponderForo.modal"
                        hidden
                      />
                      <input
                        type="text"
                        id="txtId"
                        hidden
                        v-model="frmResponderForo.id"
                      />
                      <input
                        type="text"
                        id="txtEvento"
                        hidden
                        v-model="frmResponderForo.idEvento"
                      />
                      <div class="col form-group">
                        <label class="form-control-label label-title"
                          >TITULO</label
                        >
                        <input
                          class="form-control"
                          type="text"
                          name="permiso"
                          style="max-width: 400px"
                          maxlength="150"
                          id="inpTitulo"
                          v-model="frmResponderForo.titulo"
                          placeholder="Ingrese un titulo a su respuesta"
                        />
                      </div>
                      <div class="col form-group">
                        <label class="form-control-label label-title"
                          >RESPONDER</label
                        >
                        <textarea
                          class="form-control"
                          type="text"
                          name="permiso"
                          style="max-width: 400px"
                          id="txtNombrePermiso"
                          v-model="frmResponderForo.respuesta"
                          placeholder="Ingrese su respuesta"
                        ></textarea>
                      </div>
                    </form>
                    <hr />
                    <div class="text-right">
                      <button
                        class="btn btn-action btn-icon-split mb-1"
                        id="btnGuardarCambios"
                        @click="GuardarRespuesta()"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-save" style="color: white"></i>
                        </span>
                        <span class="text">Guardar</span>
                      </button>
                      <button
                        class="btn btn-cancel btn-icon-split mb-1"
                        id="btnCancelar"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-times" style="color: white"></i>
                        </span>
                        <span class="text" style="color: white">Cancelar</span>
                      </button>
                    </div>
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
    preguntas: Array,
    respuestas: Array,
  },
  data() {
    return {
      submited: false,
      title_modal: "",
      listar_respuestas: this.respuestas,
      pregunta_muostrar: null,
      pregunta_conferencia: null,
      frmResponderForo: {
        id: "",
        titulo: "",
        respuesta: "",
        modal: "",
        idEvento:"",
      },
    };
  },
  mounted() {
    // this.frmResponderForo.idEvento = this.preguntas[0].idEvento;
    this.pregunta_muostrar = this.preguntas[0].pregunta;
    this.pregunta_conferencia = this.preguntas[0].nombreConferencia;
    // console.log(this.pregunta_muostrar);
  },
  methods: {
    ResponderForo() {
      // console.log("hola"), (this.submited = false);
      this.title_modal = "AGREGAR RESPUESTA";
      this.frmResponderForo.id = 0;
      this.frmResponderForo.titulo = "";
      this.frmResponderForo.respuesta = "";
      this.frmResponderForo.idEvento = this.preguntas[0].idEvento;
      this.frmResponderForo.modal = "AGREGAR";

      document.getElementById("modalResponderPregunta").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalResponderPregunta").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    EditarRespuesta(respuesta) {
      this.title_modal = "EDITAR RESPUESTA";
      this.frmResponderForo.id = respuesta.id;
      this.frmResponderForo.titulo = respuesta.titulo;
      this.frmResponderForo.respuesta = respuesta.respuesta;
      this.frmResponderForo.idEvento = this.preguntas[0].idEvento;
      this.frmResponderForo.modal = "EDITAR";

      document.getElementById("modalResponderPregunta").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalResponderPregunta").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    GuardarRespuesta() {
      this.submited = true;
      var self = this;
      //   {
      Swal.fire({
        title: "GUARDAR CAMBIOS",
        text: "¿Desea continuar?",
        confirmButtonText:
          '<i class="fas fa-check" style="color:white;"></i>   Si',
        confirmButtonColor: "var(--colorAlto)",
        showCancelButton: true,
        cancelButtonText: '<i class="fas fa-times"></i>   No',
        cancelButtonColor: "var(--plomoOscuroEmpresarial)",
        allowOutsideClick: false,
        preConfirm: (result) => {
          self.$inertia.post(
            route("foros.guardar_respuesta"),
            self.frmResponderForo,
            {
              preserveScroll: true,
              onStart: (visit) => {
                let timerInterval;
                Swal.fire({
                  title: "EN PROGRESO",
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
                  preConfirm: (result) => {
                    self.submited = false;
                    $("#modalResponderPregunta").css("display", "none");
                    $("#footer-navigator").css("display", "flex");
                  },
                });
              },
            }
          );
        },
      });
    },
  },
};
</script>

<style>
</style>