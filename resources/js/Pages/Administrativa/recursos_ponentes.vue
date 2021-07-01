<template>
  <layout ref="layout">
    <div slot="c_recursos_ponentes">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>RECURSOS</strong>
          </div>
          <div class="card-title">PANEL DE RECURSOS</div>
          <div class="card-body card-block">
            <div class="text-center mb-2">
              <button
                class="btn btn-action btn-icon-split"
                id="btnRegistrarAsistencia"
                @click="NuevoRecurso()"
              >
                <span class="icon text-white">
                  <i class="far fa-id-badge"></i>
                </span>
                <span class="text font-size-layout">Agregar Recursos</span>
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
                  
                />
                <div class="input-group-append">
                  <button class="btn btn-action" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
            <div id="tabla_permisos">
              <table class="table table-hover" id="tblRecursos">
                <thead>
                  <tr>
                    <!-- <th>EDITAR</th> -->
                    <th>TITULO</th>
                    <th>DESCRIPCION</th>
                  </tr>
                </thead>
                
                <tbody>
                    <!-- CAMBIAR -->
                  <tr v-for="file in files" :key="file.id">
                    <!-- <td class="table-bordered" align="center">
                      <button
                        class="btn btn-action btn-icon-split"
                        @click="EditarRecurso(file)"
                       
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-edit" style="color: white"></i>
                        </span>
                      </button>
                    </td> -->

                    <td class="table-bordered" align="center">
                      {{ file.title }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ file.description }}
                    </td>
                    <!-- 
                    <td class="table-bordered" align="left">
                      {{ ponente.dni }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ ponente.descripcion }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ ponente.telefono }}
                    </td> -->
                  </tr>
                </tbody>
              </table>
            </div>
            <br />
          </div>
        </div>
<!-- ---------------------------- -->

        <!-- The Modal -->
        <div id="modalRecurso" class="modal">
          <div class="modal-content w-36">
            <div class="modal-body">
              <div class="content" style="display: block">
                <div class="card">
                  <div class="card-header">
                    <div id="c_titulo">
                      <strong id="title">{{ title_modal }}</strong>
                    </div>
                  </div>
                  <div class="card-title">DATOS DEL RECURSO</div>
                  <div class="card-body card-block">
                    <form @submit.prevent="GuardarRecurso">
                      <input
                        type="text"
                        id="txtModal"
                        v-model="frmRegistrarRecurso.modal"
                        hidden
                      />
                      <input
                        type="text"
                        id="txtIdPermiso"
                        hidden
                        v-model="frmRegistrarRecurso.id"
                      />



                      <div class="form-row">
                        <div class="form-group col-sm-4">
                          <label class="form-control-label label-title"
                            >TITULO</label
                          >
                          <input
                            class="form-control"
                            type="text"
                            name="title"
                            id="inpNombre"
                            autocomplete="off"
                            v-model="frmRegistrarRecurso.title"
                            placeholder="Ingrese el titulo del archivo"
                          />
                          <div
                            v-if="
                              submited &&
                              frmRegistrarRecurso.modal == 'NUEVO' &&
                              !$v.frmRegistrarRecurso.title.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *ingrese el titulo
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
                            name="description"
                            id="inpDescripcion"
                            autocomplete="off"
                            v-model="frmRegistrarRecurso.description"
                            placeholder="Ingrese alguna descripción"
                          ></textarea>
                          <!-- <div
                            v-if="
                              submited &&
                              frmRegistrarRecurso.modal == 'NUEVO' &&
                              !$v.frmRegistrarRecurso.description.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *ingrese una descripción
                          </div> -->
                        </div>
                        
                      </div>
                      <div class="form-row">
                        <div v-if="frmRegistrarRecurso.modal == 'NUEVO'">
                          <div class="form-group col-md-4">
                            <label
                              class="label-title"
                              for="myfile"
                              id="lblFotoPonente"
                              >ARCHIVO:</label
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
                              name="archivofile"
                              accept=".pdf, .png, .jpeg, .doc , .xlsx , .pptx"
                              @change="AgregarArchivo"
                            />
                            <!-- <div
                              v-if="
                                submited &&
                                frmRegistrarRecurso.modal == 'NUEVO' &&
                                !$v.frmRegistrarRecurso.archivofile.required
                              "
                              style="color: red; font-size: 12px"
                            >
                              *Adjunte un archivo o recurso
                            </div> -->
                          </div>
                        </div>

                        
                      </div>
                    </form>
                    <hr />
                    <div class="text-right">
                      <button
                        class="btn btn-action btn-icon-split mb-1"
                        id="btnGuardarCambios"
                        @click="GuardarRecurso()"
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

        
<!-- --------------------------- -->
      </div>
    </div>
  </layout>
