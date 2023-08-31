(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 10
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },

      1200: {
        slidesPerView: 3,
        spaceBetween: 20
      }
    }
  });

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });

      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox 
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfolio-lightbox'
  });

  /**
   * Initiate portfolio details lightbox 
   */
  const portfolioDetailsLightbox = GLightbox({
    selector: '.portfolio-details-lightbox',
    width: '90%',
    height: '90vh'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Initiate Pure Counter 
   */
  new PureCounter();

})()


function getOS() {
  // sistema operativo
  var OSName = "Unknown";
  if (navigator.appVersion.indexOf("Win") != -1) OSName = "Windows";
  if (navigator.appVersion.indexOf("Mac") != -1) OSName = "MacOS";
  if (navigator.appVersion.indexOf("X11") != -1) OSName = "UNIX";
  if (navigator.appVersion.indexOf("Linux") != -1) OSName = "Linux";
  return OSName;
}

function getNavegador() {
  // navegador
  var nVer = navigator.appVersion;
  var nAgt = navigator.userAgent;
  var browserName  = navigator.appName;
  var fullVersion  = ''+parseFloat(navigator.appVersion); 
  var majorVersion = parseInt(navigator.appVersion,10);
  var nameOffset,verOffset,ix;
  if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
  browserName = "Microsoft Internet Explorer";
  fullVersion = nAgt.substring(verOffset+5);}
  else if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
  browserName = "Opera";
  fullVersion = nAgt.substring(verOffset+6);}
  else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
  browserName = "Chrome";
  fullVersion = nAgt.substring(verOffset+7);}
  else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
  browserName = "Safari";
  fullVersion = nAgt.substring(verOffset+7);}
  else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
  browserName = "Firefox";
  fullVersion = nAgt.substring(verOffset+8);}
  else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < (verOffset=nAgt.lastIndexOf('/')) ) 
  {browserName = nAgt.substring(nameOffset,verOffset);
  fullVersion = nAgt.substring(verOffset+1);
  if (browserName.toLowerCase()==browserName.toUpperCase()) {
    browserName = navigator.appName;}}
  if ((ix=fullVersion.indexOf(";"))!=-1) fullVersion=fullVersion.substring(0,ix);
  if ((ix=fullVersion.indexOf(" "))!=-1) fullVersion=fullVersion.substring(0,ix);
  majorVersion = parseInt(''+fullVersion,10);
  if (isNaN(majorVersion)) {
  fullVersion  = ''+parseFloat(navigator.appVersion); 
  majorVersion = parseInt(navigator.appVersion,10);}
  return browserName + 'v.'+fullVersion;
}


function getFecha(formato){
// fecha de vicita
  if (formato  == 'tx') {

    document.write (fechahoy());
    ahora=new Date();
    function fechahoy(){var diasemana=new Array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
    var nombremes=new Array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    var ahora;
    var fecha=new Date();
    var ano=fecha.getFullYear();
    var mes=fecha.getMonth();
    var dia=fecha.getDay();
    var num=fecha.getDate();
    ahora=diasemana[dia]+", "+num+" de "+nombremes[mes]+" de "+ano;return ahora;}
    return ahora;

  } else {
    var fechaActual = new Date();
    var year = fechaActual.getFullYear();
    var month = String(fechaActual.getMonth() + 1).padStart(2, '0');
    var day = String(fechaActual.getDate()).padStart(2, '0');

    var fechaFormateada = year + '-' + month + '-' + day;
    return fechaFormateada
  }

}



function registrarVisita(token) {
  

  var fecha = getFecha('bd');
  var navegador = getNavegador();
  var os = getOS();
  var link = window.location.href;

  var formData = new FormData();
  formData.append("accion", "guardar_fecha");
  formData.append("fecha", fecha);
  formData.append("navegador", navegador);
  formData.append("token", token);
  formData.append("os", os);
  formData.append("link", link);
  
  console.log("Contenido de FormData:");
  for (var pair of formData.entries()) {
      console.log(pair[0] + ': ' + pair[1]);
  }


  fetch(`modulos/funciones.php`, {
      method: 'POST',
      body: formData
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('Error al agregar historial');
        }
        return response.json();
      })
      .then(() => {
        // renderizar html
        alert('tu vicita fue registrada')
        
      })
      .catch(error => {
        console.log(error);
        console.error('Error:', error);
        
      })
      .finally(() => {
        console.log('Promesa finalizada (resuelta o rechazada)');
      });
}

