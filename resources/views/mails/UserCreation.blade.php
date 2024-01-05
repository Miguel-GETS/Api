<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .logoContiner {
            margin-top: 40px;

        }

        .containers {
            margin: 10px;
            width: 96%;
        }

        .row {
            margin: 0;
        }

        .message {
            
            margin-top: 50px;
        }

        .logoImagen {
            margin-top: 80px;
        }

        .imagenBot {
            width: 85%;
            height: auto;
        }












        body {
            position: relative;
            font-family: sans-serif;
            margin: 20px;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        h4{
            margin-bottom: 15px;
        }

        ul {
            margin: 0;
        }

        .block {
            margin-bottom: 10px;
        }

        .font-bold {
            font-weight: bold;
        }

        .uppercase {
            text-transform: uppercase;
            word-wrap: break-word;
            overflow-x: hidden;
            width: 70%;
        }



        hr {
            border: 1px solid #ccc;
            margin-top: 20px;
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .watermark {
            position: absolute;
            opacity: 0.3;
            transform: rotate(290deg) scale(0.7);
            top: 83%;
            left: 10%;
            transform-origin: center;
            z-index: -1;
        }

        .container {
            background-color: #f3f3f3;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 100%;
            border-bottom-right-radius: 0;
            padding: 10px;
            padding-right: 25px;
            display: flex;
            align-items: center;
        }

        .logo {
            width: 180px;
            height: auto;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 4px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;

            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color:  transparent;
            color: #333;
            font-family: Arial, sans-serif;
            transition: box-shadow 0.3s ease-in-out;
            height: fit-content;
            margin-bottom: 10px;
        }

        .labelTable {
            text-align: left;
        }

        .contentTable {
            text-align: right;
        }


        .cod {
            font-size: 40px;
            font-weight: bold;
            font-family: 'Courier New', monospace; /* Fuente de consola */
            text-align: center; /* Centrar el texto */
        }
        


          
    </style>

</head>

<body>

    <div class="containers text-start">
        <div class="row">
            <div class="col">
                <div class="logoContiner">
                    <img class="logo" src="{{ asset('img/logFlowbii.png') }}" alt="Logo de Flowbii" />
                </div>
                <p class="message fs-6">
                    ¡Felicidades <b>{!! '@' . $data['name'] !!}</b>! ¡Has sido registrado en Onflowbii exitosamente!
    <p>Esta dirección de correo electrónico se ha utilizado para registrar un nuevo perfil Onflowbii.
                    </p>
                    <p> Para completar tu registro de ingrese a su cuenta con la siguiente contraseña temporal</p>
 
                </p>
                <h1 class="cod"> <b>{{ $data['password'] }} </b> </h1>
          
            </div>
        </div>
    </div>   



</body>

</html>

