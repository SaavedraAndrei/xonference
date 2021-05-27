<template>
  <layout ref="layout">
      <div slot="c_foros">
          <div class="content" style="display: block">
               <div class="card">
          <div class="card-header">
            <strong>FORO</strong>
          </div>
          <div class="card-title">PANEL DE PREGUNTAS</div>
          <div class="card-body card-block">
            <div class="form-row">
              <div class="form-group col-xs-4">
                <label for="text-input" class="form-control-label label-title"
                  >Primera pregunta:</label
                >
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
            <br />
            <br />
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
}
</script>

<style>

</style>