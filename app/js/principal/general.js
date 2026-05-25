function cambiarPestaña(evt, nombrePestaña) {
  // Escondemos todos los paneles de contenido
  const paneles = document.querySelectorAll(".tab-panel");
  paneles.forEach((panel) => panel.classList.remove("active"));

  // Desactivamos todos los botones de las pestañas
  const botones = document.querySelectorAll(".tab-btn");
  botones.forEach((btn) => btn.classList.remove("active"));

  // Mostramos el panel seleccionado y activamos su respectivo botón
  document.getElementById(nombrePestaña).classList.add("active");
  evt.currentTarget.classList.add("active");
}

// CONTROL DEL ACORDEÓN DE PREGUNTAS FRECUENTES
function toggleFaq(elemento) {
  const item = elemento.parentElement;
  item.classList.toggle("active");
}

// LOGICA MATEMÁTICA DE LA CALCULADORA DE ENVÍO
function calcularFlete(event) {
  event.preventDefault();

  const baseVehiculo = parseInt(document.getElementById("calc-tipo").value);
  const bonoPuerto = parseInt(document.getElementById("calc-puerto").value);

  const totalEstimado = baseVehiculo + bonoPuerto;

  // Animamos el cambio de texto del resultado
  document.getElementById("monto-flete").innerText =
    `$${totalEstimado.toLocaleString("en-US")}.00 USD`;
}

/* -------------------------------------------------------------------------------------------------------- */

window.onload = function () {
  // --- 1. CARRUSEL DE LOGOS (MOVIMIENTO CONTINUO) ---
  const sliderMarcas = document.querySelector(".carrusel_logos");

  if (sliderMarcas) {
    // Clonado para efecto infinito
    const itemsMarcas = sliderMarcas.querySelectorAll(".carta_logo");
    itemsMarcas.forEach((item) =>
      sliderMarcas.appendChild(item.cloneNode(true)),
    );

    let isUserInteracting = false;
    let startX, scrollLeft;
    let moved = false; // Nueva bandera para saber si hubo arrastre

    // --- ANIMACIÓN ---
    function animar() {
      if (!isUserInteracting) {
        sliderMarcas.scrollLeft += 0.8;
        if (sliderMarcas.scrollLeft >= sliderMarcas.scrollWidth / 2) {
          sliderMarcas.scrollLeft = 0;
        }
      }
      requestAnimationFrame(animar);
    }

    // --- LÓGICA DE ARRASTRE ---
    sliderMarcas.addEventListener("mousedown", (e) => {
      isUserInteracting = true;
      moved = false;
      startX = e.pageX - sliderMarcas.offsetLeft;
      scrollLeft = sliderMarcas.scrollLeft;
    });

    sliderMarcas.addEventListener("mousemove", (e) => {
      if (!isUserInteracting) return;
      e.preventDefault();
      const x = e.pageX - sliderMarcas.offsetLeft;
      const walk = (x - startX) * 1.5; // Velocidad de arrastre
      sliderMarcas.scrollLeft = scrollLeft - walk;
      if (Math.abs(walk) > 5) moved = true; // Si se movió más de 5px, es arrastre
    });

    const stopInteraction = () => {
      isUserInteracting = false;
    };

    sliderMarcas.addEventListener("mouseup", stopInteraction);
    sliderMarcas.addEventListener("mouseleave", stopInteraction);

    // --- CORRECCIÓN DEL CLICK ---
    // Delegación de eventos para evitar que el link se abra al arrastrar
    sliderMarcas.addEventListener("click", (e) => {
      if (moved) {
        e.preventDefault(); // Bloquea el link si hubo arrastre
        e.stopPropagation();
      }
    });

    animar();
  }
};

// --- 2. CARRUSEL DE AUTOS (MOVIMIENTO POR PASOS - TU CÓDIGO) ---
const carruselAutos = document.querySelector(".carrusel_destacados");

