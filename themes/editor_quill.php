
<!-- Include stylesheet -->
<!-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
<!-- Create the editor container -->
<div class="quill-wrap">
<!-- Create the toolbar container -->
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

<style>
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

<!-- Create the editor container -->
<div id="editor">
</div>
</div>


<!-- Include the Quill library -->
<!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->
<script src="assets/vendor/quill/quill.js"></script>

<!-- Initialize Quill editor -->
<script src="assets/vendor/quill/image_size_tool.js"></script>
<script>

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

        // Agregar un controlador de eventos para el botón personalizado de inserción de imagen desde URL
        document.getElementById('ql-linkimage').addEventListener('click', function () {
        var imageUrl = prompt('Por favor, ingresa la URL de la imagen:');
        if (imageUrl) {
            quill.focus();
            quill.clipboard.dangerouslyPasteHTML(quill.getSelection().index, '<img src="' + imageUrl + '" alt="">');
        }
        });

</script>
