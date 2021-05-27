CREATE TABLE asistencias(
id INTEGER AUTO_INCREMENT PRIMARY KEY,
fecha_hora DATETIME,
asistio BOOLEAN,
tipo VARCHAR(200) NOT NULL,
dni INTEGER NOT NULL,
id_conferencia integer NOT NULL,
created_at DATETIME NOT NULL,
updated_at DATETIME NOT NULL
)


UPDATE eventos SET fecha_evento = NOW() WHERE id = 1;
UPDATE eventos SET fecha_evento = '23:00:00' WHERE id = 1;



CREATE TABLE usuarios_horarios_asignados(
id INTEGER AUTO_INCREMENT PRIMARY KEY,
id_eventos INTEGER,
dni INTEGER,
created_at DATETIME,
updated_at DATETIME
)

INSERT INTO usuarios_horarios_asignados (id_eventos, dni)
VALUES(1, 12345678);