if (carruselAutos) {
  const itemsAutos = carruselAutos.querySelectorAll(".carta_normal");

  if (carruselAutos.scrollWidth > carruselAutos.offsetWidth) {
    // 1. Clonar para el efecto infinito
    itemsAutos.forEach((item) => {
      carruselAutos.appendChild(item.cloneNode(true));
    });

    let isUserInteracting = false;
    let timer;
    const velocidad = 0.8; // Ajusta la velocidad aquí

    // 2. Animación fluida usando el valor actual de scrollLeft
    function animarContinuo() {
      if (!isUserInteracting) {
        carruselAutos.scrollLeft += velocidad;

        // Reseteo inteligente al llegar a la mitad
        if (carruselAutos.scrollLeft >= carruselAutos.scrollWidth / 2) {
          carruselAutos.scrollLeft = 0;
        }
      }
      requestAnimationFrame(animarContinuo);
    }

    // 3. Detectar interacción (Mouse/Touch)
    const startInteraction = () => {
      isUserInteracting = true;
      clearTimeout(timer);
    };
    const endInteraction = () => {
      // Espera un momento antes de reanudar el scroll automático
      timer = setTimeout(() => {
        isUserInteracting = false;
      }, 1500);
    };

    carruselAutos.addEventListener("mousedown", startInteraction);
    carruselAutos.addEventListener("touchstart", startInteraction);
    carruselAutos.addEventListener("mouseup", endInteraction);
    carruselAutos.addEventListener("mouseleave", endInteraction);
    carruselAutos.addEventListener("touchend", endInteraction);

    animarContinuo();
  } else {
    carruselAutos.style.justifyContent = "center";
    carruselAutos.style.overflowX = "hidden";
  }
}

// --- 3. CARRUSEL DE AUTOS (MOVIMIENTO POR PASOS - TU CÓDIGO) ---
const carruselAutos1 = document.querySelector(".carrusel_destacados1");

if (carruselAutos1) {
  const itemsAutos = carruselAutos1.querySelectorAll(".carta_normal1");

  if (carruselAutos1.scrollWidth > carruselAutos1.offsetWidth) {
    // 1. Clonar para el efecto infinito
    itemsAutos.forEach((item) => {
      carruselAutos1.appendChild(item.cloneNode(true));
    });

    let isUserInteracting = false;
    let timer;
    const velocidad = 0.8; // Ajusta la velocidad aquí

    // 2. Animación fluida usando el valor actual de scrollLeft
    function animarContinuo() {
      if (!isUserInteracting) {
        carruselAutos1.scrollLeft += velocidad;

        // Reseteo inteligente al llegar a la mitad
        if (carruselAutos1.scrollLeft >= carruselAutos1.scrollWidth / 2) {
          carruselAutos1.scrollLeft = 0;
        }
      }
      requestAnimationFrame(animarContinuo);
    }

    // 3. Detectar interacción (Mouse/Touch)
    const startInteraction = () => {
      isUserInteracting = true;
      clearTimeout(timer);
    };
    const endInteraction = () => {
      // Espera un momento antes de reanudar el scroll automático
      timer = setTimeout(() => {
        isUserInteracting = false;
      }, 1500);
    };

    carruselAutos1.addEventListener("mousedown", startInteraction);
    carruselAutos1.addEventListener("touchstart", startInteraction);
    carruselAutos1.addEventListener("mouseup", endInteraction);
    carruselAutos1.addEventListener("mouseleave", endInteraction);
    carruselAutos1.addEventListener("touchend", endInteraction);

    animarContinuo();
  } else {
    carruselAutos1.style.justifyContent = "center";
    carruselAutos1.style.overflowX = "hidden";
  }
}

/*-----*/

document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".hero-banner .slide");
  let currentIndex = 0;
  const intervaloTiempo = 10000; // 10 segundos

  function cambiarSlide() {
    slides[currentIndex].classList.remove("activo");
    // Si hay 4 slides, la operación matemática hace: (0+1)%4 = 1, (1+1)%4 = 2, (2+1)%4 = 3, (3+1)%4 = 0
    currentIndex = (currentIndex + 1) % slides.length;
    slides[currentIndex].classList.add("activo");
  }

  setInterval(cambiarSlide, intervaloTiempo);
});

/*-----*/

function iniciarAnimacionBarra(slide) {
  const barra = slide.querySelector(".indicator_banner::after");
  const indicador = slide.querySelector(".indicator_banner");

  indicador.style.setProperty("--animation-duration", "10s");

  const estiloBarra = indicador.querySelector(".indicator_banner");
  const el = slide.querySelector(".indicator_banner");
  el.style.animation = "none";
  el.offsetHeight;
  el.style.animation = "llenar 10s linear forwards";
}

setInterval(cambiarSlide, 10000);

iniciarAnimacionBarra(slides[0]);
