<template>
  <layout ref="layout">
    <div slot="c_ponentes_admin">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>PONENTES</strong>
          </div>
          <div class="card-title">PANEL DE PREGUNTAS</div>
          <div class="card-body card-block">
            <div class="text-center mb-2">
              <button
                class="btn btn-action btn-icon-split"
                id="btnRegistrarAsistencia"
                @click="NuevoPonente()"
              >
                <span class="icon text-white">
                  <i class="far fa-id-badge"></i>
                </span>
                <span class="text font-size-layout">Agregar ponente</span>
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
              <table class="table table-hover" id="tblPonentes">
                <thead>
                  <tr>
                    <th>EDITAR</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>DNI</th>
                    <th>DESCRIPCION</th>
                    <th>TELEFONO</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="ponente in listar_ponentes" :key="ponente.id">
                    <td class="table-bordered" align="center">
                      <button
                        class="btn btn-action btn-icon-split"
                        @click="EditarPonente(ponente)"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-edit" style="color: white"></i>
                        </span>
                      </button>
                    </td>
                    <td class="table-bordered" align="center">
                      {{
                        ponente.nombre +
                        " " +
                        ponente.apellidoPaterno +
                        " " +
                        ponente.apellidoMaterno
                      }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ ponente.email }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ ponente.dni }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ ponente.descripcion }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ ponente.telefono }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <br />
          </div>
        </div>

        <!-- The Modal -->
        <div id="modalPonente" class="modal">
          <div class="modal-content w-36">
            <div class="modal-body">
              <div class="content" style="display: block">
                <div class="card">
                  <div class="card-header">
                    <div id="c_titulo">
                      <strong id="title">{{ title_modal }}</strong>
                    </div>
                  </div>
                  <div class="card-title">DATOS DEL PONENTE</div>
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

                        <!-- <div class="form-group col-md-4 offset-md-4">
                        <label for="cmbUsuariosCompraNuevo" class="label-title"
                          >USUARIO DE COMPRA</label
                        >
                        <select
                          class="form-control"
                          name="AgenciasCanasta"
                          id="slcAgenciasCanasta"
                          style="max-width: 200px; margin-bottom: 10px"
                          @change="FiltrarAgenciaUsuario"
                        >
                          <option :value="0">Todas</option>
                          <option
                            v-for="agencia in agencias"
                            :key="agencia.id_agencia"
                            :value="agencia.id_agencia"
                          >
                            {{ agencia.nombre }}
                          </option>
                        </select>
                        <select
                          class="form-control"
                          name="cmbUsuariosCanasta"
                          id="cmbUsuariosCanasta"
                          style="max-width: 200px"
                          v-model="frmCanastaCompras.usuario_compra"
                        >
                          <option :value="0">Seleccione...</option>
                          <option
                            v-for="usuario in usuarios_filtrados"
                            :key="usuario.dni"
                            :value="usuario.dni"
                          >
                            {{ usuario.usuario }}
                          </option>
                        </select>
                        <div
                          v-if="
                            submited &&
                            frmRegistrarCompra.modo == 'NUEVO' &&
                            !$v.frmCanastaCompras.usuario_compra.maxValue
                          "
                          style="color: red; font-size: 12px"
                        >
                          *Seleccione el usuario de compra
                        </div>
                      </div> -->
                      </div>
                    </form>
                    <hr />
                    <div class="text-right">
                      <button
                        class="btn btn-action btn-icon-split mb-1"
                        id="btnGuardarCambios"
                        @click="GuardarPonente()"
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
import { required } from "vuelidate/lib/validators";
import layout from "./Components/layout_administrativa";
const ThanZero = (value) => value > 0;
export default {
  components: { layout },
  props: {
    ponentes: Array,
  },
  data() {
    return {
      submited: false,
      title_modal: "NUEVO PONENTE",
      listar_ponentes: this.ponentes,
      frmRegistrarPonente: {
        id: "",
        nombre: "",
        apellidoPaterno: "",
        apellidoMaterno: "",
        email: "",
        descripcion: "",
        dni: null,
        telefono: null,
        modal: "",
        fotoPonente: null,
      },
    };
  },
  validations() {
    if (this.frmRegistrarPonente.modal == "NUEVO") {
      return {
        frmRegistrarPonente: {
          nombre: { required },
          apellidoPaterno: { required },
          apellidoMaterno: { required },
          email: { required },
          descripcion: { required },
          dni: { required },
          telefono: { required },
          fotoPonente: { required },
        },
      };
    }
  },
  mounted() {
    this.TablaPonentes();
    if (screen.width < 1000) {
      document.getElementById("tblPonentes").classList.add("table-responsive");
    }
  },
  watch:{ 
    // listar_ponentes() {
    //   $("#t_estados").DataTable().destroy();
    //   this.TablaPonentes();
    // },
  },
  methods: {
    TablaPonentes() {
      this.$nextTick(() => {
        var table = $("#tblPonentes").DataTable({
          destroy: true,
          // pageLength: 5,
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
      $("#tblPonentes").DataTable().destroy();
      this.TablaPonentes();
    },
    AgregarFotografia(e) {
      let control_name = e.target.name;

      if (control_name == "fotoPonente") {
        this.frmRegistrarPonente.fotoPonente = e.target.files[0];
        // console.log(this.frmRegistrarPonente.fotoPonente);
      }
    },
    NuevoPonente() {
      // console.log(pregunta.id);
      this.submited = false;
      this.title_modal = "NUEVO PONENTE";
      this.frmRegistrarPonente.id = 0;
      this.frmRegistrarPonente.nombre = "";
      this.frmRegistrarPonente.apellidoPaterno = "";
      this.frmRegistrarPonente.apellidoMaterno = "";
      this.frmRegistrarPonente.email = "";
      this.frmRegistrarPonente.dni = null;
      this.frmRegistrarPonente.descripcion = "";
      this.frmRegistrarPonente.telefono = null;
      this.frmRegistrarPonente.fotoPonente = null;
      this.frmRegistrarPonente.modal = "NUEVO";

      document.getElementById("modalPonente").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalPonente").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    EditarPonente(ponente) {
      this.submited = false;
      this.title_modal = "EDITAR PONENTE";
      this.frmRegistrarPonente.id = ponente.id;
      this.frmRegistrarPonente.nombre = ponente.nombre;
      this.frmRegistrarPonente.apellidoPaterno = ponente.apellidoPaterno;
      this.frmRegistrarPonente.apellidoMaterno = ponente.apellidoMaterno;
      this.frmRegistrarPonente.email = ponente.email;
      this.frmRegistrarPonente.dni = ponente.dni;
      this.frmRegistrarPonente.descripcion = ponente.descripcion;
      this.frmRegistrarPonente.telefono = ponente.telefono;
      this.frmRegistrarPonente.modal = "EDITAR";

      document.getElementById("modalPonente").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalPonente").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    GuardarPonente() {
      // console.log("ingreso");
      this.submited = true;
      self = this;
      let data = new FormData();
      if (this.frmRegistrarPonente.modal == "NUEVO") {
        if (self.$v.frmRegistrarPonente.$invalid) {
          return false;
        } else {
          console.log("sddas");
          data.append("modal", self.frmRegistrarPonente.modal);
          data.append("dni", self.frmRegistrarPonente.dni);
          data.append("email", self.frmRegistrarPonente.email);
          axios
            .post(route("administrativa.verificar_ponentes"), data)
            .then(function (response) {
              let resultado = response.data;
              // console.log(resultado);
              if (resultado == "INCORRECTO_D") {
                Swal.fire({
                  icon: "error",
                  title: "¡Ups!",
                  text: "El DNI ingresado, ya está registrado, intente nuevamente.",
                });
                return false;
              } else if (resultado == "INCORRECTO_U") {
                Swal.fire({
                  icon: "error",
                  title: "¡Ups!",
                  text: "El USUARIO ingresado, ya está registrado, intente nuevamente.",
                });
                return false;
              } else {
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
                      route("administrativa.guardar_ponente"),
                      self.frmRegistrarPonente,
                      {
                        preserveScroll: true,
                        onStart: (visit) => {
                          let timerInterval;
                          Swal.fire({
                            title: "EN PROGRESO",
                            html: "Espere porfavor...",
                            timer: 2000,
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
                              // console.log(self.listar_ponentes);
                              $("#tblPonentes").DataTable().destroy();
                              self.TablaPonentes();
                              $("#modalPonente").css("display", "none");
                              $("#footer-navigator").css("display", "flex");
                              // self.ActualizarTabla();
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
      } else if (this.frmRegistrarPonente.modal == "EDITAR") {
        // console.log("EDITAR");
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
              route("administrativa.guardar_ponente"),
              self.frmRegistrarPonente,
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
                      self.ActualizarTabla();
                      $("#modalPonente").css("display", "none");
                      $("#footer-navigator").css("display", "flex");
                    },
                  });
                },
              }
            );
          },
        });
      }
    },
  },
};
</script>

<style>
</style>