</template>

<script>
import layout from "./Components/layout_administrativa";
import { required } from "vuelidate/lib/validators";
export default {
  components: { layout },

  props: {
    files: Array,
  },
  
  data() {
    return {
      submited: false,
      title_modal: "NUEVO RECURSO",
      // listar_preguntas: this.preguntas,
      frmRegistrarRecurso: {
        id: "",
        title: "",
        description: "",
        modal: "",
        archivofile: null,
      },
    };
  },
  validations() {
    if (this.frmRegistrarRecurso.modal == "NUEVO") {
      return {
        frmRegistrarRecurso: {
          title: { required },
          description: { required },
          archivofile: { required },
        },
      };
    }
  },
  mounted() {
    this.TablaRecursos();
    if (screen.width < 1000) {
      document
        .getElementById("tblRecursos")
        .classList.add("table-responsive");
    }
  },

  methods: {
    TablaRecursos() {
      this.$nextTick(() => {
        var table = $("#tblRecursos").DataTable({
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
    hidenav() {
      return this.$refs.layout.hide_nav();
    },
    shownav() {
      return this.$refs.layout.show_nav();
    },
    ActualizarTabla() {
      $("#tblRecursos").DataTable().destroy();
      this.TablaRecursos();
    },
    AgregarArchivo(e) {
      let control_name = e.target.name;

      if (control_name == "archivofile") {
        this.frmRegistrarRecurso.archivofile = e.target.files[0];
        console.log(this.frmRegistrarRecurso.archivofile);
      }
    },
    NuevoRecurso() {
      console.log(this.frmRegistrarRecurso.archivofile);
      this.submited = false;
      this.title_modal = "NUEVO RECURSO";
      this.frmRegistrarRecurso.id = 0;
      this.frmRegistrarRecurso.title = "";
      this.frmRegistrarRecurso.description = "";
      this.frmRegistrarRecurso.archivofile = null;
      this.frmRegistrarRecurso.modal = "NUEVO";

      document.getElementById("modalRecurso").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalRecurso").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    EditarRecurso(recurso) {
      this.submited = false;
      this.title_modal = "EDITAR RECURSO";
      this.frmRegistrarRecurso.id = recurso.id;
      this.frmRegistrarRecurso.title = recurso.title;
      this.frmRegistrarRecurso.description = recurso.description;
      this.frmRegistrarRecurso.modal = "EDITAR";

      document.getElementById("modalRecurso").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalRecurso").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },

    GuardarRecurso() {
      // console.log("ingreso");
      this.submited = true;
      self = this;
      let data = new FormData();
      if (this.frmRegistrarRecurso.modal == "NUEVO") {
        if (self.$v.frmRegistrarRecurso.$invalid) {
          return false;
        } else {
          console.log("sddas");
          data.append("modal", self.frmRegistrarRecurso.modal);
          data.append("title", self.frmRegistrarRecurso.title);
          axios
            .post(route("administrativa.verificar_recursos"), data)
            .then(function (response) {
              let resultado = response.data;
              // console.log(resultado);
              if (resultado == "INCORRECTO_D") {
                Swal.fire({
                  icon: "error",
                  title: "¡Ups!",
                  text: "El Titulo ingresado, ya está registrado, intente nuevamente.",
                });
                return false;
              } else 
              // if (resultado == "INCORRECTO_U") {
              //   Swal.fire({
              //     icon: "error",
              //     title: "¡Ups!",
              //     text: "El USUARIO ingresado, ya está registrado, intente nuevamente.",
              //   });
              //   return false;
              // } else
               {
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
                      route("administrativa.guardar_recurso"),
                      self.frmRegistrarRecurso,
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
                              self.ActualizarTabla();
                              $("#modalRecurso").css("display", "none");
                              $("#footer-navigator").css("display", "flex");
                            },
                          });
                        },
                      }
                    );
                  },
                });
              }
            });
        }
      }
    },
  },
};
</script>

<style>
</style>