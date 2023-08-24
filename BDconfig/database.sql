-- Inicia sesión en MySQL como usuario root o un usuario con privilegios de administrador
CREATE DATABASE paecblog CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Crea un nuevo usuario y establece la contraseña
CREATE USER 'paecadmin'@'localhost' IDENTIFIED BY '7cronos1';

-- Otorga todos los permisos al usuario sobre la base de datos
GRANT ALL PRIVILEGES ON paecblog.* TO 'paecadmin'@'localhost';

-- Actualiza los privilegios para que los cambios tengan efecto
FLUSH PRIVILEGES;

-- Creacion de tablas
USE paecblog;

CREATE TABLE post (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  categoria varchar(30) NOT NULL,
  author varchar(30) NOT NULL,
  title varchar(200) NOT NULL,
  sinopsis varchar(800) NOT NULL,
  content TEXT NOT NULL,
  date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  image_url varchar(255) DEFAULT NULL
);
 
 
INSERT INTO post (id, categoria, author, title, sinopsis, content, date, image_url) VALUES
(1, 'informatica', 'Cronos', 'Titulo 1', 'sinopsis', 'Contenido del post 1', '2017-06-10 21:26:07', 'assets/img/portfolio/portfolio-1.jpg'),
(2, 'ofimatica', 'Cronos', 'Titulo 2', 'sinopsis', 'Contenido del post 2', '2017-06-11 21:26:07', 'assets/img/images-post/python_lenguaje.jpg'),
(3, 'software', 'Cronos', 'Titulo 3', 'sinopsis', 'Contenido del post 3', '2017-06-12 21:26:07', 'assets/img/images-post/python_lenguaje.jpg'),
(4, 'informatica', 'Cronos', 'Titulo 4','sinopsis', 'Contenido del post 4', '2017-06-13 21:26:07', 'assets/img/images-post/python_lenguaje.jpg');
INSERT INTO post (categoria, author, title, sinopsis, content, date, image_url) VALUES
('informatica', 'Cronos', 'Lenguaje Python','Python es un lenguaje de programación versátil y de alto nivel. Reconocido por su legibilidad y simplicidad, Python se ha', 'Python es un lenguaje de programación versátil y de alto nivel. Reconocido por su legibilidad y simplicidad, Python se ha convertido en una herramienta esencial en el mundo del desarrollo de software. Su sintaxis clara y estructura intuitiva lo hacen especialmente adecuado tanto para principiantes como para profesionales de la programación.

Python es utilizado en una amplia gama de aplicaciones, desde desarrollo web y aplicaciones móviles hasta análisis de datos, inteligencia artificial y automatización de tareas. Su amplia biblioteca estándar y su capacidad para integrarse con otros lenguajes y tecnologías hacen que sea fácil y rápido crear soluciones eficientes y robustas para diversos desafíos.

En resumen, Python es un lenguaje poderoso que ofrece una combinación única de facilidad de uso y potencia, lo que lo convierte en una opción ideal para desarrolladores de todos los niveles que buscan crear soluciones efectivas y eficientes en una variedad de campos.', '2017-06-14 21:26:07', 'assets/img/images-post/python_lenguaje.webp');



INSERT INTO post (categoria, author, title, sinopsis, content, date, image_url) VALUES
('informatica', 'Cronos', 'Instalación de Python en Windows','Instalar Python en Windows es un proceso sencillo que te permitirá comenzar a programar en este lengu', '
    <p>Instalar Python en Windows es un proceso sencillo que te permitirá comenzar a programar en este lenguaje. Sigue estos pasos:</p>
    <ol>
        <li><strong>Descarga el Instalador:</strong> Podes descargar el instalador para windows desde (<a href="Programas/programacion/python_install.exe" target="_blank">AQUI</a>) y descarga el instalador correspondiente a tu versión de Windows (32 bits o 64 bits).</li>
        <li><strong>Ejecuta el Instalador:</strong> Haz doble clic en el archivo descargado para ejecutar el instalador.</li>
        <li><strong>Configura la Instalación:</strong>
            <ul>
                <li>Marca la casilla "Add Python x.x to PATH" (Agregar Python x.x a la variable PATH). Esto te permitirá ejecutar Python desde la línea de comandos sin necesidad de especificar la ruta completa.</li>
                <li>Selecciona "Install Now" (Instalar ahora) para realizar la instalación estándar.</li>
            </ul>
        </li>
        <li><strong>Espera a que Termine la Instalación:</strong> El instalador copiará los archivos necesarios y configurará Python en tu sistema.</li>
        <li><strong>Verifica la Instalación:</strong>
            <ul>
                <li>Abre la línea de comandos (Presiona la tecla de Windows, escribe "cmd" y presiona Enter).</li>
                <li>Escribe <code>python --version</code> y presiona Enter. Deberías ver la versión de Python instalada.</li>
            </ul>
        </li>
    </ol>
    <p>¡Listo! Ahora tienes Python instalado en tu sistema Windows y estás listo para comenzar a programar. Puedes abrir la línea de comandos y escribir <code>python</code> para acceder al intérprete interactivo de Python o crear archivos <code>.py</code> con tu código y ejecutarlos usando <code>python nombre_del_archivo.py</code>.</p>
', '2017-06-14 21:26:07', 'assets/img/images-post/python_install.jpg');



-- en caso de necesitar
 DROP TABLE nombre_base_de_datos;

UPDATE post SET image_url = 'assets/img/images-post/python_lenguaje.webp' WHERE id = 5;
UPDATE post SET content = 
'<h1>Instalación de Python en Windows</h1>
    <p>Instalar Python en Windows es un proceso sencillo que te permitirá comenzar a programar en este lenguaje. Sigue estos pasos:</p>
    <ol>
        <li><strong>Descarga el Instalador:</strong> Podes descargar el instalador para windows desde (<a href="Programas/programacion/python_install.exe" target="_blank">AQUI</a>) y descarga el instalador correspondiente a tu versión de Windows (32 bits o 64 bits).</li>
        <li><strong>Ejecuta el Instalador:</strong> Haz doble clic en el archivo descargado para ejecutar el instalador.</li>
        <li><strong>Configura la Instalación:</strong>
            <ul>
                <li>Marca la casilla "Add Python x.x to PATH" (Agregar Python x.x a la variable PATH). Esto te permitirá ejecutar Python desde la línea de comandos sin necesidad de especificar la ruta completa.</li>
                <li>Selecciona "Install Now" (Instalar ahora) para realizar la instalación estándar.</li>
            </ul>
        </li>
        <li><strong>Espera a que Termine la Instalación:</strong> El instalador copiará los archivos necesarios y configurará Python en tu sistema.</li>
        <li><strong>Verifica la Instalación:</strong>
            <ul>
                <li>Abre la línea de comandos (Presiona la tecla de Windows, escribe "cmd" y presiona Enter).</li>
                <li>Escribe <code>python --version</code> y presiona Enter. Deberías ver la versión de Python instalada.</li>
            </ul>
        </li>
    </ol>
    <p>¡Listo! Ahora tienes Python instalado en tu sistema Windows y estás listo para comenzar a programar. Puedes abrir la línea de comandos y escribir <code>python</code> para acceder al intérprete interactivo de Python o crear archivos <code>.py</code> con tu código y ejecutarlos usando <code>python nombre_del_archivo.py</code>.</p>
' WHERE id = 7;