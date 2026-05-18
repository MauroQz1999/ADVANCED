<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced South Central</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        /* -------------------------------------------------------------------------------------------------------------- */

        .contenedor-titulo-nosotros {
            width: 100%;
            max-width: 1400px;
            margin-top: 80px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 20px;
        }

        .nosotros-pre-titulo {
            font-size: 0.8rem;
            font-weight: 800;
            color: #e58a13;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 8px;
        }

        .nosotros-titulo-principal {
            font-size: 2.8rem;
            font-weight: 900;
            color: #0d3446;
            letter-spacing: -1px;
            line-height: 1.1;
            text-transform: uppercase;
            position: relative;
        }

        .nosotros-linea-decorativa {
            width: 60px;
            height: 4px;
            background-color: #e58a13;
            border-radius: 2px;
            margin-top: 15px;
        }

        @media (max-width: 768px) {
            .contenedor-titulo-nosotros {
                margin-top: 50px;
            }

            .nosotros-titulo-principal {
                font-size: 2rem;
            }

            .nosotros-pre-titulo {
                font-size: 0.7rem;
                letter-spacing: 2px;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .service-contenido {
            flex: 1;
            display: flex;
            align-items: center;
            text-align: center;
            flex-direction: column;
        }

        .service-contenido h3 {
            font-size: 1.8rem;
            color: #0d3446;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .service-contenido p {
            color: #64748b;
            font-size: 0.98rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .operacion-origen {
            width: 100%;
            padding: 40px 0;
            display: flex;
            justify-content: center;
        }

        .contenedor-operacion {
            width: 90%;
            max-width: 1500px;
            display: flex;
            flex-direction: column;
            gap: 80px;
        }

        .op-bloque {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 60px;
        }

        .op-bloque.inverso {
            flex-direction: row-reverse;
        }

        .op-contenido {
            flex: 1;
            display: flex;
            flex-direction: column;
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
            font-size: 1.8rem;
            color: #0d3446;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .op-contenido p {
            color: #64748b;
            font-size: 0.98rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .op-lista {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .op-lista li {
            color: #334155;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .op-imagen {
            flex: 1;
            height: 380px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(13, 52, 70, 0.06);
            border: 1px solid rgba(13, 52, 70, 0.08);
        }

        .op-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .op-bloque:hover .op-imagen img {
            transform: scale(1.03);
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 992px) {
            .contenedor-operacion {
                width: 90%;
                gap: 50px;
            }

            .op-bloque,
            .op-bloque.inverso {
                flex-direction: column !important;
                gap: 25px;
            }

            .op-imagen {
                width: 100%;
                height: 250px;
            }

            .op-contenido h3 {
                font-size: 1.4rem;
            }
        }

        /* -------------------------------------------------------------------------------------------------------------- */

        .service1-imagen {
            width: 50%;
            height: 380px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(13, 52, 70, 0.06);
            border: 1px solid rgba(13, 52, 70, 0.08);
        }

        .service1-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .service1-imagen img {
            transform: scale(1.03);
        }
    </style>

</head>

<body>

    <?php include 'topbar.php'; ?>

    <div class="contenedor-titulo-nosotros">
        <h1 class="nosotros-titulo-principal">OUR SERVICE</h1>
        <div class="nosotros-linea-decorativa"></div>
    </div>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo">Service 1</span>
    </div>

    <div class="service-contenido">
        <h3>Advise the best shipping methods</h3>
        <p>We advise the best shipping methods to suit your needs, either RO/RO, Containerised Cargo, or shipped LCL.</p>
        <p>We provide a range of ocean freight and logistics services for all your import and export requirements to any country.</p>
    </div>

    <div class="service1-imagen">
        <img src="img/3.jpeg" alt="">
    </div>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo">Service 2</span>
    </div>

    <div class="service-contenido">
        <h3>Arrange Shipment</h3>
        <p>We offer a one-stop package service which provides you with a range of quick and reliable shipping services to</p>
        <p>suit your vehicle or cargo, your timetable and budget.</p>
    </div>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo">Service 3</span>
    </div>

    <div class="service-contenido">
        <h3>Cooperative companies in japan and all over the world</h3>
        <p>Kanaloa Shipping Co.,Ltd has partner companies in Japan, Australia and New Zealand and also access to a</p>
        <p>network of agencies all over the world. This way we can provide a smooth and fast service for booking shipings,</p>
        <p>preparing documents, vehicle inspections and maintenance before the vehicle departs.</p>
        <p>Our yards are located at all the main ports in Japan, Australia and New Zeleand, so we are always in control of</p>
        <p>your shipment and ensure the process is smooth.</p>
    </div>

    <div class="contenedor-titulo-nosotros">
        <span class="nosotros-pre-titulo">Service 4</span>
    </div>

    <div class="service-contenido">
        <h3>Various services</h3>
        <p>We can provide various services to meet your needs and budget. With our many years of experience and</p>
        <p>knowledge, nothing is too big of a job for us to help you with.</p>
    </div>

    <section class="operacion-origen">
        <div class="contenedor-operacion">
            <div class="op-bloque">
                <div class="op-contenido">
                    <h3>Inland transport service</h3>
                    <p>We provide reliable inland transport services, moving your vehicles and assets from auction sites to designated yards. Our focus is safety, efficiency, and on-time delivery. We handle all the logistics to ensure a hassle-free process. Trust us for dependable transportation solutions tailored to your business needs.</p>
                </div>
                <div class="op-imagen">
                    <img src="img/01.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <h3>Storage yards</h3>
                    <p>We provide secure storage services at multiple yards strategically located near major ports. Our facilities offer safe, efficient, and accessible space for your cargo and vehicles. Count on us for flexible warehousing solutions designed to optimize your logistics and streamline your supply chain operations.</p>
                </div>
                <div class="op-imagen">
                    <img src="img/02.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque">
                <div class="op-contenido">
                    <h3>Photo service</h3>
                    <p>We provide high-quality photo services upon request to document the condition of your cargo. Our team captures detailed images during inspection, loading, or storage. This ensures full transparency, giving you complete peace of mind and accurate visual records for your logistics and inventory management.</p>
                </div>
                <div class="op-imagen">
                    <img src="img/03.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <h3>Maintenance and repair service</h3>
                    <p>We offer a fully equipped auto workshop and qualified staff to handle all maintenance and repair work, tailored to your requirements and budget. From routine servicing to major repairs, we ensure top-quality results. Additionally, professional car cleaning services are available to keep your vehicles in pristine condition.</p>
                </div>
                <div class="op-imagen">
                    <img src="img/04.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque">
                <div class="op-contenido">
                    <h3>Pre-Cleaning Service</h3>
                    <p>We provide official, customs-approved pre-cleaning services in Japan for vehicles bound for Australia and New Zealand. Our specialized process ensures full compliance with strict biosecurity regulations. Trust our team to deliver thorough cleaning, preventing delays and ensuring a smooth, hassle-free customs clearance for your cargo.</p>
                </div>
                <div class="op-imagen">
                    <img src="img/05.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <h3>Quarantine inspection service</h3>
                    <p>We provide comprehensive quarantine inspection services compliant with international standards, including DAFF and MAF regulations. Our expert team ensures your cargo meets the strict biosecurity requirements of different destination countries. Trust us to handle all inspections efficiently, minimizing risks and preventing costly delays at customs.</p>
                </div>
                <div class="op-imagen">
                    <img src="img/06.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque">
                <div class="op-contenido">
                    <h3>Pre-shipment Inspection/ certificate issue</h3>
                    <p>We arrange comprehensive pre-shipment inspections and issue official certificates to meet the strict regulatory requirements of different destination countries. Partnering with accredited agencies like JAAI, EAA, JEVIC, and QISJ, we ensure your cargo is fully compliant. Trust us to handle your documentation and prevent customs delays.</p>
                </div>
                <div class="op-imagen">
                    <img src="img/07.jpg" alt="">
                </div>
            </div>
            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <h3>Vanning</h3>
                    <p>Our highly experienced vanning staff ensures your vehicles and cargo are loaded quickly, safely, and securely. Utilizing professional techniques and equipment, we maximize container space while preventing any transit damage. Trust our efficient team to handle your loading needs with the highest standards of safety and care.</p>
                </div>
                <div class="op-imagen">
                    <img src="img/08.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <div class="service-contenido">
        <p>*Some of the ports or locations are not available, please contact us for detail.</p>
    </div>

    </head>

    <body>
        <script>
        </script>
    </body>

</html>