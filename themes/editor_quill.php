
<!-- Include stylesheet de quill -->
<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">

<style>
    /* icono de boton insertar imagen desde link  */
    #ql-linkimage {
        /* Define el ancho y la altura del botón, ajustándolo al tamaño de tu icono */
        width: 20px;
        height: 20px;
        /* Establece el icono como fondo del botón y ajusta la posición del icono */
        background-image: url('assets/img/image-link-32.png');
        background-size: cover;
        background-position: center;
        /* Opcionalmente, puedes agregar un borde o estilos adicionales al botón */
        border: none;
        cursor: pointer;
        margin-left: 4px;
        margin-right: 4px
    }
    </style>
<!-- Formulario Nuevo Post -->
<form>
    <div class="row">
    <!-- columna izquierda (Editor post) -->
        <div class="col">
            <!-- Titulo -->
            <div class="form-group mb-3">
                <!-- Titulo -->
                <label for="titulo-post">Titulo del post</label>
                <input class="form-control" type="text" placeholder="Titulo..." id="titulo-post" name="titulo-post">
            </div>
            <!-- Contenedor Editor Nuevo POst -->
                <div class="quill-wrap">
                    <!-- Barra de herramientas -->
                    <div id="toolbar">
                        <span class="ql-formats">
                            <select class="ql-header">
                            <option value="1">Heading</option>
                            <option value="2">Subheading</option>
                            <option selected>Normal</option>
                            </select>
                            <select class="ql-font">
                            <option selected>Sans Serif</option>
                            <option value="serif">Serif</option>
                            <option value="monospace">Monospace</option>
                            </select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-bold"></button>
                            <button class="ql-italic"></button>
                            <button class="ql-underline"></button>
                            <button class="ql-strike"></button>
                        </span>
                        <span class="ql-formats">
                            <select class="ql-color"></select>
                            <select class="ql-background"></select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-list" value="ordered"></button>
                            <button class="ql-list" value="bullet"></button>
                            <select class="ql-align">
                            <option selected></option>
                            <option value="center"></option>
                            <option value="right"></option>
                            <option value="justify"></option>
                            </select>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-blockquote"></button>
                            <button class="ql-link"></button>
                            <button class="ql-image"></button>
                            <button id="ql-linkimage"></button>
                            <button class="ql-code-block"></button>
                            <button class="ql-video"></button>
                        </span>
                        <span class="ql-formats">
                            <button class="ql-clean"></button>
                        </span>
                    </div>
                    <!-- Editor de texto -->
                    <div id="editor">
                    </div>
                </div>
            <!-- Fin Contenedor Nuevo POst -->
        </div>
    <!-- Fin columna izquierda (Editor post) -->
    <!-- columna Derecha (Detalles post) -->
        <div class="col-3">
            <div class="row">
                <!-- Categoria -->
                <div class="form-group mb-2">
                    <label for="categorias">Categoría:</label>
                    <select class="form-control" id="categorias">
                        <!-- opciones del desplegable -->
                    </select>
                </div>
                <!-- Autor -->
                <div>
                    <!-- Autor -->
                </div>
            </div>
            <!-- Sinopsis -->
            <div class="form-group mb-2">
                <label for="sinopsis-post">Breve descripcion:</label>
                <textarea class="form-control" id="sinopsis-post" type="text" placeholder="Siopsis..." name="sinopsis-post"></textarea>
            </div>
            <!-- Tags -->
                <div class="form-group mb-2">
                    <div class="col mb-2">
                        <input class="form-control" type="text" id="tag-input" placeholder="Ingrese tags...">
                    </div>
                    <div class="col">
                        <h6 id="tag-list">
                        </h6>
                    </div>
                </div>
            <!-- Fin Tags -->
        </div>
    <!-- Fin columna Derecha (Detalles post)  -->
    </div>
</form>



<!-- Include the Quill library -->
<script src="assets/vendor/quill/quill.js"></script>
<!-- Initialize Quill editor -->
<script src="assets/vendor/quill/image_size_tool.js"></script>
<script>
    //---------------constructor editor quill ---------------
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: '#toolbar',
                imageDrop: true,
                imageResize: {
                displaySize: true
                }
            }
        });
    //--------------- ditor quill ---------------

    //--------------- Agregar un controlador de eventos para el botón personalizado de inserción de imagen desde URL---
        document.getElementById('ql-linkimage').addEventListener('click', function () {
        var imageUrl = prompt('Por favor, ingresa la URL de la imagen:');
        if (imageUrl) {
            quill.focus();
            quill.clipboard.dangerouslyPasteHTML(quill.getSelection().index, '<img src="' + imageUrl + '" alt="">');
        }
        });
    //--------------- Fin botón personalizado de inserción de imagen desde URL ---  

    //--------------- Codigo de tags que lee el ; ---------------
        const tagInput = document.getElementById('tag-input');
        const tagList = document.getElementById('tag-list');
        const tags_list = []; // Array para almacenar los tags que despues pasa al php


        tagInput.addEventListener('keyup', function(event) {
            if (event.key === ';') {
                event.preventDefault(); // Evitar que el ; se añada al input
                const tagName = tagInput.value.trim(); // Obtener el texto sin espacios al inicio y al final

                if (tagName) {
                    // Crear un elemento span para representar el tag
                    const tagElement = document.createElement('a');
                    tagElement.textContent = tagName;
                    tagElement.classList.add('tags');

                    // Agregar el tag a la lista de tags
                    tagList.appendChild(tagElement);

                    // Agregar el tag al array tags_list sin el punto y coma
                    tags_list.push(tagName.substring(0, tagName.length - 1));

                    // Limpiar el input
                    tagInput.value = '';
                }
            }
            console.log(tags_list);
        });
    //--------------- Fin codigo de tags que lee el ; ---------------
    
    ////--------------- Load del desplegable categorias ---------------
        document.addEventListener('DOMContentLoaded', function () {
        const categoriasDropdown = document.getElementById('categorias');
        
        // Definir la variable "accion" en la solicitud GET
        const accion = "get_categorias";

        // Hacer la solicitud de API Fetch a PHP con la variable "accion"
        fetch(`modulos/funciones.php?accion=${accion}`)
            .then(response => response.json())
            .then(data => {
                
                // Rellenar el desplegable con las categorías obtenidas
                data.forEach(categoria => {
                    const option = document.createElement('option');
                    option.value = categoria.id_categoria;
                    option.textContent = categoria.nombre;
                    categoriasDropdown.appendChild(option);
                    console.log(option)
                });
            })
            .catch(error => console.error('Error al obtener las categorías:', error));
        });
    //--------------- Fin Load del desplegable categorias ---------------

</script>
