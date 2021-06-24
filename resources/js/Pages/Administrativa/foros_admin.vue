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
            <div id="search-content_us">
              <div
                class="input-group row col-md-3 mb-1 input-search"
                id="s_content_us"
              >
                <input
                  class="form-control"
                  type="text"
                  id="inpBuscar"
                  placeholder="Buscar..."
                  @focus="hidenav()"
                  @blur="shownav()"
                />
                <div class="input-group-append">
                  <button class="btn btn-action" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
            <div id="tabla_permisos">
              <table class="table table-hover" id="tblPreguntas">
                <thead>
                  <tr>
                    <th>EDITAR</th>
                    <th>PREGUNTA</th>
                    <th>PONENTE</th>
                    <th>CONFERENCIA</th>
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
                      {{ pregunta.nombre + " " + pregunta.apellidoPaterno }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ pregunta.nombreConferencia }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <br />
            <br />
          </div>

          <div class="card-title">PANEL DE RESPUESTAS</div>
          <div class="card-body card-block">
            <div class="form-row col-md-6 col-6">
                <label for="slcEventos" class="form-control-label"
                  >Por conferencia</label
                >
                <select
                  class="form-control center"
                  name="slcEventos"
                  id="slcEventos"
                  style="max-width: 200px"
                  @change="FiltrarRespuestas"
                >
                  <option value="seleccione">Seleccione...</option>
                  <option value="0">Todos</option>
                  <option
                    v-for="evento in eventos"
                    :key="evento.id"
                    :value="evento.id"
                  >
                    {{ evento.nombre }}
                  </option>
                </select>
              </div>
            <div id="search-content_us">
              <div
                class="input-group row col-md-3 mb-1 input-search"
                id="s_content"
              >
                <input
                  class="form-control"
                  type="text"
                  id="inpBuscar_ver"
                  placeholder="Buscar..."
                  @focus="hidenav()"
                  @blur="shownav()"
                />
                <div class="input-group-append">
                  <button class="btn btn-action" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
            <div id="table_respuestas">
              <table class="table table-hover" id="tblVerRespuestas">
                <thead>
                  <tr>
                    <th>EDITAR</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>DNI</th>
                    <!-- <th>DESCRIPCION</th> -->
                    <!-- <th>TELEFONO</th> -->
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="respuesta in filtrar_respuestas" :key="respuesta.id">
                    <td class="table-bordered" align="center">
                      <button
                        class="btn btn-action btn-icon-split"
                        @click="EditarPonente(respuesta)"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-edit" style="color: white"></i>
                        </span>
                      </button>
                    </td>
                    <td class="table-bordered" align="center">
                      {{
                        respuesta.nombres +
                        " " +
                        respuesta.apellidoPaterno +
                        " " +
                        respuesta.apellidoMaterno
                      }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ respuesta.email }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ respuesta.dni }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- The Modal -->
        <div id="modalPreguntaForo" class="modal">
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
                        id="txtIdPregunta"
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
                          <option value="0" selected>Seleccione...</option>
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
        </div>

        <!-- The Modal -->
        <!-- <div id="modalPonente" class="modal">
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
                    <form @submit.prevent="GuardarPonente">
                      <input
                        type="text"
                        id="txtModal"
                        v-model="frmRegistrarPonente.modal"
                        hidden
                      />
                      <input
                        type="text"
                        id="txtIdPermiso"
                        hidden
                        v-model="frmRegistrarPonente.id"
                      />
                      <div class="form-row">
                        <div class="form-group col-sm-4">
                          <label class="form-control-label label-title"
                            >DNI</label
                          >
                          <input
                            class="form-control"
                            type="number"
                            name="dni"
                            id="inpDni"
                            maxlength="8"
                            autocomplete="off"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            v-model="frmRegistrarPonente.dni"
                            placeholder="Ingrese el DNI"
                            :disabled="frmRegistrarPonente.modal == 'EDITAR'"
                          />
                          <div
                            v-if="
                              submited &&
                              frmRegistrarPonente.modal == 'NUEVO' &&
                              !$v.frmRegistrarPonente.dni.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *ingrese el dni
                          </div>
                        </div>
                        <div class="col form-group col-sm-8">
                          <label class="form-control-label label-title"
                            >email</label
                          >
                          <input
                            class="form-control"
                            type="text"
                            name="Nombre"
                            id="inpNombre"
                            autocomplete="off"
                            v-model="frmRegistrarPonente.email"
                            placeholder="Ingrese el email"
                          />
                          <div
                            v-if="
                              submited &&
                              frmRegistrarPonente.modal == 'NUEVO' &&
                              !$v.frmRegistrarPonente.email.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *ingrese el email
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-4">
                          <label class="form-control-label label-title"
                            >NOMBRE</label
                          >
                          <input
                            class="form-control"
                            type="text"
                            name="Nombre"
                            id="inpNombre"
                            autocomplete="off"
                            v-model="frmRegistrarPonente.nombre"
                            placeholder="Ingrese los nombres"
                          />
                          <div
                            v-if="
                              submited &&
                              frmRegistrarPonente.modal == 'NUEVO' &&
                              !$v.frmRegistrarPonente.nombre.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *ingrese los nombres
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="form-control-label label-title"
                            >APELLIDO PATERNO</label
                          >
                          <input
                            class="form-control"
                            type="text"
                            name="apePaterno"
                            id="inpapePaterno"
                            autocomplete="off"
                            v-model="frmRegistrarPonente.apellidoPaterno"
                            placeholder="Ingrese su apellido patenro"
                          />
                          <div
                            v-if="
                              submited &&
                              frmRegistrarPonente.modal == 'NUEVO' &&
                              !$v.frmRegistrarPonente.apellidoPaterno.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *ingrese el apellido paterno
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="form-control-label label-title"
                            >APELLIDO MATERNO</label
                          >
                          <input
                            class="form-control"
                            type="text"
                            name="apeMaterno"
                            id="inpapeMaterno"
                            autocomplete="off"
                            v-model="frmRegistrarPonente.apellidoMaterno"
                            placeholder="Ingrese el apeliido materno"
                          />
                          <div
                            v-if="
                              submited &&
                              frmRegistrarPonente.modal == 'NUEVO' &&
                              !$v.frmRegistrarPonente.apellidoMaterno.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *ingrese el apellido materno
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-sm-8">
                          <label class="form-control-label label-title"
                            >DESCRIPCION</label
                          >
                          <textarea
                            class="form-control"
                            type="text"
                            name="descripcion"
                            id="inpDescripcion"
                            autocomplete="off"
                            v-model="frmRegistrarPonente.descripcion"
                            placeholder="Ingrese su descripción"
                          ></textarea>
                          <div
                            v-if="
                              submited &&
                              frmRegistrarPonente.modal == 'NUEVO' &&
                              !$v.frmRegistrarPonente.descripcion.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *ingrese una descripción
                          </div>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="form-control-label label-title"
                            >TELEFONO</label
                          >
                          <input
                            class="form-control"
                            type="number"
                            name="telefono"
                            maxlength="9"
                            autocomplete="off"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            id="inpTelefono"
                            v-model="frmRegistrarPonente.telefono"
                            placeholder="Ingrese el telefono"
                          />
                          <div
                            v-if="
                              submited &&
                              frmRegistrarPonente.modal == 'NUEVO' &&
                              !$v.frmRegistrarPonente.telefono.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *ingrese el telefono
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div v-if="frmRegistrarPonente.modal == 'NUEVO'">
                          <div class="form-group col-md-4">
                            <label
                              class="label-title"
                              for="myfile"
                              id="lblFotoPonente"
                              >FOTO:</label
                            >
                            <input
                              class="btn btn-primary"
                              style="
                                background-color: var(--plomoOscuroEmpresarial);
                                border: none;
                                max-width: 400px;
                                font-size: 12px;
                              "
                              type="file"
                              id="fotoPonente"
                              name="fotoPonente"
                              accept="img/*"
                              @change="AgregarFotografia"
                            />
                            <div
                              v-if="
                                submited &&
                                frmRegistrarPonente.modal == 'NUEVO' &&
                                !$v.frmRegistrarPonente.fotoPonente.required
                              "
                              style="color: red; font-size: 12px"
                            >
                              *Adjunte una imagen
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <hr />
                    <div class="text-right">
                      <button
                        class="btn btn-cancel btn-icon-split mb-1"
                        id="btnCancelar"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-times" style="color: white"></i>
                        </span>
                        <span class="text" style="color: white">Cerrar</span>
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
import { required } from "vuelidate/lib/validators";
import layout from "./Components/layout_administrativa";
export default {
  components: { layout },
  props: {
    preguntas: Array,
    eventos: Array,
    respuestas: Array,
  },
  data() {
    return {
      submited: false,
      title_modal: "NUEVO PERMISO",
      listar_preguntas: this.preguntas,
      filtrar_respuestas: [],
      frmRegistrarPregunta: {
        id: "",
        pregunta: "",
        dni_ponente: "",
        idEvento: 0,
        modal: "",
      },
    };
  },
  mounted() {
    // console.log($("#tblPreguntas").DataTable().destroy());
    this.TablaPreguntas();
    this.TablaRespuestas();
    var elemento = document.getElementById("tblPreguntas");
    if (elemento != null) {
      if (screen.width < 1000) {
        elemento.classList.add("table-responsive");
      }
    }
  },
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
    TablaRespuestas() {
      this.$nextTick(() => {
        var table = $("#tblVerRespuestas").DataTable({
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
        $("#inpBuscar_ver").keyup(function () {
          table.search(this.value).draw();
        });
      });
    },
    hidenav() {
      return this.$refs.layout.hide_nav();
    },
    shownav() {
      return this.$refs.layout.show_nav();
    },
    ActualizarTabla() {
      
      $("#tblPreguntas").DataTable().destroy();
      this.TablaPreguntas();
    },
    NuevaPregunta(pregunta) {
      // console.log(pregunta.id);
      this.submited = false;
      this.title_modal = "CREAR PREGUNTA";
      this.frmRegistrarPregunta.id = 0;
      this.frmRegistrarPregunta.pregunta = "";
      this.frmRegistrarPregunta.idEvento = 0;
      this.frmRegistrarPregunta.modal = "NUEVO";

      document.getElementById("modalPreguntaForo").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalPreguntaForo").style.display = "none";
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

      document.getElementById("modalPreguntaForo").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalPreguntaForo").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    GuardarPregunta() {
      this.submited = true;
      self = this;
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
                      console.log(Swal.getContent());
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
                    self.ActualizarTabla();
                    $("#modalPreguntaForo").css("display", "none");
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

    //PANEL DE RESPUESTAS
    FiltrarRespuestas() {
      // console.log($("#slcEventos").val());
      let slcEventos_value = $("#slcEventos").val();

      if (slcEventos_value == "seleccione") {
        this.filtrar_respuestas = [];
      } else 
      if (slcEventos_value == "0") {
        this.filtrar_respuestas = this.respuestas;
      } else {
        this.filtrar_respuestas = this.respuestas.filter(
          (item) => item.id == slcEventos_value
        );
      }
      $("#tblVerRespuestas").DataTable().destroy();
      this.TablaRespuestas();
    },
  },
};
</script>

<style>
</style>