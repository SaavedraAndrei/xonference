<template>
   <layout ref="layout">
    <div slot="c_congresos_permisos">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>CONGRESOS - EVENTOS</strong>
          </div>
          <div class="card-title">PANEL DE LISTADO</div>
          <div class="card-body card-block">
            <div class="text-center mb-2">
              <button
                class="btn btn-action btn-icon-split"
                id="btnRegistrarAsistencia"
              >
                <span class="icon text-white">
                  <i class="far fa-id-badge"></i>
                </span>
                <span class="text font-size-layout">Agregar Evento</span>
              </button>
            </div>

            <div id="tabla_permisos">
              <table class="table table-hover" id="tblCongresos">
                <thead>
                  <tr>
                    <th>EDITAR</th>
                    <th>NOMBRE</th>
                    <th>TEMATICA</th>
                    <th>DESCRIPCION</th>
                    <th>FECHA INICIO</th>
                    <th>HORA INICIO</th>
                    <th>HORA FIN</th>
                    <th>PONENTE</th>
                    <th>CATEGORIA</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="congreso in congresos" :key="congreso.id">
                    <td class="table-bordered" align="center">
                      <button
                        class="btn btn-action btn-icon-split"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-edit" style="color: white"></i>
                        </span>
                      </button>
                    </td>
                    <td class="table-bordered" align="center">
                      {{ congreso.nombre}}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ congreso.tematica }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ congreso.descripcion }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ congreso.fecha_evento }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ congreso.hora_evento }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ congreso.hora_fin }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ congreso.NOMBRES + " " + congreso.apellidoPaterno + " "+congreso.apellidoMaterno }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ congreso.nombre_categoria }}
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
        <!-- <div id="modalPreguntaForo" class="modal">
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
                          name="pregunta"
                          id="txtNombrePregunta"
                          v-model="frmRegistrarPregunta.pregunta"
                          placeholder="Ingrese la pregunta"
                        ></textarea>
                      </div>
                      <div class="col form-group">
                        <label class="form-control-label label-title"
                          >Conferencia</label
                        >
                        <select
                          class="form-control center"
                          id="alcEventos"
                          style="max-width: 400px"
                          v-model="frmRegistrarPregunta.idEvento"
                        >
                          <option value="0" selected>
                            Seleccione...
                          </option>
                          <option
                            v-for="evento in eventos"
                            :key="evento.id"
                            v-bind:value="evento.id"
                          >
                            {{ evento.nombre }}
                          </option>
                        </select>
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
        </div> -->
      </div>
    </div>
  </layout>
</template>

<script>
import layout from "./Components/layout_administrativa";
export default {
    components: { layout },
    props: {
        congresos: Array,
    },
    mounted() {
      this.TablaCongresos();
      if (screen.width < 1000) {
      document
        .getElementById("tblCongresos")
        .classList.add("table-responsive");
    }
    },
    methods: {
      TablaCongresos(){
        var table = $("#tblCongresos").DataTable({
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
      }
    }
}
</script>

<style>

</style>