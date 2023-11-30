<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Participantes de Grupos de la Iglesia</title>
</head>
<style>
    img {
        height: 10%;
        width: 20%;
    }
</style>

<body>

    <form>
        <CENTER>
            <h4 class="card-title">Listado de Participantes de Grupos de la Iglesia : {{ $iglesia->name }}
            </h4>
            &nbsp; <p>
        </CENTER>

        <CENTER> <img src="{{ $iglesia->logo_url }}{{ $iglesia->logo }}"></CENTER>
        &nbsp; <p>
            <CENTER>
                <div style="text-align:center;">
                    <table border="1" style="margin: 0 auto;">
                        <thead>

                            <tr class="td-table">

                                <th style="text-align: center">NOMBRE</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($participantes as $obj)
                                <tr>

                                    <td align="center">{{ $obj->nombre }}</td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </CENTER>
    </form>

</body>

</html>
