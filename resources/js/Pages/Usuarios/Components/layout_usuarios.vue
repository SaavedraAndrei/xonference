<template>
  <div id="wrapper">
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <div class="navbar-header">
        <inertia-link class="navbar-brand" href="#"
          ><img :src="'/img/logo.svg'" alt="logo" id="logoPrincipal"
        /></inertia-link>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <inertia-link 
        class="nav-link" 
        :href="$route('usuario.principal')"
          ><i class="fa fa-home"></i><span>Principal</span></inertia-link
        >
        <!-- v-if="$page.props.user_permissions.includes('75515603')" -->
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Gestiones</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#menuMenuLista"
          aria-expanded="true"
          aria-controls="menuMenuLista"
        >
          <i class="fas fa-user-friends"></i>
          <span>Menu</span>
        </a>
        <div
          id="menuMenuLista"
          class="collapse"
          aria-labelledby="headingTwo"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <inertia-link
              class="collapse-item"
              :href="$route('usuario.asistencia')"
              v-if="
                $page.props.user_permissions.permisos.includes(
                  'ASISTENCIA'
                )
              "
              >conferencias
            </inertia-link>

            <inertia-link 
            class="collapse-item">
              prueba
            </inertia-link>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#menuCargos"
          aria-expanded="true"
          aria-controls="menuCargos"
        >
          <i class="fas fa-file-invoice"></i>
          <span>Cargos</span>
        </a>
        <div
          id="menuCargos"
          class="collapse"
          aria-labelledby="headingTwo"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <inertia-link class="collapse-item" href="#"
              >Listar cargos</inertia-link
            >
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a
          class="nav-link collapsed"
          href="#"
          data-toggle="collapse"
          data-target="#menuMantenimiento"
          aria-expanded="true"
          aria-controls="menuMantenimiento"
        >
          <i class="fas fa-cogs"></i>
          <span>Mantenimiento</span>
        </a>
        <div
          id="menuMantenimiento"
          class="collapse"
          aria-labelledby="headingTwo"
          data-parent="#accordionSidebar"
        >
          <div class="bg-white py-2 collapse-inner rounded">
            <inertia-link class="collapse-item" href="#"
              >Listar feriados</inertia-link
            >
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" />

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav
          class="navbar navbar-expand navbar-light bg-white topbar static-top shadow"
        >
          <!-- Sidebar Toggle (Topbar) -->
          <button
            id="sidebarToggleTop"
            class="btn btn-link d-md-none rounded-circle"
          >
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
          >
            <div class="input-group">
              <input
                type="text"
                class="form-control bg-light border-1 small"
                placeholder="Buscar..."
                aria-label="Search"
                aria-describedby="basic-addon2"
              />
              <div class="input-group-append">
                <button class="btn btn-action" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="searchDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i
                  class="fas fa-search fa-fw"
                  style="color: var(--colorMedio)"
                ></i>
              </a>
              <!-- Dropdown - Messages -->
              <div
                class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown"
              >
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input
                      type="text"
                      class="form-control bg-light border-0 small"
                      placeholder="Search for..."
                      aria-label="Search"
                      aria-describedby="basic-addon2"
                    />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item -  Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="alertsDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                title="Notificaciones"
              >
                <i
                  class="fas fa-bell fa-fw"
                  style="color: var(--colorMedio)"
                ></i>
                <!-- Counter - Alerts -->
                <!-- <span class="badge badge-danger badge-counter">3+</span> -->
              </a>
              <!-- Dropdown - Alerts -->
              <div
                class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown"
              >
                <h6 class="dropdown-header">Mis notificaciones</h6>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                onclick="#"
                id="messagesDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                title="Ir a correo"
              >
                <i
                  class="fas fa-envelope fa-fw"
                  style="color: var(--colorMedio)"
                ></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"></span>
              </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="userDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{session('usuario')}} </span> -->
                <img
                  class="img-profile rounded-circle"
                  :src="'/img/general/foto-usuario.svg'"
                />
              </a>
              <!-- Dropdown - User Information -->
              <div
                class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown"
              >
                <a class="dropdown-item" href="#">
                  <i
                    class="fas fa-cogs fa-sm fa-fw mr-2"
                    style="color: var(--colorMedio)"
                  ></i>
                  Configuraciones
                </a>
                <div class="dropdown-divider"></div>
                <a
                  class="dropdown-item"
                  href="#"
                  onclick="parent.location='/home'"
                  data-toggle="modal"
                  data-target="#logoutModal"
                >
                  <i
                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2"
                    style="color: var(--colorMedio)"
                  ></i>
                  Salir
                </a>
              </div>
            </li>
          </ul>
        </nav>

        <slot name="c_principal"></slot>
        <slot name="c_mi_menu_materiales"></slot>
      </div>

      <!------------- BOTONES DE NAVEGACIÓN ----------->
      <nav
        id="footer-navigator"
        class="navbar navbar-expand navbar-light topbar static-top footer-nav"
      >
        <a class="border-btn nav-link" href="#" @click="goBack()">
          <i class="fas fa-angle-left nav-icon"></i>
        </a>

        <a class="center-btn nav-link" href="#" @click="reload()">
          <i class="fas fa-redo-alt nav-icon" style="font-size: 20px"></i>
        </a>

        <a class="border-btn nav-link" href="#" @click="goForward()">
          <i class="fas fa-angle-right nav-icon"></i>
        </a>
      </nav>
    </div>
  </div>
</template>

<script>
</script>

<style lang="css">
:root {
  --colorBajo: #def7ff;
  --colorMedio: #337ba3;
  --colorAlto: #1f5a92;
}
</style>