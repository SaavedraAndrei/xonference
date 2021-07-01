<template>
  <layout ref="layout">
    <div slot="c_foros_2">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>FORO {{pregunta_conferencia}}</strong>
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
            <br />
          </div>
          
          <br>
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
      listar_respuestas: [],
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
    this.TablaEstados();
//filtrar tabla
    let slcEventos_value = this.preguntas[1].idEvento;
        this.listar_respuestas = this.respuestas.filter(
          (item) => item.idEvento == slcEventos_value
        );
    // this.frmResponderForo.idEvento = this.preguntas[0].idEvento;
    // console.log(this.listar_respuestas[self.respuestas].idEvento);
    this.pregunta_muostrar = this.preguntas[1].pregunta;
    this.pregunta_conferencia = this.preguntas[1].nombreConferencia;
    // console.log(this.pregunta_muostrar);
  },
  methods: {
     TablaEstados() {
      this.$nextTick(() => {
        var table = $("#tblPreguntas").DataTable({
          scrollY: "350px",
          scrollCollapse: true,
          paging: true,
          order: [[1, "asc"]],
          fixedHeader: true,
          language: {
            retrieve: true,
            decimal: "",
            emptyTable: "No hay datos disponibles en la tabla",
            info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
            infoEmpty: "No se encontraron registros",
            infoFiltered: "(filtrado de _MAX_ registros)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Agrupar por _MENU_ filas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No se encontraron registros",
            paginate: {
              first: "Primera",
              last: "Ultima",
              next: '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
              previous:
                '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
            },
            aria: {
              sortAscending: ": activar para ordenar de forma ascendente",
              sortDescending: ": activar para ordenar de forma descendente",
            },
          },
          responsive: true,
          dom: '<"top"Bf>rt<"row"<"col-sm-12 col-md-5 mb-2"i><"col-sm-12 col-md-7 mb-2"p><"col-sm-12 col-md-5 mb-2"l>><"clear">',
          buttons: [
            {
              extend: "excelHtml5",
              text: '<i class="fas fa-file-excel"></i> ',
              titleAttr: "Exportar a Excel",
              className: "btn btn-action",
            },
            {
              extend: "pdfHtml5",
              text: '<i class="fas fa-file-pdf"></i> ',
              titleAttr: "Exportar a PDF",
              className: "btn btn-cancel",
            },
            {
              extend: "print",
              text: '<i class="fa fa-print"></i> ',
              titleAttr: "Imprimir",
              className: "btn btn-action",
            },
          ],
        });

        $("#inpBuscar").keyup(function () {
          table.search(this.value).draw();
        });
      });
    },
    ResponderForo() {
      // console.log("hola"), (this.submited = false);
      this.title_modal = "AGREGAR RESPUESTA";
      this.frmResponderForo.id = 0;
      this.frmResponderForo.titulo = "";
      this.frmResponderForo.respuesta = "";
      this.frmResponderForo.idEvento = this.preguntas[1].idEvento;
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
      this.frmResponderForo.idEvento = this.preguntas[1].idEvento;
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
                      const content = Swal.getHtmlContainer();
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