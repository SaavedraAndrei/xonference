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
                      @click="EditarCategoria()">
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
  mounted() {
      $(document).ready( function () {
    $('#tblCategorias').DataTable();
} );
  },
  methods: {
    NuevaCategoria() {
      // console.log(pregunta.id);
      this.submited = false;
      this.title_modal = "NUEVO PONENTE";
      this.frmCrearCategoria.id = 0;
      this.frmCrearCategoria.nombre = "";
      this.frmCrearCategoria.modal = "NUEVO";

      document.getElementById("modalPonente").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalPonente").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    EditarCategoria(ponente) {
      this.submited = false;
      this.title_modal = "EDITAR PONENTE";
      this.frmCrearCategoria.id = ponente.id;
      this.frmCrearCategoria.nombre = ponente.nombre;
      this.frmCrearCategoria.modal = "EDITAR";

      document.getElementById("modalPonente").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalPonente").style.display = "none";
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