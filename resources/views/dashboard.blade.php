<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artes da Tia Eva</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .background {
        background-image: url('{{ asset('images/bg_inicial.jpg') }}');
    }

    .banner {
        background-size: cover;
        background-position: center;
        padding: 50px 20px;
        text-align: center;
        position: relative;
    }

    .banner h1 {
        font-size: 2.5em;
        margin: 0;
    }

    .banner p {
        font-size: 1.2em;
        margin: 10px 0;
    }

    .banner .cta-button {
        background-color: #ff5733;
        /* Cor do botão */
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .banner .cta-button:hover {
        background-color: #c0392b;
        /* Cor do botão ao passar o mouse */
    }

    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Lato", sans-serif
    }

    .w3-bar,
    h1,
    button {
        font-family: "Montserrat", sans-serif
    }

    .fa-anchor,
    .fa-coffee {
        font-size: 200px
    }
</style>

<body>
    <x-app-layout>
        <!-- header com imagem maior -->
        <header class="w3-container w3-pink w3-center"
            style="padding:128px 16px; background-image: url('images/bg_inicial.jpg'); background-size: cover; background-position: center;">
            <h1 class="w3-margin w3-jumbo">ARTES DA TIA EVA</h1>
            <p class="w3-xlarge">Confira nossos produtos!</p>
        </header>
        <!-- primeira grid sobre mim -->
        <div class="w3-row-padding w3-padding-64 w3-container">
            <div class="w3-content">
                <div class="w3-twothird">
                    <h1>Introdução:</h1>
                    <h5 style="text-align: justify" class="w3-padding-32">&emsp;&emsp;&emsp;Adquira aqui os melhores produtos para você que curte artesanatos!
                    </h5>

                    <p style="text-align: justify" class="w3-text-grey">&emsp;&emsp;&emsp;Transforme suas ideias em realidade com o nosso serviço de agendamento de artesanatos personalizados. Encomende seus produtos e sua quantidade livremente, feitos especialmente para você, com todo o carinho e dedicação que só o artesanato pode oferecer. Seja para decorar, presentear ou dar aquele toque especial à sua casa, estamos aqui para materializar suas inspirações!</p>
                </div>

                <div class="w3-third w3-center">
                    <i style="font-size: 110px" class="fa fa-paint-brush w3-padding-64 w3-text-pink"></i>
                </div>
            </div>
        </div>

        <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i style="font-size: 110px" class="fa fa-check-circle w3-padding-64 w3-text-pink w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
      <h1>Detalhes da compra</h1>
      <h5 style="text-align: justify" class="w3-padding-32">&emsp;&emsp;&emsp;Faça seu pedido na página de agendamentos.

      <p style="text-align: justify" class="w3-text-grey">&emsp;&emsp;&emsp;No momento em que você solicitar um pedido, o administrador entrará em ação transformando você em um cliente. O produto é fabricado a mão em nosso estabelecimento, para chegar até você pelos correios. Após isso é só aproveitar seu produto de artesanato!</p>
    </div>
  </div>
</div>

<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
 <p>Desenvolvido por Eduardo Ângelo Nº6</p>
</footer>


    </x-app-layout>
</body>

</html>