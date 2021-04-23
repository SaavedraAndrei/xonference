<template>
  <div>
    <section class="seccion-nav">
      <div class="barra">
        <div class="contenedor contenido-barra">
          <div class="derecha">
            <div class="logo">
              <img src="/img/logo.svg" alt="Logo gdlwebcamp" />
            </div>
            <div class="menu-movil">
              <img src="/img/barras.svg" alt="Menu Responsive" />
            </div>
          </div>
          <div class="form-row">
            <nav class="navegacion">
            <a href="conferencias.php">Conferencia</a>
            <a href="#">Calendario</a>
            <a href="#">Invitados</a>
            <a href="registro.php">Reservaciones</a>
          </nav>
          </div>
          
        </div>
      </div>
    </section>

    <section class="seccion">
      <div class="contenido-informacion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>

        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni dolor dicta quasi
          voluptas adipisci cum omnis totam asperiores incidunt, accusantium ipsum id quos
          nisi! Recusandae modi sint voluptatem natus illo?modi sint voluptatem natus
          illo?modi sint voluptatem natus illo?modi sint voluptatem natus illo?modi sint
          voluptatem natus illo?modi sint voluptatem natus illo?
        </p>
      </div>
    </section>

    <main class="main">
      <div class="contenido-video">
        <video autoplay muted loop>
          <source src="/video/video.mp4" type="video/mp4" />
          <source src="/video/video.ogv" type="video/ogg" />
          <source src="/video/video.webm" type="video/webm" />
        </video>
      </div>

      <div class="contenido-programa">
        <div class="programa-evento">
          <h2>Programa del Evento</h2>

          <nav class="menu-programa">
            <a href="#talleres"><i class="fas fa-code"> </i>Talleres</a>
            <a href="#conferencias"><i class="fas fa-comment"></i>Conferencias</a>
            <a href="#seminarios"><i class="fas fa-university"> </i>Seminarios</a>
          </nav>

          <div id="talleres" class="info-curso ocultar">
            <div class="detalle-evento">
              <h3>HTML5, CSS3, JavaScript</h3>
              <p><i class="fas fa-clock"></i> 16:00 Hrs</p>
              <p><i class="fas fa-calendar"></i> 20 de Marzo</p>
              <p><i class="fas fa-user"></i> Andrei Saavedra Rivera</p>
            </div>
            <div class="detalle-evento">
              <h3>Responsive Web Design</h3>
              <p><i class="fas fa-clock"></i> 20:00 Hrs</p>
              <p><i class="fas fa-calendar"></i> 20 de Marzo</p>
              <p><i class="fas fa-user"></i> Andrei Saavedra Rivera</p>
            </div>

            <div class="align-right">
              <a href="#" class="boton boton-naranja btn">Ver Todos</a>
            </div>
          </div>

          <div id="conferencias" class="info-curso ocultar">
            <div class="detalle-evento">
              <h3>Cómo ser FreeLancer?</h3>
              <p><i class="fas fa-clock"></i> 16:00 Hrs</p>
              <p><i class="fas fa-calendar"></i> 20 de Marzo</p>
              <p><i class="fas fa-user"></i> Andrei Saavedra Rivera</p>
            </div>
            <div class="detalle-evento">
              <h3>Tecnologías del Futuro</h3>
              <p><i class="fas fa-clock"></i> 20:00 Hrs</p>
              <p><i class="fas fa-calendar"></i> 20 de Marzo</p>
              <p><i class="fas fa-user"></i> Andrei Saavedra Rivera</p>
            </div>

            <div class="align-right">
              <a href="#" class="boton boton-naranja btn">Ver Todos</a>
            </div>
          </div>

          <div id="seminarios" class="info-curso ocultar">
            <div class="detalle-evento">
              <h3>Diseño UX Y UI</h3>
              <p><i class="fas fa-clock"></i> 16:00 Hrs</p>
              <p><i class="fas fa-calendar"></i> 20 de Marzo</p>
              <p><i class="fas fa-user"></i> Andrei Saavedra Rivera</p>
            </div>
            <div class="detalle-evento">
              <h3>Aprende a Diseñar en STyLes</h3>
              <p><i class="fas fa-clock"></i> 20:00 Hrs</p>
              <p><i class="fas fa-calendar"></i> 20 de Marzo</p>
              <p><i class="fas fa-user"></i> Andrei Saavedra Rivera</p>
            </div>

            <div class="align-right">
              <a href="#" class="boton boton-naranja btn">Ver Todos</a>
            </div>
          </div>
        </div>
      </div>
    </main>

    <section class="invitados">
      <div class="contenido-invitados contenedor">

        <nav class="navegacion">
        <h2><a text-align="center" href="/invitados">Nuestros Invitados</a></h2>
        </nav>

