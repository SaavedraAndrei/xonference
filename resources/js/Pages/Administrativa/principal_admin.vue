<template>
  <layout ref="layout">
    <div slot="c_principal_admi">
      <div class="container">
        <div class="row pt-5 m-auto">
          <div class="col-md-6 col-lg-12 pb-3">
            <div
              class="card card-custom bg-white border-white border-0"
              style="border-radius: 20px"
            >
              <div class="card-custom-img">
                <h1 class="module-title">MI MENU</h1>
              </div>
              <div class="card-custom-avatar">
                <img
                  class="img-fluid"
                  v-bind:src="'/img/general/foto-usuario.png'"
                  alt="Avatar"
                />
              </div>
              <div class="card-body bg-white" style="overflow-y: auto">
                <h4 class="welcome-message">
                  Bienvenido, {{ $page.props.user_session.nombres }}
                </h4>
                <p class="card-text">Novedades para ti:</p>
                <span class="date">{{ new Date().toLocaleDateString() }} </span>
                <div class="card-body bg-white">
                  <ul class="list-group"></ul>
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
import layout from './Components/layout_administrativa.vue'
export default {
  components: { layout },

}
</script>

<style lang="css">
.card-custom-img {
  background-image: url(/img/asistencia/fondo-validacion.png);
}
</style>