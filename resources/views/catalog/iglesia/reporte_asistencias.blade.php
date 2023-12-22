
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Asistencia de  Participantes de Grupos de la Iglesia</title>
</head>
<style>
    img {
  height: 10%;
  width: 20%;
}
</style>
<body>
    <form >
        &nbsp;  &nbsp;  &nbsp;

<center>Nombre de Iglesia: {{ $iglesia->name}}   </center>
&nbsp;
<center>
<table border="1">
<tr><td colspan="5"><center>Informacion del Participante </center></td><td colspan=" {{ $sessiones->count() +1 }}"><center>Asistencia</center></td></tr>
    <tr>
        <td>DUI </td>
        <td> Nombre Completo </td>
        <td> telefono </td>
        <td> Correo electronico </td>
        <td> Genero </td>
        @foreach ($sessiones as $session)
            <td>
                {{ $session->session_name }}
            </td>
        @endforeach

        <td>
            Total
        </td>
    </tr>
    <?php
    $i=0;
    ?>

    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

        @foreach ($participantes as $obj)
        <?php
        $i=0;
        ?>
            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                <td class="table-td">
                    {{ $obj->document_number }}
                </td>
                <td>
                    {{ $obj->name_member }} {{ $obj->lastname_member }}
                </td>
                <td>
                    {{ $obj->cell_phone_number }}
                </td>
                <td>
                    {{ $obj->email }}
                </td>
                <td>
                    {{ $obj->genders ? $obj->genders->description : '' }}
                </td>

                @foreach ($sessiones as $session)
                <td>
                    {{ $session-> asistencia($session->id,$obj->id) }}
                    <?php
                     $i= $i +  $session-> asistencia($session->id,$obj->id)  ;
                    ?>
                </td>

            @endforeach
            <td>  <?php echo $i
                ?></td>
            </tr>
        @endforeach

    </tbody>


</table>
</center>
</form>

</body>
</html>
