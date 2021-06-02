<template>
  <layout ref="layout">
    <div slot="c_foros_admin">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>FORO</strong>
          </div>
          <div class="card-title">PANEL DE PREGUNTAS</div>
          <div class="card-body card-block">
            <div class="text-center mb-2">
              <button
                class="btn btn-action btn-icon-split"
                id="btnRegistrarAsistencia"
                @click="NuevaPregunta()"
              >
                <span class="icon text-white">
                  <i class="far fa-id-badge"></i>
                </span>
                <span class="text font-size-layout">Agregar pregunta</span>
              </button>
            </div>

            <div id="tabla_permisos">
              <table class="table table-hover" id="tblPreguntas">
                <thead>
                  <tr>
                    <th>EDITAR</th>
                    <th>PREGUNTA</th>
                    <th>PONENTE</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="pregunta in listar_preguntas" :key="pregunta.id">
                    <td class="table-bordered" align="center">
                      <button
                        class="btn btn-action btn-icon-split"
                        @click="EditarPregunta(pregunta)"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-edit" style="color: white"></i>
                        </span>
                      </button>
                    </td>
                    <td class="table-bordered" align="center">
                      {{ pregunta.pregunta }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ pregunta.dni_ponente }}
                    </td>
                  </tr>
                </tbody>
              </table>
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
                    <form @submit.prevent="GuardarPregunta">
                      <input
                        type="text"
                        id="txtModal"
                        v-model="frmRegistrarPregunta.modal"
                        hidden
                      />
                      <input
                        type="text"
                        id="txtIdPermiso"
                        hidden
                        v-model="frmRegistrarPregunta.id"
                      />
                      <div class="col form-group">
                        <label class="form-control-label label-title"
                          >ESCRIBIR PREGUNTA</label
                        >
                        <textarea
                          class="form-control"
                          type="text"
                          name="permiso"
                          style="max-width: 400px"
                          maxlength="150"
                          id="txtNombrePermiso"
                          v-model="frmRegistrarPregunta.pregunta"
                          placeholder="Ingrese el nombre del permiso"
                        ></textarea>
                      </div>
                    </form>
                    <hr />
                    <div class="text-right">
                      <button
                        class="btn btn-action btn-icon-split mb-1"
                        id="btnGuardarCambios"
                        @click="GuardarPregunta()"
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
import layout from "./Components/layout_administrativa";
export default {
  components: { layout },
  props: {
    preguntas: Array,
  },
  data() {
    return {
      submited: false,
      title_modal: "NUEVO PERMISO",
      listar_preguntas: this.preguntas,
      frmRegistrarPregunta: {
        id: "",
        pregunta: "",
        dni_ponente: "",
        idEvento:"",
        modal: "",
      },
    };
  },
  mounted() {
    this.TablaPreguntas();
    var elemento = document.getElementById("tblPreguntas");
    if (elemento != null) {
      if (screen.width < 1000) {
        elemento.classList.add("table-responsive");
      }
    }
  },
    // watch:{
    //   listar_preguntas() {
    //     $("#tblPreguntas").DataTable().destroy();
    //    this.TablaPreguntas();
    //   }
    // },
  methods: {
    TablaPreguntas() {
      this.$nextTick(() => {
        var table = $("#tblPreguntas")
      });
    },
    NuevaPregunta(pregunta) {
      // console.log(pregunta.id);
      this.submited = false;
      this.title_modal = "EDITAR PREGUNTA";
      this.frmRegistrarPregunta.id = 0;
      this.frmRegistrarPregunta.pregunta = " ";
      this.frmRegistrarPregunta.idEvento = 0;
      this.frmRegistrarPregunta.modal = "NUEVO";
      //   console.log(this.frmRegistrarPregunta.modal);

      document.getElementById("modalRegistrarPermiso").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalRegistrarPermiso").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    EditarPregunta(pregunta) {
      // console.log(pregunta.id);
      this.submited = false;
      this.title_modal = "EDITAR PREGUNTA";
      this.frmRegistrarPregunta.id = pregunta.id;
      this.frmRegistrarPregunta.pregunta = pregunta.pregunta;
      this.frmRegistrarPregunta.idEvento = pregunta.idEvento;
      this.frmRegistrarPregunta.modal = "EDITAR";
      //   console.log(this.frmRegistrarPregunta.modal);

      document.getElementById("modalRegistrarPermiso").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalRegistrarPermiso").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    GuardarPregunta() {
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
            route("foros.guardar_pregunta"),
            self.frmRegistrarPregunta,
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
                    // self.FiltrarPermisos();
                    // $("#tblPreguntas").destroy();
                    // self.TablaPreguntas();
                    $("#modalRegistrarPermiso").css("display", "none");
                    $("#footer-navigator").css("display", "flex");
                  },
                });
              },
            }
          );
        },
      });
      //     }
      //   });
      //   }
    },
  },
};
</script>

<style>
</style>