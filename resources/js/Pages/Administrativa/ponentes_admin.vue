<template>
  <layout ref="layout">
    <div slot="c_ponentes_admin">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>PONENTES</strong>
          </div>
          <div class="card-title">PANEL DE LISTADO</div>
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
                    <th>email</th>
                    <th>DNI</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="ponente in ponentes" :key="ponente.id">
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
                  </tr>
                </tbody>
              </table>
            </div>
            <br />
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
                            v-model="frmRegistrarPonente.email"
                            placeholder="Ingrese el email"
                          />
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
                            v-model="frmRegistrarPonente.nombre"
                            placeholder="Ingrese los nombres"
                          />
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="form-control-label label-title"
                            >APELLIDO PATERNO</label
                          >
                          <input
                            class="form-control"
                            type="text"
                            name="Nombre"
                            id="inpNombre"
                            v-model="frmRegistrarPonente.apellidoPaterno"
                            placeholder="Ingrese su apellido patenro"
                          />
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="form-control-label label-title"
                            >APELLIDO MATERNO</label
                          >
                          <input
                            class="form-control"
                            type="text"
                            name="Nombre"
                            id="inpNombre"
                            v-model="frmRegistrarPonente.apellidoMaterno"
                            placeholder="Ingrese el apeliido materno"
                          />
                        </div>
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
import layout from "./Components/layout_administrativa";
export default {
  components: { layout },
  props: {
    ponentes: Array,
  },
  data() {
    return {
      submited: false,
      title_modal: "NUEVO PONENTE",
      // listar_preguntas: this.preguntas,
      frmRegistrarPonente: {
        id: "",
        nombre: "",
        apellidoPaterno: "",
        apellidoMaterno: "",
        email: "",
        dni: null,
        modal: "",
      },
    };
  },
  mounted() {
    this.TablaPonentes();
  },
  methods: {
    TablaPonentes() {
      this.$nextTick(() => {
        var table = $("#tblPonentes").DataTable({
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
      console.log('ingreso');
      this.submited = true;
      self = this;
      let data = new FormData();

        data.append("modal", this.frmRegistrarPonente.modal);
        data.append("dni", this.frmRegistrarPonente.dni);
        data.append("email", this.frmRegistrarPonente.email);
      axios
        .post(
          route("administrativa.verificar_ponentes"),
          data
        )
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
          } else 
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
                axios
                  .post(
                    route("administrativa.guardar_ponente"),
                    self.frmRegistrarPonente
                  )
                  .then(function (response) {
                    
                    let resultado = response.data;
                    // console.log(resultado ==='EXITO');
                    if (resultado != "EXITO") {
                      Swal.fire({
                        icon: "success",
                        title: "¡EXITO!",
                        text: "Ponente registrado",
                        allowOutsideClick: false,
                        preConfirm: (result) => {
                          $("#modalPonente").css("display", "none");
                          $("#footer-navigator").css("display", "flex");
                          self.$inertia.get(route("administrativa.ponentes"));
                        },
                      });
                    } else {
                      Swal.fire({
                        icon: "error",
                        title: "¡Ups!",
                        text: "Algo salió mal",
                      });
                    }
                  });
              },
            });
          }
        });
      // }
    },
  },
};
</script>

<style>
</style>