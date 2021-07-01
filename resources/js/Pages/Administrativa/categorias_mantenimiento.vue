<template>
  <layout ref="layout">
    <div slot="c_categorias_mantenimiento">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>CATEGORIAS</strong>
          </div>
          <div class="card-title">PANEL DE LISTADO</div>
          <div class="card-body card-block">
            <div class="text-center mb-2">
              <button
                class="btn btn-action btn-icon-split"
                id="btnRegistrarAsistencia"
                @click="NuevaCategoria()"
              >
                <span class="icon text-white">
                  <i class="far fa-id-badge"></i>
                </span>
                <span class="text font-size-layout">Agregar categorias</span>
              </button>
            </div>
            <div id="search-content">
              <div
                class="input-group row col-md-3 mb-1 input-search"
                id="s_content"
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
              <table class="table table-hover" id="tblCategorias">
                <thead>
                  <tr>
                    <th>EDITAR</th>
                    <th>NOMBRE</th>
                    <!-- <th>CORREO</th>
                    <th>DNI</th> -->
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="categoria in categorias" :key="categoria.id">
                    <td class="table-bordered" align="center">
                      <button
                        class="btn btn-action btn-icon-split"
                        @click="EditarCategoria(categoria)"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-edit" style="color: white"></i>
                        </span>
                      </button>
                    </td>
                    <td class="table-bordered" align="center">
                      {{ categoria.nombre }}
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
        <div id="modalCategoria" class="modal">
          <div class="w-40 modal-content">
            <div class="modal-body ">
              <div class="content" style="display: block">
                <div class="card">
                  <div class="card-header">
                    <div id="c_titulo">
                      <strong id="title">{{ title_modal }}</strong>
                    </div>
                  </div>
                  <div class="card-title">DATOS DE LA CATEGORIA</div>
                  <div class="card-body card-block">
                    <form @submit.prevent="GuardarCategoria">
                      <input
                        type="text"
                        id="txtModal"
                        v-model="frmCrearCategoria.modal"
                        hidden
                      />
                      <input
                        type="text"
                        id="txtIdPregunta"
                        hidden
                        v-model="frmCrearCategoria.id"
                      />
                      <div class="col form-group">
                        <label class="form-control-label label-title"
                          >ESCRIBIR NOMRE</label
                        >
                        <input
                          class="form-control"
                          type="text"
                          name="inpNombre"
                          id="inpNombre"
                          v-model="frmCrearCategoria.nombre"
                          placeholder="Ingrese el nombre"
                        />
                        <div
                            v-if="
                              submited &&
                              !$v.frmCrearCategoria.nombre.required
                            "
                            style="color: red; font-size: 12px"
                          >
                            *Campo obligatorio
                          </div>
                      </div>
                    </form>
                    <hr />
                    <div class="text-right">
                      <button
                        class="btn btn-action btn-icon-split mb-1"
                        id="btnGuardarCambios"
                        @click="GuardarCategoria()"
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
import { required } from "vuelidate/lib/validators";
export default {
  components: { layout },
  props: {
    categorias: Array,
  },
  data() {
    return {
      submited: false,
      title_modal: "NUEVA CATEGORIA",
      frmCrearCategoria: {
        id: "",
        nombre: "",
        modal: "",
      },
    };
  },
  validations: {
    frmCrearCategoria: {
      nombre: { required },
    },
  },
  mounted() {
    this.TablaEstados();
   var elemento = document.getElementById("tblCategorias");
    if (elemento != null) {
      if (screen.width < 1000) {
        elemento.classList.add("table-responsive");
      }
    }
  },
  methods: {
    TablaEstados() {
      this.$nextTick(() => {
        var table = $("#tblCategorias").DataTable({
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
    hidenav() {
      return this.$refs.layout.hide_nav();
    },
    shownav() {
      return this.$refs.layout.show_nav();
    },
    NuevaCategoria() {
      // console.log(pregunta.id);
      this.submited = false;
      this.title_modal = "NUEVA CATEGORIA";
      this.frmCrearCategoria.id = 0;
      this.frmCrearCategoria.nombre = "";
      this.frmCrearCategoria.modal = "NUEVO";
      document.getElementById("modalCategoria").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalCategoria").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    EditarCategoria(categoria) {
      this.submited = false;
      this.title_modal = "EDITAR PONENTE";
      this.frmCrearCategoria.id = categoria.id;
      this.frmCrearCategoria.nombre = categoria.nombre;
      this.frmCrearCategoria.modal = "EDITAR";

      document.getElementById("modalCategoria").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalCategoria").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    ActualizarTabla() {
      $("#tblCategorias").DataTable().destroy();
      this.TablaEstados();
    },
    GuardarCategoria() {
      this.submited = true;
      self = this;
      if (this.$v.$invalid) {
        console.log("hola");
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
              route("categoria.guardar"),
              self.frmCrearCategoria,
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
                        // console.log(Swal.getContent());
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
                      // self.submited = false;
                      $("#tblCategorias").DataTable().destroy();
                      self.TablaEstados();
                      $("#modalCategoria").css("display", "none");
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