function registrarVisitante(token){
  
  var fecha = getFecha('bd');

  var formData = new FormData();
  formData.append("accion", "reg_visitor");
  formData.append("fecha", fecha);
  formData.append("token", token);
  

  console.log("Usuario a registrar:");
  for (var pair of formData.entries()) {
      console.log(pair[0] + ': ' + pair[1]);
  }

  fetch(`modulos/funciones.php`, {
      method: 'POST',
      body: formData
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('Error al agregar historial');
        }
        return response.json();
      })
      .then(() => {
        // renderizar html
        alert('tu vicita fue registrada')
        
      })
      .catch(error => {
        console.log(error);
        console.error('Error:', error);
        
      })
      .finally(() => {
        console.log('Promesa finalizada (resuelta o rechazada)');
      });
}

// Función para generar un token único
function generateToken() {
  var chk = false;
  var cont = 0;
  var token = '';
  while (chk === false){
    const timestamp = Date.now().toString(); // Marca de tiempo actual
    const randomPart = Math.random().toString(36).substr(2, 5); // Parte aleatoria
    token = timestamp + randomPart;
    chk = validarToken(token) // Llamada a la función asíncrona para validar token
    cont = cont +1;
    if (cont === 4){
      break;
    }
  };
  return token
}

// validar token en base de datos
function validarToken(token) {
  const formData = new FormData();
  formData.append("accion", "val_token");
  formData.append("token", token);
  var respuesta = false;
  fetch(`modulos/funciones.php`, {
    method: 'GET',
    body: formData
  })
  .then(response => handleResponse(response))
  .then((data) => {
    console.log("token validado")
    respuesta = true;
  })
  .catch((error) => {
    console.log("no se puede validar el token")
    console.log("Promesa rechazada por", error);
    var respuesta = false;
  })
  .finally(() => {
    console.log("Promesa finalizada (resuelta o rechazada)");
    // finalmente hace esto
  });
  return respuesta
}

// Función para guardar el token en una cookie
function setTokenCookie(token) {
  const expirationDate = new Date();
  expirationDate.setFullYear(expirationDate.getFullYear() + 1); // Expira en 1 año

  document.cookie = `userToken=${encodeURIComponent(token)}; expires=${expirationDate.toUTCString()}; path=/`;
}

// Función para verificar si ya se registró la visita hoy
function checkLastVisit() {
  const lastVisitCookie = getCookie('lastVisit');

  if (lastVisitCookie) {
    const lastVisitDate = new Date(lastVisitCookie);
    const currentDate = new Date();

    if (currentDate.getDate() !== lastVisitDate.getDate()) {
      // Registrar visita y actualizar la cookie
      // setLastVisitCookie();
      // console.log('Visita registrada hoy.');
      return 2
    } else {
      // console.log('Visita ya registrada hoy.');
      return 1
    }
  } else {
    // Primera visita, registrar y establecer la cookie
    // setLastVisitCookie();
    // console.log('Primera visita registrada.');
    return 0
  }
}

// Función para establecer una cookie con la fecha de última visita
function setLastVisitCookie() {
  const currentDate = new Date();
  const expirationDate = new Date(currentDate);
  expirationDate.setHours(23, 59, 59, 999); // Establecer hora final del día

  document.cookie = `lastVisit=${currentDate.toUTCString()}; expires=${expirationDate.toUTCString()}; path=/`;
}

// Función para obtener el valor de una cookie por su nombre
function getCookie(name) {
  const cookies = document.cookie.split(';');
  for (const cookie of cookies) {
    const [cookieName, cookieValue] = cookie.trim().split('=');
    if (cookieName === name) {
      return decodeURIComponent(cookieValue);
    }
  }
  return null;
}

// evento load para registro de visita
document.addEventListener("DOMContentLoaded", function() {
  // chequeo si es la primer vicita 0, ya entro hoy 1, entro ayer 2
  var tip_user = checkLastVisit();
  console.log(tip_user);

  if (tip_user === 0) {

    // el usuario es nuevo, genero un token unico
    var tokenu = generateToken();
    // guardo el token en la cookie por 1 año
    setTokenCookie(tokenu);
    // registro el token en la bd 
    registrarVisitante(tokenu)
    // seteo la fecha de visita en el cookie
    setLastVisitCookie();
    // registro el link donde ingresa
    registrarVisita(tokenu)

  } else if (tip_user === 1){
      // leo el token de la cookie
      var tokenu = getCookie('userToken');
      // registro el link donde ingresa
      // registrarVisita(tokenu)
      // la idea es q registre en cookie y despues suba, para no hacer consultas

  } else if (tip_user === 2) {
    // como entro ayer registro la fecha
    setLastVisitCookie();
    // tomo el token de la cookie
    var tokenu = getCookie('userToken');
    // si es nulo lo genero
    if (tokenu === null) {
      tokenu = generateToken();
      setTokenCookie(tokenu);
      registrarVisitante(tokenu)
    }
    // registro el link donde ingresa
    registrarVisita(tokenu)
  };
});