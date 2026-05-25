<!DOCTYPE html>
<html lang="en">

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
            padding: clamp(20px, 4vw, 40px) 0 clamp(40px, 6vw, 80px) 0;
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
        <span class="nosotros-pre-titulo" data-i18n="nosotros_text1">Who We Are</span>
        <h1 class="nosotros-titulo-principal" data-i18n="nosotros_text2">ABOUT US</h1>
        <div class="nosotros-linea-decorativa"></div>
    </div>

    <section class="operacion-origen">
        <div class="contenedor-operacion">

            <div class="op-bloque">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="nosotros_text3">Since 2000</span>
                    <h3 data-i18n="nosotros_text4">ADVANCED SOUTH CENTRAL</h3>
                    <p data-i18n="nosotros_text5">(Licence Number 542660501200), was established in 2000 and is one of the fastest growing international car exporters in Japan.</p>
                    <p data-i18n="nosotros_text6">We offer new or used CARS and MACHINERY according to your specifications at a very competitive price. If you already have a Japanese vehicle, we can also assist you in locating hard to find specialized PARTS.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/about-1.png" alt="Advanced South Central Office">
                </div>
            </div>

            <div class="op-bloque inverso">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="nosotros_text7">Live Auctions</span>
                    <h3 data-i18n="nosotros_text8">Car & Machinery Auction Market</h3>
                    <p data-i18n="nosotros_text9">Allow us to be the conduit between you and the vast CAR and MACHINERY AUCTION MARKET in Japan. We have staff that attends a number of auctions on a daily basis. Tell us what kind of vehicle you are looking for and leave the searching up to us.</p>
                    <p data-i18n="nosotros_text10">For those who have difficulty in finding CAR and MACHINERY PARTS, we can supply you with used or rebuilt parts. Provide us with your cars specifications and we can easily locate the parts you need.</p>
                </div>
                <div class="op-imagen">
                    <img src="../../img/about-2.jpeg" alt="Japanese Car Auction">
                </div>
            </div>

            <div class="op-bloque">
                <div class="op-contenido">
                    <span class="op-tag" data-i18n="nosotros_text11">Global Logistics</span>
                    <h3 data-i18n="nosotros_text12">Worldwide Shipping & Shipping Rates</h3>
                    <p data-i18n="nosotros_text13">Exporting to most countries around the world, ADVANCED SOUTH CENTRAL has helped many people in finding the unique Japanese vehicle that they desire.</p>
                    <p data-i18n="nosotros_text14">Your vehicle will be safely dispatched in containers. The final price is 4,600 USD per container (charge and packing included). The freight is prepaid. In the case of shipments to Peru and Chile it can be by collect.</p>

                    <ul class="op-lista">
                        <li data-i18n="nosotros_text15">Safe container dispatch</li>
                        <li data-i18n="nosotros_text16">Prepaid freight worldwide</li>
                        <li data-i18n="nosotros_text17">Collect option available for Peru and Chile</li>
                    </ul>
                </div>
                <div class="op-imagen">
                    <img src="../../img/about-3.png" alt="Shipping Containers">
                </div>
            </div>

        </div>
    </section>

    <div class="service-contenido" style="margin-top: 20px; margin-bottom: 60px;">
        <h3 data-i18n="nosotros_text18">Let ADVANCED SOUTH CENTRAL help find the perfect car for you!</h3>
    </div>

</body>

</html>