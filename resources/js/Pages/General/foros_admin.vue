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
                @click="ResponderForo()"
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
                    <td class="table-bordered" align="center">{{ pregunta.pregunta }}</td>
                    <td class="table-bordered" align="left">{{ pregunta.dni_ponente }}</td>
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
                    <form @submit.prevent="GuardarPermiso">
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
                        @click="GuardarPermiso()"
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
        modo: "",
      },
    };
  },
  mounted() {
    this.TablaPreguntas();
    // var elemento = document.getElementById("t_permiso");
    // if (elemento != null) {
    //   if (screen.width < 1000) {
    //     elemento.classList.add("table-responsive");
    //   }
    // }
  },
  //   watch:{
  //     listar_preguntas() {
  //       $("#tblPreguntas").DataTable().destroy();
  //      this.TablaPreguntas();
  //     }
  //   },
  methods: {
    TablaPreguntas() {
      this.$nextTick(() => {
        var table = $("#tblPreguntas").DataTable({
          scrollCollapse: true,
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
              next:
                '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
              previous:
                '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
            },
            aria: {
              sortAscending: ": activar para ordenar de forma ascendente",
              sortDescending: ": activar para ordenar de forma descendente",
            },
          },
          responsive: true,
          dom:
            '<"top"Bf>rt<"row"<"col-sm-12 col-md-5 mb-2"i><"col-sm-12 col-md-7 mb-2"p><"col-sm-12 col-md-5 mb-2"l>><"clear">',
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
      });
    },
    EditarPermiso(pregunta) {
      this.submited = false;
      this.title_modal = "EDITAR PREGUNTA";
      this.frmRegistrarPregunta.id = pregunta.id;
      this.frmRegistrarPregunta.pregunta = pregunta.pregunta;
      this.frmRegistrarPregunta.areaExistente = pregunta.dni_ponente;
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
  },
};
</script>

<style>
</style>