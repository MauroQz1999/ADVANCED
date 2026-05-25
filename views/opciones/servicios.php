<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* -------------------------------------------------------------------------------------------------------------- */

        .contenedor-titulo-nosotros {
            width: 100%;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
            margin-top: clamp(40px, 6vw, 20px);
            margin-bottom: clamp(15px, 2vw, 25px);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 clamp(16px, 4vw, 30px);
            box-sizing: border-box;
        }

        .nosotros-pre-titulo {
            font-size: clamp(0.7rem, 0.8vw, 0.8rem);
            font-weight: 800;
            color: #e58a13;
            text-transform: uppercase;
            letter-spacing: clamp(2px, 0.3vw, 4px);
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .nosotros-titulo-principal {
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 900;
            color: #0d3446;
            letter-spacing: -0.5px;
            line-height: 1.15;
            text-transform: uppercase;
            margin: 0;
            position: relative;
            word-wrap: break-word;
        }

        .nosotros-linea-decorativa {
            width: clamp(45px, 5vw, 60px);
            height: 4px;
            background-color: #e58a13;
            border-radius: 2px;
            margin-top: clamp(12px, 1.5vw, 18px);
        }

        .service-contenido {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            text-align: center;
            flex-direction: column;
            padding: 0 clamp(16px, 4vw, 30px);
            box-sizing: border-box;
        }

        .service-contenido h3 {
            font-size: clamp(1.4rem, 2.2vw, 1.8rem);
            color: #0d3446;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .service-contenido p {
            color: #64748b;
            font-size: clamp(0.92rem, 0.98vw, 0.98rem);
            line-height: 1.6;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .operacion-origen {
            width: 100%;
            padding: clamp(40px, 6vw, 80px) 0;
            display: flex;
            justify-content: center;
            box-sizing: border-box;
            background-color: #ffffff;
        }

        .contenedor-operacion {
            width: clamp(88%, 75vw, 90%);
            max-width: 1500px;
            display: flex;
            flex-direction: column;
            gap: clamp(40px, 7vw, 90px);
            box-sizing: border-box;
        }

        .op-bloque {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: clamp(30px, 4vw, 60px);
            box-sizing: border-box;
        }

        .op-bloque.inverso {
            flex-direction: row-reverse;
        }

        .op-contenido {
            flex: 1;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }

        .op-tag {
            font-size: 0.75rem;
            font-weight: 700;
            color: #e58a13;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .op-contenido h3 {
            font-size: clamp(1.4rem, 2vw, 1.8rem);
            color: #0d3446;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .op-contenido p {
            color: #64748b;
            font-size: clamp(0.92rem, 0.98vw, 0.98rem);
            line-height: 1.6;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .op-lista {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .op-lista li {
            color: #334155;
            font-size: 0.9rem;
            font-weight: 600;
            position: relative;
            padding-left: 20px;
        }

        .op-lista li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #e58a13;
        }

        .op-imagen {
            flex: 1;
            width: 100%;
            height: clamp(260px, 35vh, 400px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(13, 52, 70, 0.05);
            border: 1px solid rgba(13, 52, 70, 0.08);
            box-sizing: border-box;
        }

        .op-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .op-bloque:hover .op-imagen img {
            transform: scale(1.04);
        }

        .service1-imagen {
            width: 50%;
            height: clamp(260px, 35vh, 380px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(13, 52, 70, 0.06);
            border: 1px solid rgba(13, 52, 70, 0.08);
            box-sizing: border-box;
        }

        .service1-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
            transform: scale(1.03);
        }

        @media (max-width: 992px) {

            .op-bloque,
            .op-bloque.inverso {
                flex-direction: column;
                gap: 30px;
            }

            .op-contenido {
                order: 1;
            }

            .op-imagen {
                order: 2;
                height: 280px;
            }

            .service1-imagen {
                width: 100%;
                height: 280px;
            }
        }

        @media (max-width: 480px) {
            .contenedor-operacion {
                width: 90%;
            }

            .op-imagen,
            .service1-imagen {
                height: 200px;
                border-radius: 14px;
            }
        }
    </style>

</head>

<body>

    <?php include dirname(__DIR__, 2) . '/views/topbar/topbar.php'; ?>

    <div class="contenedor-titulo-nosotros">
        <h1 class="nosotros-titulo-principal" data-i18n="ser_text1">OUR SERVICE</h1>
        <div class="nosotros-linea-decorativa"></div>
    </div>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo" data-i18n="ser_text2">Service 1</span>
    </div>

    <div class="service-contenido">
        <h3 data-i18n="ser_text3">Advise the best shipping methods</h3>
        <p data-i18n="ser_text4">We advise the best shipping methods to suit your needs, either RO/RO, Containerised Cargo, or shipped LCL. We provide a range of ocean freight and logistics services for all your import and export requirements to any country.</p>
    </div>

    <div class="service1-imagen">
        <img src="../../img/3.jpeg" alt="">
    </div>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo" data-i18n="ser_text5">Service 2</span>
    </div>

    <div class="service-contenido">
        <h3 data-i18n="ser_text6">Arrange Shipment</h3>
        <p data-i18n="ser_text7">We offer a one-stop package service which provides you with a range of quick and reliable shipping services to suit your vehicle or cargo, your timetable and budget.</p>
    </div>

    <div class="service1-imagen">
        <img src="../../img/shipment.png" alt="">
    </div>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo" data-i18n="ser_text8">Service 3</span>
    </div>

    <div class="service-contenido">
        <h3 data-i18n="ser_text9">Cooperative companies in japan and all over the world</h3>
        <p data-i18n="ser_text10">Kanaloa Shipping Co.,Ltd has partner companies in Japan, Australia and New Zealand and also access to a network of agencies all over the world. This way we can provide a smooth and fast service for booking shipings, preparing documents, vehicle inspections and maintenance before the vehicle departs. Our yards are located at all the main ports in Japan, Australia and New Zeleand, so we are always in control of your shipment and ensure the process is smooth.</p>
    </div>

    <div class="service1-imagen">
        <img src="../../img/service3.png" alt="">
    </div>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo" data-i18n="ser_text11">Service 4</span>
    </div>

    <div class="service-contenido">
        <h3 data-i18n="ser_text12">Various services</h3>
        <p data-i18n="ser_text13">We can provide various services to meet your needs and budget. With our many years of experience and knowledge, nothing is too big of a job for us to help you with.</p>
    </div>

    <section class="operacion-origen">
        <div class="contenedor-operacion">
            <div class="op-bloque">
                <div class="op-contenido">
                    <h3 data-i18n="ser_text14">Inland transport service</h3>
                    <p data-i18n="ser_text15">We provide reliable inland transport services, moving your vehicles and assets from auction sites to designated yards. Our focus is safety, efficiency, and on-time delivery. We handle all the logistics to ensure a hassle-free process. Trust us for dependable transportation solutions tailored to your business needs.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/01.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <h3 data-i18n="ser_text16">Storage yards</h3>
                    <p data-i18n="ser_text17">We provide secure storage services at multiple yards strategically located near major ports. Our facilities offer safe, efficient, and accessible space for your cargo and vehicles. Count on us for flexible warehousing solutions designed to optimize your logistics and streamline your supply chain operations.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/02.jpeg" alt="">
                </div>
            </div>
            <div class="op-bloque">
                <div class="op-contenido">
                    <h3 data-i18n="ser_text18">Photo service</h3>
                    <p data-i18n="ser_text19">We provide high-quality photo services upon request to document the condition of your cargo. Our team captures detailed images during inspection, loading, or storage. This ensures full transparency, giving you complete peace of mind and accurate visual records for your logistics and inventory management.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/03.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <h3 data-i18n="ser_text20">Maintenance and repair service</h3>
                    <p data-i18n="ser_text21">We offer a fully equipped auto workshop and qualified staff to handle all maintenance and repair work, tailored to your requirements and budget. From routine servicing to major repairs, we ensure top-quality results. Additionally, professional car cleaning services are available to keep your vehicles in pristine condition.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/04.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque">
                <div class="op-contenido">
                    <h3 data-i18n="ser_text22">Pre-Cleaning Service</h3>
                    <p data-i18n="ser_text23">We provide official, customs-approved pre-cleaning services in Japan for vehicles bound for Australia and New Zealand. Our specialized process ensures full compliance with strict biosecurity regulations. Trust our team to deliver thorough cleaning, preventing delays and ensuring a smooth, hassle-free customs clearance for your cargo.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/05.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <h3 data-i18n="ser_text24">Quarantine inspection service</h3>
                    <p data-i18n="ser_text25">We provide comprehensive quarantine inspection services compliant with international standards, including DAFF and MAF regulations. Our expert team ensures your cargo meets the strict biosecurity requirements of different destination countries. Trust us to handle all inspections efficiently, minimizing risks and preventing costly delays at customs.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/06.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque">
                <div class="op-contenido">
                    <h3 data-i18n="ser_text26">Pre-shipment Inspection/ certificate issue</h3>
                    <p data-i18n="ser_text27">We arrange comprehensive pre-shipment inspections and issue official certificates to meet the strict regulatory requirements of different destination countries. Partnering with accredited agencies like JAAI, EAA, JEVIC, and QISJ, we ensure your cargo is fully compliant. Trust us to handle your documentation and prevent customs delays.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/07.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <h3 data-i18n="ser_text28">Vanning</h3>
                    <p data-i18n="ser_text29">Our highly experienced vanning staff ensures your vehicles and cargo are loaded quickly, safely, and securely. Utilizing professional techniques and equipment, we maximize container space while preventing any transit damage. Trust our efficient team to handle your loading needs with the highest standards of safety and care.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/08.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <div class="service-contenido" style="margin-top: 20px; margin-bottom: 60px;">
        <h3 data-i18n="ser_text30">Let ADVANCED SOUTH CENTRAL help find the perfect car for you!</h3>
    </div>

    <script>
    </script>

</body>

</html>