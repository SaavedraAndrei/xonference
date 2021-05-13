
CREATE TABLE eventos (
  id BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  tematica VARCHAR(100) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  fecha_conferencia DATETIME NOT NULL,
  usuario_creacion INT(11) NULL,
  usuario_actualizacion INT(11) NULL,
  idPonente BIGINT(20) NULL,
  idCategoria BIGINT(20) NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,

  FOREIGN KEY (idCategoria) REFERENCES congreso.categorias(id),
  FOREIGN KEY (idPonente) REFERENCES congreso.ponentes(id))