<br>
        <ul class="lista-invitados">
          <li>
            <div class="invitado">
              <img src="/img/invitado1.webp" alt="" />
              <p>Rafael Bautista</p>
            </div>
          </li>

          <li>
            <div class="invitado">
              <img src="/img/invitado2.webp" alt="" />
              <p>Shari Herrera</p>
            </div>
          </li>

          <li>
            <div class="invitado">
              <img src="/img/invitado3.webp" alt="" />
              <p>Gregorio Sanchez</p>
            </div>
          </li>

          <li>
            <div class="invitado">
              <img src="/img/invitado4.webp" alt="" />
              <p>Susana Rivera</p>
            </div>
          </li>

          <li>
            <div class="invitado">
              <img src="/img/invitado5.webp" alt="" />
              <p>Harold Garcia</p>
            </div>
          </li>

          <li>
            <div class="invitado">
              <img src="/img/invitado6.webp" alt="" />
              <p>Susan Sanchez</p>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <section class="contador parallax">
      <div class="contenedor">
        <ul class="resumen-evento">
          <li>
            <p class="numero">0</p>
            invitados
          </li>
          <li>
            <p class="numero">0</p>
            Talleres
          </li>
          <li>
            <p class="numero">0</p>
            Días
          </li>
          <li>
            <p class="numero">0</p>
            Conferencias
          </li>
        </ul>
      </div>
    </section>

    <section class="precio">
      <h2>Precios</h2>

      <div class="contenedor-precios contenedor">
        <ul class="lista-precios">
          <li class="anuncio-precio">
            <div class="tabla-precio">
              <h3>Pase por Día</h3>
              <p class="numero">$30</p>

              <ul>
                <li>Bocadillos Gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>

              <div class="derecha">
                <a href="#" class="boton boton-naranja-block hollow">Comprar</a>
              </div>
            </div>
          </li>
        </ul>

        <ul class="lista-precios">
          <li class="anuncio-precio">
            <div class="tabla-precio">
              <h3>Todos los Días</h3>
              <p class="numero">$50</p>

              <ul>
                <li>Bocadillos Gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>

              <div class="derecha">
                <a href="#" class="boton boton-naranja-block">Comprar</a>
              </div>
            </div>
          </li>
        </ul>

        <ul class="lista-precios">
          <li class="anuncio-precio">
            <div class="tabla-precio">
              <h3>Pase por 2 Días</h3>
              <p class="numero">$45</p>

              <ul>
                <li>Bocadillos Gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>

              <div class="derecha">
                <a href="#" class="boton boton-naranja-block hollow">Comprar</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <div id="map" class="mapa"></div>

    <section class="seccion">
      <h2>Testimoniales</h2>

      <div class="contenido-testimonial contenedor">
        <blockquote class="testimonial">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente omnis est
            itaque minima, voluptate vitae quisquam, quasi reiciendis modi magni expedita
            ducimus perferendis. Dignissimos officiis ad illum sapiente quisquam quasi.
          </p>
          <footer class="info-testimonial">
            <img src="/img/testimonial.webp" alt="Testimonial" />
            <cite>Andrei Saavedra<br /><span>diseñador web en @google</span></cite>
          </footer>
        </blockquote>

        <blockquote class="testimonial">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente omnis est
            itaque minima, voluptate vitae quisquam, quasi reiciendis modi magni expedita
            ducimus perferendis. Dignissimos officiis ad illum sapiente quisquam quasi.
          </p>
          <footer class="info-testimonial">
            <img src="/img/testimonial.webp" alt="Testimonial" />
            <cite>Andrei Saavedra<br /><span>diseñador web en @google</span></cite>
          </footer>
        </blockquote>

        <blockquote class="testimonial">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente omnis est
            itaque minima, voluptate vitae quisquam, quasi reiciendis modi magni expedita
            ducimus perferendis. Dignissimos officiis ad illum sapiente quisquam quasi.
          </p>
          <footer class="info-testimonial">
            <img src="/img/testimonial.webp" alt="Testimonial" />
            <cite>Andrei Saavedra<br /><span>diseñador web en @google</span></cite>
          </footer>
        </blockquote>
      </div>
    </section>

    <section class="newsletter parallax">
      <div class="contenido-newsletter contenedor">
        <p>Registrate al newsletter:</p>
        <h3>GDLWEBCAMP</h3>
        <a href="#" class="boton boton-naranja hollow">Registro</a>
      </div>
    </section>

    <section class="seccion">
      <h2>Faltan</h2>
      <div class="cuenta-regresiva contenedor">
        <div class="cuenta">
          <p id="dias" class="numero"></p>
          <p class="fecha">Días</p>
        </div>

        <div class="cuenta">
          <p id="horas" class="numero"></p>
          <p class="fecha">Horas</p>
        </div>

        <div class="cuenta">
          <p id="minutos" class="numero"></p>
          <p class="fecha">Minutos</p>
        </div>

        <div class="cuenta">
          <p id="segundos" class="numero"></p>
          <p class="fecha">Segundos</p>
        </div>
      </div>
    </section>
  </div>
  <!-- <?php

include('includes/templates/footer.php')

?> -->
</template>

<script>
export default {};
</script>

<style></style>
