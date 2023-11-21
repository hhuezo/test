
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

    <form >
        <CENTER>  <h4 class="card-title">Listado de Participantes de Grupos de la Iglesia : {{ $iglesia->name }}
        </h4>
        &nbsp; <p></CENTER>

       <CENTER> <img src="{{ $iglesia->logo_url }}{{ $iglesia->logo }}"></CENTER>
        &nbsp; <p>
            <CENTER>
        <table  BORDER>
            <thead >

                        <tr class="td-table">

                            <th style="text-align: center">NOMBRE</th>
                            <th style="text-align: center">APELLIDO</th>
                            <th style="text-align: center">GRUPO</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($miembros  as $obj)
                                <tr>

                                        <td  align="center">{{ $obj->name_member }}</td>
                                        <td  align="center">{{ $obj->lastname_member }}</td>
                                        <td  align="center">{{ $obj->nombre_grupo }}</td>

                                </tr>

                            @endforeach


                    </tbody>
                </table></CENTER>
            </form>

</body>
</html>
