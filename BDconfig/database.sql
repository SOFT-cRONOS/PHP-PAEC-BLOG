-- Inicia sesión en MySQL como usuario root o un usuario con privilegios de administrador
CREATE DATABASE paecblog;

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
  date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  image_url varchar(255) DEFAULT NULL,
);
 
 
INSERT INTO post (id, author, title, sinopsis, content, date, image_url) VALUES
(1, 'informatica', 'Cronos', 'Titulo 1', 'sinopsis', 'Contenido del post 1', '2017-06-10 21:26:07', 'assets/img/portfolio/portfolio-1.jpg'),
(2, 'ofimatica', 'Cronos', 'Titulo 2', 'sinopsis', 'Contenido del post 2', '2017-06-11 21:26:07', 'assets/img/images-post/python_lenguaje.jpg'),
(3, 'software', 'Cronos', 'Titulo 3', 'sinopsis', 'Contenido del post 3', '2017-06-12 21:26:07', 'assets/img/images-post/python_lenguaje.jpg'),
(4, 'informatica', 'Cronos', 'Titulo 4','sinopsis', 'Contenido del post 4', '2017-06-13 21:26:07', 'assets/img/images-post/python_lenguaje.jpg'),
(5, 'informatica', 'Cronos', 'Lenguaje Python','Python es un lenguaje de programación versátil y de alto nivel. Reconocido por su legibilidad y simplicidad, Python se ha', 'Python es un lenguaje de programación versátil y de alto nivel. Reconocido por su legibilidad y simplicidad, Python se ha convertido en una herramienta esencial en el mundo del desarrollo de software. Su sintaxis clara y estructura intuitiva lo hacen especialmente adecuado tanto para principiantes como para profesionales de la programación.

Python es utilizado en una amplia gama de aplicaciones, desde desarrollo web y aplicaciones móviles hasta análisis de datos, inteligencia artificial y automatización de tareas. Su amplia biblioteca estándar y su capacidad para integrarse con otros lenguajes y tecnologías hacen que sea fácil y rápido crear soluciones eficientes y robustas para diversos desafíos.

En resumen, Python es un lenguaje poderoso que ofrece una combinación única de facilidad de uso y potencia, lo que lo convierte en una opción ideal para desarrolladores de todos los niveles que buscan crear soluciones efectivas y eficientes en una variedad de campos.', '2017-06-14 21:26:07', 'assets/img/images-post/python_lenguaje.jpg');