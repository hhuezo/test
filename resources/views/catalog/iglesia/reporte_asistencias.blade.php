<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Asistencia de Participantes de Grupos de la Iglesia</title>
</head>
<style>
    img {
        height: 10%;
        width: 20%;
    }

    th {
        text-transform: capitalize;
    }

    td {
        border: 1px solid;
        width: 100px;
        word-wrap: break-word;
        text-transform: capitalize;
    }
</style>

<body>

    &nbsp; &nbsp; &nbsp;
    <CENTER> <img src="{{ $iglesia->logo_url }}{{ $iglesia->logo }}"></CENTER>

    <center>
        <h3><b>Nombre de Iglesia: {{ $iglesia->name }} </b></h3>
    </center>
    &nbsp;


    @foreach ($grupos_iglesia as $grupos)
        &nbsp; &nbsp; &nbsp;
        <table border="1" cellspacing="0" width="100%">
            <h3><b>Grupos {{ $grupos->nombre }}</b></h3>
            &nbsp; &nbsp; &nbsp;
            <tr>
                <td colspan="5">
                    <center>Informacion del Participante </center>
                </td>
                <td colspan=" {{ $sessiones->count() + 1 }}">
                    <center>Asistencia</center>
                </td>
            </tr>
            <tr>
                <th> DUI </th>
                <th> Nombre Completo </th>
                <th> telefono </th>
                <th> Correo electronico </th>
                <th> Genero </th>
                @foreach ($sessiones as $session)
                    @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                        <th>
                            {{ $session->session_name }}
                        </th>
                    @endif
                @endforeach

                <th>
                    Total
                </th>
            </tr>



            <tbody>

                @foreach ($participantes as $obj)
                    {{-- {{ $obj->grupo_first($obj->id) }} --}}
                    @php($total = 0)

                    @if ($obj->grupo_first($obj->id) == $grupos->id)
                        <tr>
                            <td>
                                {{ $obj->document_number }}
                            </td>
                            <td>
                                {{ $obj->name_member }} {{ $obj->lastname_member }}
                            </td>
                            <td>
                                {{ $obj->cell_phone_number }}
                            </td>
                            <td style="text-transform: lowercase">
                                {{ $obj->email }}
                            </td>
                            <td>
                                {{ $obj->genders ? $obj->genders->description : '' }}
                            </td>

                            @foreach ($sessiones as $session)
                                @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                                    <td>
                                        @php($asistencia = $session->asistencia($session->id, $obj->id))
                                        {{ $asistencia }}

                                        @if ($asistencia == 1)
                                            @php($total++)
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                            <td>{{ $total }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>


        </table>
    @endforeach


</body>

</html>
