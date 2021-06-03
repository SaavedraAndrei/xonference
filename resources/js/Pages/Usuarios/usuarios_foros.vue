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
                  >PREGUNTA</label
                >
                <textarea
                  type="text"
                  id="inpUsuario"
                  name="nombres"
                  class="form-control center"
                  :value="pregunta_muostrar"
                  disabled
                ></textarea>
                <input  a type="hidden" name="dni" class="form-control" />
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
                  disabled
                />
              </div>
              <div class="form-group col-xs-4">
                <label for="lblCargo" class="form-control-label label-title"
                  >CARGO</label
                >
                <input
                  type="text"
                  id="inpCargo"
                  name="cargos"
                  class="form-control center"
                  style="width: 250px"
                  v-for="datosUsuario in datosUsuarios"
                  :key="datosUsuario.dni"
                  :value="datosUsuario.nombre_cargo"
                  disabled
                />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-xs-4">
                <label
                  for="text-input"
                  class="form-control-label label-title"
                />{{ pregunta_muostrar }}

                <!-- <input
                  type="text"
                  id="inpPregunta"
                  v-model="pregunta_muostrar"
                  disable
                /> -->
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
            <br />
          </div>
        </div>

        <!-- The Modal -->
        <div id="modalRegistrarPermiso" class="modal">
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
                        id="txtIdPermiso"
                        hidden
                        v-model="frmResponderForo.id"
                      />
                      <div class="col form-group">
                        <label class="form-control-label label-title"
                          >RESPONDER</label
                        >
                        <textarea
                          class="form-control"
                          type="text"
                          name="permiso"
                          style="max-width: 400px"
                          maxlength="150"
                          id="txtNombrePermiso"
                          v-model="frmResponderForo.respuesta"
                          placeholder="Ingrese el nombre del permiso"
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
      title_modal: "RESPUESTA",
      pregunta_muostrar: null,
      frmResponderForo: {
        id: "",
        respuesta: "",
        modal: "",
      },
    };
  },
  mounted() {
    this.pregunta_muostrar = this.preguntas[0].pregunta;
    // console.log(this.pregunta_muostrar);
  },
  methods: {
    ResponderForo() {
      console.log("hola"), (this.submited = false);
      this.title_modal = "RESPUESTA";
      this.frmResponderForo.id = 0;
      this.frmResponderForo.respuesta = "";
      this.frmResponderForo.modal = "AGREGAR";

      document.getElementById("modalRegistrarPermiso").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalRegistrarPermiso").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
  },
};
</script>

<style>
</style>