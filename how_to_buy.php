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

         .op-lista li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #e58a13;
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

     <?php include 'topbar.php'; ?>

     <div class="contenedor-titulo-nosotros">
         <h1 class="nosotros-titulo-principal">HOW TO BUY</h1>
         <div class="nosotros-linea-decorativa"></div>
     </div>

     <div class="contenedor-titulo-nosotros">
         <span class="nosotros-pre-titulo">Step 1</span>
     </div>

     <div class="service-contenido">
         <h3>Choose Vehicle & Send Inquiry</h3>
         <p>Search your required car from high quality Japanese used vehicles ready to export at fair prices in our stock list. Check all photos and complete vehicle details, specifications and inspection sheet to know actual vehicle condition.</p>
     </div>

     <div class="service1-imagen">
         <img src="img/3.jpeg" alt="">
     </div>

     <div class="contenedor-titulo-nosotros">
         <span class="nosotros-pre-titulo">Step 2</span>
     </div>

     <div class="service-contenido">
         <h3>Get Free Quote</h3>
         <p>We will send you Free Quote for the vehicle you are interested to buy.</p>
     </div>

     <div class="service1-imagen">
         <img src="img/3.jpeg" alt="">
     </div>

     <div class="contenedor-titulo-nosotros">
         <span class="nosotros-pre-titulo">Step 3</span>
     </div>

     <div class="service-contenido">
         <h3>Complete the payment</h3>
         <p>Please complete the payment by Bank Telegraphic Transfer from any bank not later than the Paying Due Date specified in the Proforma Invoice. When you have completed the payment, please send us the copy of Telegraphic Transfer copy via fax or e-mail as proof of payment.</p>
     </div>

     <div class="service1-imagen">
         <img src="img/3.jpeg" alt="">
     </div>

     <div class="contenedor-titulo-nosotros">
         <span class="nosotros-pre-titulo">Step 4</span>
     </div>

     <div class="service-contenido">
         <h3>Shipping & Documents</h3>
         <p>We will arrange for latest shipment and send all required documents.</p>
     </div>

     <div class="service1-imagen">
         <img src="img/3.jpeg" alt="">
     </div>

     <div class="contenedor-titulo-nosotros">
         <span class="nosotros-pre-titulo">Step 5</span>
     </div>

     <div class="service-contenido">
         <h3>Receive Your Vehicle</h3>
         <p>Once you receive the documents, please contact your local customs agent for customs clearance at least one week prior to the actual arrival date of vessel. As per customs agent, you can pick up your car at the port. Car registration is different each country, therefore please ask your local authority.</P>
     </div>

     <div class="service1-imagen">
         <img src="img/3.jpeg" alt="">
     </div>

     <div class="service-contenido" style="margin-top: 20px; margin-bottom: 60px;">
        <h3>Let ADVANCED SOUTH CENTRAL help find the perfect car for you!</h3>
    </div>

     <script>
     </script>

 </body>

 </html>