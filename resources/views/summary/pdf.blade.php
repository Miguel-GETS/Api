<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe</title>
    <style>
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

        h3{
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
    </style>
</head>

<body>




    <div class="page"></div>
    <div class="container">
        <img class="logo" src="{{ public_path() . '/img/logFlowbii.png' }}" />
    </div>

    <img class="watermark" src="{{public_path().'/img/04.png'}}" />

    <div class="card">
        <h1>Summary</h1>
        <div class="block">
            <table cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <td class="labelTable" width="75%">
                        <ul>
                            <label class="font-bold">Company</label>
                        </ul>
                    </td>
                    <td class="contentTable">
                        <span class="uppercase">{{ $data['company']['companyName'] }}
                            {{ $data['company']['terminationName'] }}</span>
                    </td>
                </tr>
            </table>

        </div>
        <hr>
        <div class="block">
            <table cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <td class="labelTable" width="75%">
                        <ul>
                            <label >Name</label>
                        </ul>
                    </td>
                    <td class="contentTable">
                        <span class="uppercase">{{ $data['company']['fullName'] }}</span>
                    </td>
                </tr>
                <tr>
                    <td width="75%">
                        <ul class="labelTable">
                            <label >Email</label>
                        </ul>
                    </td>
                    <td class="contentTable">
                        <span class="uppercase">{{ $data['company']['emailAddress'] }}</span>

                    </td>
                </tr>
            </table>



        </div>

    </div>
    <div class="card">
        <div class="block">




            <table cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <td width="5%"><b>x1</b></td>
                    <td width="75%">
                        <ul>
                            <h3><b>PLAN | {{ $data['plan']['planName'] }} | {{ $data['plan']['planPeriod'] }}</b></h3>
                            @foreach ($data['plan']['planFeatures'] as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach

                        </ul>
                    </td>
                    <td><b>
                            ${{ $data['plan']['planPrice'] }}
                        </b>
                    </td>
                </tr>
            </table>
        </div>
        <div class="block">
            <table cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <td width="5%"><b>x1</b></td>
                    <td width="75%">
                        <ul>
                            <h3><b>REGISTRATION STATE FEE | {{ $data['state_fee']['state']['stateName'] }} |
                                    {{ $data['state_fee']['structure']['structureName'] }}</b></h3>


                        </ul>
                    </td>
                    <td>
                        <b>
                            ${{ $data['state_fee']['feePrice'] }}
                        </b>
                    </td>
                </tr>
            </table>
        </div>

        @if ($data['state_fee']['state']['benefistName'])
        <div class="block">
            <table cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <td width="5%"><b>x1</b></td>
                    <td width="75%">
                        <ul>
                            <h3><b>{{ $data['state_fee']['state']['benefistName'] }}</b></h3>


                        </ul>
                    </td>
                    <td>
                        <b>
                            ${{ $data['state_fee']['state']['benefistPrice'] }}
                        </b>
                    </td>
                </tr>
            </table>
        </div>
        @endif
        
        <hr>

        <div class="block">
            <table cellspacing="0" cellpadding="5" width="100%">
                <tr>
                    <td class="labelTable" width="80%">
                        <ul>
                            <label class="font-bold">Total</label>
                        </ul>
                    </td>
                    <td ">
                        <span class="uppercase"><b>${{ $data['total']}}</b></span>
                    </td>
                </tr>

            </table>
        </div>
        <!-- Agrega aquí otras propiedades de resumen que desees mostrar -->
    </div>
</body>

</html>
