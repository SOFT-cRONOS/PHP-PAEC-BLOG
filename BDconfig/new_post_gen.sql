
UPDATE post
SET content = '    <p>En el vasto mundo de la gestión de bases de datos, MySQL emerge como un gigante confiable. Esta potente base de datos de código abierto ha sido una elección predilecta en aplicaciones web, empresariales y de software durante décadas. En esta entrada, exploraremos qué es MySQL, cómo instalarlo y cómo dar los primeros pasos en su uso.</p>

    <h2>MySQL en Breve</h2>
    <p>MySQL es un sistema de gestión de bases de datos relacionales (RDBMS) que se utiliza para almacenar, administrar y recuperar datos de manera eficiente. Su estructura de tablas y relaciones facilita la organización y recuperación de datos, lo que lo convierte en una elección ideal para aplicaciones que requieren un almacenamiento estructurado.</p>

    <h2>Instalación de MySQL</h2>
    <ol>
        <li><strong>Descarga e Instalación</strong>:
            <ul>
                <li>Visita el sitio web oficial de MySQL (<a href="https://dev.mysql.com/downloads/" target="_blank">https://dev.mysql.com/downloads/</a>) y selecciona la versión adecuada para tu sistema operativo.</li>
                <li>Descarga el instalador y ejecútalo. Sigue las instrucciones para completar la instalación.</li>
                <li>Tambien descarga una buena alternativa para tus proyectos (<a href="Programas/programacion/xampp.exe" target="_blank">Descargar XAMPP</a>) .</li>
                <li>Visita (<a href="http://192.168.1.220/post.php?id=4" target="_blank">Instalar XAMPP</a>) para aprender mas</li>
            </ul>
        </li>
        <li><strong>Configuración Inicial</strong>:
            <ul>
                <li>Durante la instalación, se te pedirá establecer una contraseña para el usuario "root" de MySQL. Asegúrate de elegir una contraseña segura y guárdala en un lugar seguro.</li>
            </ul>
        </li>
        <li><strong>Inicio del Servidor</strong>:
            <ul>
                <li>Una vez instalado, inicia el servidor MySQL. Puedes hacerlo desde el Panel de Control de Windows o mediante comandos en la terminal, dependiendo de tu sistema operativo.</li>
            </ul>
        </li>
        <li><strong>Acceso a MySQL</strong>:
            <ul>
                <li>Abre una terminal o línea de comandos y ejecuta <code>mysql -u root -p</code>. Te pedirá la contraseña que estableciste durante la instalación.</li>
            </ul>
        </li>
    </ol>

    <h2>Comandos Básicos de MySQL -  Primeros Pasos</h2>
    <p>Una vez dentro de MySQL, puedes comenzar a interactuar con la base de datos. Aquí tienes algunos comandos básicos para comenzar, junto con sus explicaciones:</p>
        
            <ul>
                <li>Crear una Base de Datos:</li>
            </ul>
        <div class="codigo">
            <code>
                CREATE DATABASE nombre_de_la_base_de_datos;
            </code>
        </div>


            <ul>
                <li>Crear una Base de Datos:</li>
            </ul>
            <div class="codigo">
        <code>
            USE nombre_de_la_base_de_datos;
        </code>
    </div>
            <ul>
                <li>Crear una Tabla::</li>
            </ul>
            <div class="codigo">
            <code>
            CREATE TABLE nombre_de_la_tabla (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(255),
            edad INT
            );

        </code>
    </div>
            <ul>
                <li>Consultar Datos de una Tabla:</li>
            </ul>
            <div class="codigo">
            <code>
            SELECT * FROM nombre_de_la_tabla;
        </code>
    </div>
            <ul>
                <li>Actualizar Datos en una Tabla:</li>
            </ul>
            <div class="codigo">
            <code>
            UPDATE nombre_de_la_tabla SET edad = 31 WHERE nombre = ''Juan'';
        </code>
    </div>
            <ul>
                <li>Eliminar Datos de una Tabla:</li>
            </ul>
            <div class="codigo">
            <code>
            DELETE FROM nombre_de_la_tabla WHERE nombre = ''Juan'';
        </code>
    </div>

    <p>Estos son solo algunos comandos básicos de MySQL para comenzar a trabajar con bases de datos.
'
WHERE id = 3;

-- link para descarga (<a class="botn-link" href="Programas/programa.exe" target="_blank">Descargar</a>)
INSERT INTO post (id_categoria, id_autor, title, sinopsis, content, date, image_url) VALUES
(1, 
1, 
'Lenguaje Python',
'
MySQL es un sistema de gestión de bases de datos relacionales (RDBMS) que se utiliza para almacenar, administrar y recuperar datos de manera eficiente.

',

'
    <p>En el vasto mundo de la gestión de bases de datos, MySQL emerge como un gigante confiable. Esta potente base de datos de código abierto ha sido una elección predilecta en aplicaciones web, empresariales y de software durante décadas. En esta entrada, exploraremos qué es MySQL, cómo instalarlo y cómo dar los primeros pasos en su uso.</p>

    <h2>MySQL en Breve</h2>
    <p>MySQL es un sistema de gestión de bases de datos relacionales (RDBMS) que se utiliza para almacenar, administrar y recuperar datos de manera eficiente. Su estructura de tablas y relaciones facilita la organización y recuperación de datos, lo que lo convierte en una elección ideal para aplicaciones que requieren un almacenamiento estructurado.</p>

    <h2>Instalación de MySQL</h2>
    <ol>
        <li><strong>Descarga e Instalación</strong>:
            <ul>
                <li>Visita el sitio web oficial de MySQL (<a href="https://dev.mysql.com/downloads/" target="_blank">https://dev.mysql.com/downloads/</a>) y selecciona la versión adecuada para tu sistema operativo.</li>
                <li>Descarga el instalador y ejecútalo. Sigue las instrucciones para completar la instalación.</li>
                <li>Tambien descarga una buena alternativa para tus proyectos (<a href="Programas/programacion/xampp.exe" target="_blank">Descargar XAMPP</a>) .</li>
                <li>Visita (<a href="http://192.168.1.220/post.php?id=4" target="_blank">Instalar XAMPP</a>) para aprender mas</li>
            </ul>
        </li>
        <li><strong>Configuración Inicial</strong>:
            <ul>
                <li>Durante la instalación, se te pedirá establecer una contraseña para el usuario "root" de MySQL. Asegúrate de elegir una contraseña segura y guárdala en un lugar seguro.</li>
            </ul>
        </li>
        <li><strong>Inicio del Servidor</strong>:
            <ul>
                <li>Una vez instalado, inicia el servidor MySQL. Puedes hacerlo desde el Panel de Control de Windows o mediante comandos en la terminal, dependiendo de tu sistema operativo.</li>
            </ul>
        </li>
        <li><strong>Acceso a MySQL</strong>:
            <ul>
                <li>Abre una terminal o línea de comandos y ejecuta <code>mysql -u root -p</code>. Te pedirá la contraseña que estableciste durante la instalación.</li>
            </ul>
        </li>
    </ol>

    <h2>Comandos Básicos de MySQL -  Primeros Pasos</h2>
    <p>Una vez dentro de MySQL, puedes comenzar a interactuar con la base de datos. Aquí tienes algunos comandos básicos para comenzar, junto con sus explicaciones:</p>
    <pre>
        <code>
            <ul>
                <li>Crear una Base de Datos:</li>
            </ul>
            CREATE DATABASE nombre_de_la_base_de_datos;
        </code>
        <code>
            <ul>
                <li>Crear una Base de Datos:</li>
            </ul>
            USE nombre_de_la_base_de_datos;
        </code>
        <code>
            <ul>
                <li>Crear una Tabla::</li>
            </ul>
            CREATE TABLE nombre_de_la_tabla (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(255),
            edad INT
            );

        </code>
        <code>
            <ul>
                <li>Consultar Datos de una Tabla:</li>
            </ul>
            SELECT * FROM nombre_de_la_tabla;
        </code>
        <code>
            <ul>
                <li>Actualizar Datos en una Tabla:</li>
            </ul>
            UPDATE nombre_de_la_tabla SET edad = 31 WHERE nombre = ''Juan'';
        </code>
        <code>
            <ul>
                <li>Eliminar Datos de una Tabla:</li>
            </ul>
            DELETE FROM nombre_de_la_tabla WHERE nombre = ''Juan'';
        </code>
    </pre>

    <p>Estos son solo algunos comandos básicos de MySQL para comenzar a trabajar con bases de datos.


',

'2023-09-09 10:13:07', 

'assets/img/images-post/bannersql.png');


INSERT INTO tags (name) VALUES 
(mysql),
(xampp),
(programacion);


INSERT INTO post_tags (post_id, tag_id) VALUES 
(3, 1),
(3, 4),
(3, 5),
(3, 7),
(3, 6);