
<?php include dirname(__DIR__, 2) . '/conf/conexion.php'; ?>
<?php include dirname(__DIR__, 2) . '/models/principal/general_model.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="../../app/css/principal/general.css">
    <script src="../../app/js/principal/general.js"></script>

    

</head>

<body>

    <?php include dirname(__DIR__, 2) . '/views/topbar/topbar.php'; ?>

    <section class="hero-banner">
        <div class="carrusel-contenedor">

            <div class="slide activo">
                <div class="slide-info">
                    <span class="tagline" data-i18n="index_banner1">Logística y Exportación Global</span>
                    <h2 data-i18n="index_banner2">Desde las auctions de Japon directamente al mundo</h2>
                    <p data-i18n="index_banner3">Expertos en la exportación de vehículos. Tu socio confiable con acceso directo a las principales subastas y embarques de Japón.</p>
                    <a href="inventario.php" class="btn-cta" data-i18n="index_banner4">Ver Inventario Disponible</a>
                    <div class="indicator_banner"></div>
                </div>
                <div class="slide-imagen">
                    <img src="../../img/puerto.jpeg" alt="Embarque de autos Advance Sound Center">
                </div>
            </div>

            <div class="slide">
                <div class="slide-info">
                    <span class="tagline" data-i18n="index_banner5">Subastas en Vivo</span>
                    <h2 data-i18n="index_banner6">Acceso directo a más de 100 subastas semanales</h2>
                    <p data-i18n="index_banner7">Inscríbete con nosotros y oferta en tiempo real por vehículos revisados por inspectores certificados.</p>
                    <a href="contacto.php" class="btn-cta" data-i18n="index_banner8">Contactar un Agente</a>
                    <div class="indicator_banner"></div>
                </div>
                <div class="slide-imagen">
                    <img src="../../img/gemini.png" alt="Subastas de autos en Japón">
                </div>
            </div>

        </div>
    </section>

    <section class="carrusel_logos">

        <?php if ($logo->num_rows > 0) : ?>
            <?php while ($row = $logo->fetch_assoc()) : ?>

                <div class="carta_logo" onclick="window.location.href='inventario.php?marca=<?php echo urlencode($row['nombre_marca']); ?>'">
                    <img src="<?php echo htmlspecialchars($row['ruta']); ?>" alt="Car">
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </section>

    <div class="sub-titulo">
        <h1 data-i18n="index_subtitulo1">Modelos Recomendados</h1>
    </div>

    <div class="carrusel_destacados">

        <?php if ($recomendado->num_rows > 0) : ?>
            <?php while ($row = $recomendado->fetch_assoc()) : ?>
                <div class="carta_normal" onclick="window.location.href='datos.php?id=<?php echo $row['id']; ?>'">
                    <div class="contenedor_img">
                        <img class="car-img" src="<?php echo htmlspecialchars($row['portada']); ?>" alt="Car">

                        <div class="specs-overlay">
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo35">Precio</span>
                                <span><?php echo htmlspecialchars($row['precio']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo36">Año</span>
                                <span><?php echo htmlspecialchars($row['first_registration']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo37">Transmision</span>
                                <span><?php echo htmlspecialchars($row['transmission']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo38">Motor</span>
                                <span><?php echo htmlspecialchars($row['engine_type']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo39">Status</span>
                                <span><?php echo htmlspecialchars($row['estado']); ?></span>
                            </div>
                            <button style="margin-top: 0px; background: #000; color: #fff; border: none; padding: 12px; cursor: pointer; font-family: 'Outfit'; font-weight: 600; letter-spacing: 2px;" data-i18n="index_subtitulo40">VER DETALLES</button>
                        </div>

                    </div>
                    <div class="info-car">
                        <div class="info_fabricante"><?php echo htmlspecialchars($row['marca']); ?></div>
                        <h2 class="info_modelo"><?php echo htmlspecialchars($row['modelo']); ?></h2>
                        <div class="indicator"></div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>

    <div class="sub-titulo">
        <h1 data-i18n="index_subtitulo2">Modelos Destacados</h1>
    </div>

    <div class="carrusel_destacados1">

        <?php if ($destacado->num_rows > 0) : ?>
            <?php while ($row = $destacado->fetch_assoc()) : ?>

                <div class="carta_normal1" onclick="window.location.href='datos.php?id=<?php echo $row['id']; ?>'">
                    <div class="contenedor_img">
                        <img class="car-img" src="<?php echo htmlspecialchars($row['portada']); ?>" alt="Car">

                        <div class="specs-overlay">
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo35">Precio</span>
                                <span><?php echo htmlspecialchars($row['precio']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo36">Año</span>
                                <span><?php echo htmlspecialchars($row['first_registration']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo37">Transmision</span>
                                <span><?php echo htmlspecialchars($row['transmission']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo38">Motor</span>
                                <span><?php echo htmlspecialchars($row['engine_type']); ?></span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label" data-i18n="index_subtitulo39">Status</span>
                                <span><?php echo htmlspecialchars($row['estado']); ?></span>
                            </div>
                            <button style="margin-top: 0px; background: #000; color: #fff; border: none; padding: 12px; cursor: pointer; font-family: 'Outfit'; font-weight: 600; letter-spacing: 2px;" data-i18n="index_subtitulo40">VER DETALLES</button>
                        </div>

                    </div>
                    <div class="info-car">
                        <div class="info_fabricante"><?php echo htmlspecialchars($row['marca']); ?></div>
                        <h2 class="info_modelo"><?php echo htmlspecialchars($row['modelo']); ?></h2>
                        <div class="indicator"></div>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>

    <div class="sub-titulo" style="margin-top: 20px;">
        <h1 data-i18n="index_subtitulo3">Lo más solicitado del mercado</h1>
    </div>

    <section class="seccion-tops">
        <div class="contenedor-tops">

            <div class="columna-top">
                <h3 data-i18n="index_subtitulo41">Top Marcas</h3>
                <div class="grupo-botones-top">

                    <?php

                    $posicion = 1;
                    if ($marcas->num_rows > 0) : ?>
                        <?php while ($row = $marcas->fetch_assoc()) : ?>

                            <a href="#" class="btn-top-item" onclick="window.location.href='inventario.php?marca=<?php echo urlencode($row['marca']); ?>'">
                                <?php echo htmlspecialchars($row['marca']); ?>
                                <span class="rank">
                                    #<?php echo $posicion; ?>
                                </span>
                            </a>

                            <?php
                            $posicion++;
                            ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>

            <div class="columna-top">
                <h3 data-i18n="index_subtitulo42">Modelos Más Vendidos</h3>
                <div class="grupo-botones-top">

                    <?php if ($modelos->num_rows > 0) : ?>
                        <?php while ($row = $modelos->fetch_assoc()) : ?>

                            <a href="#" class="btn-top-item" onclick="window.location.href='inventario.php?modelo=<?php echo urlencode($row['modelo']); ?>'">
                                <?php echo htmlspecialchars($row['modelo']); ?>
                                <span class="rank">
                                    #<?php echo $posicion; ?>
                                </span>
                            </a>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>

            <div class="columna-top">
                <h3 data-i18n="index_subtitulo43">Por Categoría</h3>
                <div class="grupo-botones-top">
                    <a href="inventario.php" class="btn-top-item">Deportivos JDM <span class="rank">★</span></a>
                    <a href="inventario" class="btn-top-item">Camionetas SUV <span class="rank">★</span></a>
                    <a href="inventario" class="btn-top-item">Vehículos Comerciales <span class="rank">★</span></a>
                    <a href="inventario" class="btn-top-item">Sedanes / Hatchback <span class="rank">★</span></a>
                    <a href="inventario" class="btn-top-item">Maquinaria Pesada <span class="rank">★</span></a>
                </div>
            </div>

            <div class="columna-top">
                <h3 data-i18n="index_subtitulo44">Servicios Especiales</h3>
                <div class="grupo-botones-top">
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser1">Transporte interior</a>
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser2">Mantenimiento y reparación</a>
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser3">Inspección previa al envío</a>
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser4">Emisión de certificado</a>
                    <a href="servicios.php" class="btn-top-item" data-i18n="index_ser5">Vanning</a>
                </div>
            </div>

        </div>
    </section>

    <div class="sub-titulo" style="margin-top: 20px;">
        <h1 data-i18n="index_subtitulo4">Explora Nuestro Stock y Operaciones</h1>
    </div>

    <section class="seccion-mega-inventario">
        <div class="contenedor-mega">
            <div class="tabs-navegacion">
                <button class="tab-btn active" onclick="cambiarPestaña(event, 'tab-subastas')" data-i18n="index_subtitulo45">
                    Más Vendidos
                </button>
                <button class="tab-btn" onclick="cambiarPestaña(event, 'tab-proposito')" data-i18n="index_subtitulo46">
                    Explorar por Tipo
                </button>
                <button class="tab-btn" onclick="cambiarPestaña(event, 'tab-puerto')" data-i18n="index_subtitulo47">
                    Operaciones
                </button>
            </div>
            <div class="tabs-contenido">
                <div id="tab-subastas" class="tab-panel active">
                    <div class="grid-mosaico">

                        <?php if ($vendidos->num_rows > 0) : ?>
                            <?php while ($row = $vendidos->fetch_assoc()) : ?>

                                <div class="mini-carta-auto">
                                    <div class="mini-img">
                                        <img class="ban-img" src="<?php echo htmlspecialchars($row['portada']); ?>" alt="Car">
                                        <span class="badge-subasta"><?php echo htmlspecialchars($row['vehicle_type']); ?></span>
                                    </div>
                                    <div class="mini-info">
                                        <span class="mini-marca"><?php echo htmlspecialchars($row['marca']); ?></span>
                                        <h4><?php echo htmlspecialchars($row['modelo']); ?></h4>
                                        <p><?php echo htmlspecialchars($row['first_registration']); ?> • <?php echo htmlspecialchars($row['mileage']); ?> km • <?php echo htmlspecialchars($row['transmission']); ?></p>
                                        <a href="#" class="btn-mini-detalles" onclick="window.location.href='datos.php?id=<?php echo $row['id']; ?>'" data-i18n="index_subtitulo63">Detalles</a>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
                <div id="tab-proposito" class="tab-panel">
                    <div class="grid-proposito">
                        <div class="tarjeta-proposito">
                            <img src="https://images.unsplash.com/photo-1616422285623-13ff0162193c?q=80&w=600" alt="Deportivos JDM">
                            <div class="capa-proposito">
                                <h3 data-i18n="index_subtitulo68">Deportivos JDM</h3>
                                <p data-i18n="index_subtitulo69">Iconos de la ingeniería japonesa: Skylines, Supra, Evos y Civic Type R.</p>
                                <a href="inventario.php" data-i18n="index_subtitulo70">Ver Categoría →</a>
                            </div>
                        </div>
                        <div class="tarjeta-proposito">
                            <img src="https://images.unsplash.com/photo-1516515429572-bf32372f2409?q=80&w=600" alt="Vehículos Comerciales">
                            <div class="capa-proposito">
                                <h3 data-i18n="index_subtitulo71">Comerciales y Vans</h3>
                                <p data-i18n="index_subtitulo72">Furgonetas, camionetas de trabajo pesado y camionetas Toyota Probox/Hiace.</p>
                                <a href="inventario.php" data-i18n="index_subtitulo73">Ver Categoría →</a>
                            </div>
                        </div>
                        <div class="tarjeta-proposito">
                            <img src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?q=80&w=600" alt="SUVs Familiares">
                            <div class="capa-proposito">
                                <h3 data-i18n="index_subtitulo74">SUVs & Familiares</h3>
                                <p data-i18n="index_subtitulo75">Vehículos cómodos y de gran despeje para terrenos difíciles o viajes.</p>
                                <a href="inventario.php" data-i18n="index_subtitulo76">Ver Categoría →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab-puerto" class="tab-panel">
                    <div class="galeria-puerto">
                        <div class="foto-galeria grande">
                            <img src="../../img/consolidacion.jpeg" alt="Logística real en contenedores">
                            <div class="info-foto" data-i18n="index_subtitulo77">Consolidación en Contenedores - Puerto de ""</div>
                        </div>
                        <div class="foto-galeria">
                            <img src="../../img/embarque.jpeg" alt="Patios puerto">
                            <div class="info-foto" data-i18n="index_subtitulo78">Unidades listas para embarque ""</div>
                        </div>
                        <div class="foto-galeria">
                            <img src="../../img/chasis.jpeg" alt="Inspeccion puerto">
                            <div class="info-foto" data-i18n="index_subtitulo79">Inspección de chasis previa a la estiba</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sub-titulo" style="margin-top: 20px;">
        <h1 data-i18n="index_subtitulo5">Herramientas y Soporte</h1>
    </div>

    <section class="seccion-soporte-calculo">
        <div class="contenedor-soporte">

            <div class="bloque-calculadora">
                <h3 data-i18n="index_subtitulo49">Cotizador de Envío Estimado</h3>
                <p class="calc-p" data-i18n="index_subtitulo50">Calcula el costo aproximado de logística y flete marítimo desde Japón hasta tu región.</p>

                <form class="form-calculadora" onsubmit="calcularFlete(event)">
                    <div class="campo-calc">
                        <label data-i18n="index_subtitulo51">Categoría del Vehículo</label>
                        <select id="calc-tipo">
                            <option value="1200">Sedán / Compacto / JDM</option>
                            <option value="1600">SUV / Familiar / Pick-up</option>
                            <option value="2200">Vans / Camiones Ligeros</option>
                        </select>
                    </div>

                    <div class="campo-calc">
                        <label data-i18n="index_subtitulo52">Puerto de Destino</label>
                        <select id="calc-puerto">
                            <option value="400">Puerto de Callao (Perú) +$400</option>
                            <option value="350">Puerto de Iquique (Chile) +$350</option>
                            <option value="550">Puerto de Manzanillo (México) +$550</option>
                            <option value="600">Puerto de Santo Domingo (Rep. Dom) +$600</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-calcular" data-i18n="index_subtitulo53">Calcular Costo Logístico</button>
                </form>

                <div id="resultado-calculo" class="resultado-caja">
                    <span data-i18n="index_subtitulo54">Costo Marítimo Estimado:</span>
                    <strong id="monto-flete">$0.00 USD</strong>
                    <small data-i18n="index_subtitulo55">*Nota: No incluye el valor del vehículo en subasta ni impuestos locales de aduana.</small>
                </div>
            </div>

            <div class="bloque-faq">
                <h3 data-i18n="index_subtitulo56">Preguntas Frecuentes</h3>

                <div class="faq-item">
                    <div class="faq-pregunta" onclick="toggleFaq(this)">
                        <h4 data-i18n="index_subtitulo57">¿Cuánto tiempo tarda en llegar el vehículo?</h4>
                        <span class="faq-icono">+</span>
                    </div>
                    <div class="faq-respuesta">
                        <p data-i18n="index_subtitulo58">El tránsito marítimo promedio desde los puertos de Japón (Yokohama/Kobe) hasta Latinoamérica dura entre 35 y 45 días, dependiendo de las escalas del buque y la ruta de la naviera.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-pregunta" onclick="toggleFaq(this)">
                        <h4 data-i18n="index_subtitulo59">¿Qué documentos recibo para registrar el auto?</h4>
                        <span class="faq-icono">+</span>
                    </div>
                    <div class="faq-respuesta">
                        <p data-i18n="index_subtitulo60">Te enviamos por mensajería prioritaria (DHL) el Certificado de Exportación Original emitido en Japón, la Factura Comercial (Commercial Invoice) y el conocimiento de embarque (Bill of Lading - B/L).</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-pregunta" onclick="toggleFaq(this)">
                        <h4 data-i18n="index_subtitulo61">¿Cuáles son los métodos de pago aceptados?</h4>
                        <span class="faq-icono">+</span>
                    </div>
                    <div class="faq-respuesta">
                        <p data-i18n="index_subtitulo62">Trabajamos mediante Transferencia Bancaria Internacional (Telegraphic Transfer - T/T) directamente a nuestras cuentas corporativas en Japón, garantizando la máxima seguridad legal en la transacción.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="banner_pilares">
        <div class="pilar">
            <div class="texpilar">
                <span class="pilar-tag" data-i18n="index_subtitulo20">Control de Calidad</span>
                <h3 class="pilar-titulo" data-i18n="index_subtitulo21">Inspección Rigurosa en Patios de Subasta</h3>
                <p class="pilar-descripcion" data-i18n="index_subtitulo22">Asistimos físicamente a las terminales y casas de subastas en Japón para realizar una verificación técnica exhaustiva de cada unidad antes de realizar cualquier oferta de compra.</p>
                <ul class="pilar-lista">
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo23">
                            Verificación de estado de motor y transmisión.
                        </a>
                    </li>
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo24">
                            Certificación de kilometraje real sin alteraciones.
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pilar">
            <div class="texpilar">
                <span class="pilar-tag" data-i18n="index_subtitulo25">Gestión Documental</span>
                <h3 class="pilar-titulo" data-i18n="index_subtitulo26">Logística de Exportación y Trámites</h3>
                <p class="pilar-descripcion" data-i18n="index_subtitulo27">Nos encargamos de todo el complejo proceso administrativo aduanero dentro de Japón. Aseguramos el despacho rápido y reservamos espacios prioritarios en buques de carga.</p>
                <ul class="pilar-lista">
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo28">
                            Gestión completa de títulos de exportación (Export Certificate).
                        </a>
                    </li>
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo29">
                            Coordinación terrestre hacia los principales puertos.
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pilar">
            <div class="texpilar">
                <span class="pilar-tag" data-i18n="index_subtitulo30">Soporte y Entrega</span>
                <h3 class="pilar-titulo" data-i18n="index_subtitulo31">Embarque e Integridad Asegurada</h3>
                <p class="pilar-descripcion" data-i18n="index_subtitulo32">Supervisamos la estiba y el trincado de los vehículos en racks profesionales dentro del contenedor, garantizando la máxima protección y un tracking constante hasta tu puerto local.</p>
                <ul class="pilar-lista">
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo33">
                            Reportes fotográficos detallados pre-embarque.
                        </a>
                    </li>
                    <li>
                        <span class="pilar-check">
                            ✓
                        </span>
                        <a data-i18n="index_subtitulo34">
                            Envío prioritario y seguro de documentación por DHL.
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo">ADVANCED SOUTH CENTRAL</span>
        <h1 class="nosotros-titulo-principal" data-i18n="index_titulo1">Nuestra Operación en Japón</h1>
        <div class="nosotros-linea-decorativa"></div>
    </div>

    <section class="operacion-origen">
        <div class="contenedor-operacion">
            <div class="op-bloque">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="index_subtitulo6">Presencia en Subastas</span>
                    <h3 data-i18n="index_txt_1">Acceso Directo a las Subastas más Grandes de Japón</h3>
                    <p data-i18n="index_txt_2">Venta de maquinaria, camiones y carros seminuevos en oficina y de la subasta. Conducimos a las mejores AUCTIONS : USS, ARAI, CAA, TAA, HONDA, JU AICHI. Y también, puedes apostar en ASNET, la mayor plataforma de distribución de coches usados ​​de Japón.</p>
                    <p data-i18n="index_txt_2.5">Dónde podrá usted verificar in situ la hoja de ruta del vehículo.</p>
                    <ul class="op-lista">
                        <li data-i18n="index_txt_3">
                            <span class="pilar-check">
                                ✓
                            </span>Filtros por año, millaje y condición de subasta.
                        </li>
                        <li data-i18n="index_txt_4">
                            <span class="pilar-check">
                                ✓
                            </span>Acceso a vehículos de reventa exclusiva en el mercado japonés.
                        </li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="../../img/pantallas-subastas.jpeg" alt="Subastas de autos en Japón">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="index_subtitulo7">Control de Calidad</span>
                    <h3 data-i18n="index_txt_5">Inspección Rigurosa y Verificación de Motores</h3>
                    <p data-i18n="index_txt_6">Nuestro personal calificado asiste físicamente a los patios para revisar el motor, la transmisión, el chasis y verificar que no existan problemas ocultos u oxidación por el clima costero.</p>
                    <p data-i18n="index_txt_6.5">Advanced South Central para la venta sólo compra sus vehículos de las AUCTIONS : donde; además, encontrarás toda la información sobre tu próximo auto; garantizando : su kilometraje, si tuvo un solo dueño y si fue accidentado.</p>
                    <ul class="op-lista">
                        <li data-i18n="index_txt_7">
                            <span class="pilar-check">
                                ✓
                            </span>
                            evisión exhaustiva por mecánicos expertos en el sitio.
                        </li>
                        <li data-i18n="index_txt_8">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Certificación de kilometraje real antes del embarque.
                        </li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="../../img/inspeccion-motor.png" alt="Inspección de motor en Japón">
                </div>
            </div>
            <div class="op-bloque">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="index_subtitulo8">Logística de Exportación</span>
                    <h3 data-i18n="index_txt_9">Preparación de Cargamento y Logística Portuaria</h3>
                    <p data-i18n="index_txt_10">Una vez adquiridos, coordinamos el traslado interno hacia los puertos principales de embarque ( Roll-on/Roll-off o Ro-Ro para mercancías que tienen ruedas ). Y/ o al local de VANNING ( proceso de carga de mercancías o carga en un contenedor marítimo); donde nuestro experimentado personal de transporte cargará sus vehículos o mercancías de forma rápida, segura y sin ningún problema. Para luego, internar el vehículo o contenedor; previa solicitud de booking number.</p>
                    <ul class="op-lista">
                        <li data-i18n="index_txt_11">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Manejo seguro de la carga en terminales portuarias.
                        </li>
                        <li data-i18n="index_txt_12">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Despacho aduanero de exportación totalmente garantizado.
                        </li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="../../img/barco-maquinaria.png" alt="Embarque de vehículos en puerto japonés">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="index_subtitulo9">Carga y Logística</span>
                    <h3 data-i18n="index_txt_13">Maximización de Espacio y Embarque Seguro</h3>
                    <p data-i18n="index_txt_14">No solo enviamos autos; optimizamos cada contenedor utilizando sistemas de racks profesionales. Esto nos permite consolidar varios vehículos de manera fija y segura, reduciendo drásticamente los costos de flete marítimo para nuestros clientes sin arriesgar la integridad física de las unidades.</p>
                    <ul class="op-lista">
                        <li data-i18n="index_txt_15">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Trincado profesional y distribución de peso certificada.
                        </li>
                        <li data-i18n="index_txt_16">
                            <span class="pilar-check">
                                ✓
                            </span>
                            Despacho aduanero y exportación directa desde puertos principales.
                        </li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="../../img/contenedores.png" alt="Contenedores en Japón">
                </div>
            </div>
        </div>
    </section>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo" data-i18n="index_subtitulo10">Nuestra Trayectoria</span>
        <h1 class="nosotros-titulo-principal" data-i18n="index_titulo2">SOBRE NOSOTROS</h1>
        <div class="nosotros-linea-decorativa"></div>
    </div>

    <section class="mini-nosotros" style="width: 100%; padding: 60px 0; display: flex; justify-content: center; border-top: 1px solid rgba(13, 52, 70, 0.05);">
        <div style="width: 75%; max-width: 1400px; display: flex; align-items: center; gap: 50px; flex-wrap: wrap;">

            <div style="flex: 1; min-width: 300px; height: 350px; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <img src="../../img/advanced.png" alt="Oficinas corporativas" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <div style="flex: 1; min-width: 300px; display: flex; flex-direction: column; justify-content: center;">
                <span style="font-size: 0.75rem; font-weight: 700; color: #e58a13; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;" data-i18n="index_subtitulo11">¿Quiénes Somos?</span>
                <h2 style="font-size: 1.8rem; color: #0d3446; font-weight: 700; margin-bottom: 20px; line-height: 1.3;" data-i18n="index_txt_17">Conectando el Mercado Automotriz de Japón con el Mundo</h2>
                <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px;" data-i18n="index_txt_18">
                    En <strong>Advanced South Central</strong>, nos especializamos en la selección, inspección y exportación de vehículos JDM, comerciales y particulares directo desde las subastas niponas. Con años de experiencia en logística portuaria, aseguramos un proceso transparente, legal y seguro para que recibas tu auto sin complicaciones en tu país de origen.
                </p>
                <a href="aboutus.php" style="align-self: flex-start; text-decoration: none; background-color: #0d3446; color: #ffffff; padding: 12px 28px; font-size: 0.9rem; font-weight: 700; border-radius: 8px; transition: background-color 0.3s;" onmouseover="this.style.backgroundColor='#e58a13'" onmouseout="this.style.backgroundColor='#0d3446'" data-i18n="index_txt_19">
                    Conoce Nuestra Historia →
                </a>
            </div>
        </div>
    </section>

</body>

</html>