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

    .small {
        font-size: xx-small;
    }
</style>

<body>


    <div class="input-area relative">
        <label for="largeInput" class="form-label"><B>Cohorte: Año 1 Plan Piloto</B></label>
    </div>
    <div class="input-area relative">
        <label for="largeInput" class="form-label"><B>Código: CISS001 (Certificación Iglesia Segura Sede
                001)</B></label>
    </div>
    <div class="input-area relative">
        <label for="largeInput" class="form-label"><B> Departamento:: </B></label>
    </div>

    <div class="input-area relative">
        <label for="largeInput" class="form-label"><B>Municipio: </B></label>
    </div>

    <div class="input-area relative">
        <label for="largeInput" class="form-label"><B>Zona de País: Centro: </B></label>
    </div>

    <div class="input-area relative">
        <label for="largeInput" class="form-label"><B>Coordinador Encargado: </B></label>
    </div>

    <div class="input-area relative">
        <label for="largeInput" class="form-label"><B>Ubicación de Sede: </B></label>
    </div>
    <div class="input-area relative">
        <label for="largeInput" class="form-label"><B> Nombre de Iglesia: {{ $iglesia->name }}</B></label>
    </div>

    &nbsp; &nbsp; &nbsp;


    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr style="background-color: white; color:gray">
                <td colspan="10">Urban Strategies - Equipo de Sed</td>
            </tr>
            <tr style="background-color: lightgray; color:black">
                <td colspan="4">Sede: </td>
                <td>Sesión 1 </td>
                <td>Sesión 2 </td>
                <td>Sesión 3 </td>
                <td>Sesión 4 </td>
                <td>Sesión 5 </td>
                <td>Sesión 6 </td>
            </tr>
            <tr style="background-color: gray; color:white">
                <th>Lider</th>
                <th>Nombre Completo</th>
                <th>Firma</th>
                <th>Numero de telefono</th>
                <th>23-sep</th>
                <th>7-oct</th>
                <th>23-oct</th>
                <th>04-nov</th>
                <th>18-nov</th>
                <th>2-dic</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td>facilitador(a) lideres</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>

                <td>facilitador(a) hombres</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td>Facilitador(a) Mujeres </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Facilitador(a) Mujeres </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Cuida Niños 1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td>Cuida Niños 2</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>


            </tr>
            <tr>
                <td>Cuida Niños 3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Cuida Niños 4</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </tbody>
    </table>

    &nbsp; &nbsp; &nbsp;


    <table border="1" cellspacing="0" cellpadding="0">
        <thead>

            <tr style="background-color:         lightgray;        color:black">
                <th>Iglesias</th>
                <th>Nombre Completo</th>
                <th>Nombre de Pastor(a)</th>
                <th></th>
                <th>Código de Iglesia </th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td>Iglesia 1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>

                <td>Iglesia 2</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>


            </tr>
            <tr>
                <td>Iglesia 3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td>Iglesia 4</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td>Iglesia 5</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>


            </tr>


        </tbody>
    </table>


    <div style="page-break-after:always"></div>
    @foreach ($grupos_iglesia as $grupos)
        @if ($grupos->id > 1)
            <table border="1" cellspacing="0" cellpadding="0" width="100%">


                <tr>
                    <td colspan="3">Informacion del Participante <b>(Grupo {{ $grupos->nombre }}</b> ) </td>
                    <td width="100%" colspan="6" class="center-text"><span
                            class="bold-text"><center>Asistencia</center></span></td>
                </tr>
                <tr>

                    <td width="10%" rowspan="2" class="bold-text center-text">Nombre Completo</td>

                    <td width="10%" rowspan="2" class="bold-text center-text">Firma</td>
                    <td width="10%" rowspan="2" class="bold-text center-text"></td>
                    @foreach ($sessiones as $session)
                        @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                            <td class="center-text">
                                <center> {{ $session->session_name }}</center>
                            </td>
                        @endif
                    @endforeach

                </tr>

                <tr>
                    @foreach ($sessiones as $session)
                        @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                            @if ($session->iglesia_plan_estudio->group_id > 1)
                                <td ><center>
                                    {{ $session->meeting_date ? date('d/m/Y', strtotime($session->meeting_date)) : '' }}
                                </center>
                                </td>
                            @endif
                        @endif
                    @endforeach
                </tr>
                @foreach ($participantes as $obj)
                    {{-- {{ $obj->grupo_first($obj->id) }} --}}
                    @php($total = 0)

                    @if ($obj->grupo_first($obj->id) == $grupos->id)
                        @if ($obj->grupo_first($obj->id) > 1)
                            <tr>

                                <td>
                                    {{ $obj->name_member }} {{ $obj->lastname_member }}
                                </td>

                                <td style="text-transform: lowercase">

                                </td>
                                <td class="center-text">

                                </td>

                                @foreach ($sessiones as $session)
                                    @if ($session->iglesia_plan_estudio->group_id == $grupos->id)
                                        <td align="center">
                                            @php($asistencia = $session->asistencia($session->id, $obj->id))


                                            @if ($asistencia == 1)
                                                @php($total++)
                                            @endif
                                        </td>
                                    @endif
                                @endforeach



                            </tr>
                        @endif
                    @endif
                @endforeach
        @endif


        </table>
        <div class="page-break"></div>
        &nbsp; &nbsp; &nbsp;
    @endforeach



    <script>
        // Función para ocultar la tabla
        function ocultarTabla() {
            var tabla = document.getElementById('grupostb');
            tabla.style.display = 'none';
        }
    </script>

</body>

</html>
