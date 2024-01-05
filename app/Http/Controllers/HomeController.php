<?php

namespace App\Http\Controllers;

use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($user->hasRole('participante') == true) {

            return redirect('administracion/iglesia_plan_estudio/control_participante');
        } else {
            return view('test');

            if (auth()->user()->status == 0) {
                return view('home2');
            }
            if ($user->hasRole('member')) {
                return redirect('course');
            }
        }
    }

    public function test()
    {

        $nombresHombres = array(
            "José", "Antonio", "Manuel", "Francisco", "David", "Juan", "Javier", "José Antonio", "Francisco Javier", "Carlos",
            "Alberto", "Rafael", "Fernando", "Pablo", "Alejandro", "Ramón", "Alfredo", "Santiago", "Miguel Ángel", "Jesús",
            "Jorge", "Enrique", "Ricardo", "Óscar", "Daniel", "Mario", "Francisco José", "Diego", "Álvaro", "Adrián",
            "Joaquín", "Iván", "Andrés", "Sergio", "Félix", "Julio", "Víctor", "Luis", "Ángel", "Pedro",
            "Guillermo", "Agustín", "Gonzalo", "Tomás", "Gregorio", "Hugo", "Marcos", "César", "Rubén", "Mauricio",
            "Raúl", "Ignacio", "Gustavo", "Rodrigo", "Gerardo", "Héctor", "Roberto", "Eduardo", "Felipe", "Raimundo",
            "Gabriel", "Emilio", "Julio César", "Salvador", "Vicente", "Ernesto", "Francisco Javier", "Eugenio", "Ismael", "Cristóbal",
            "Esteban", "Arturo", "Álvaro", "Leandro", "Ricardo", "Germán", "Carlos Alberto", "Juan Carlos", "Adolfo", "Fidel",
            "Darío", "Santiago", "Aurelio", "Evaristo", "Bernardo", "Román", "Fernando", "Pascual", "Martín", "Ramiro",
            "Bonifacio", "Víctor Manuel", "Juan José", "Pepe", "Faustino", "Damián", "Rosendo", "Cayetano", "Ezequiel", "Pancho",
            "Hipólito", "Amado", "Eduardo", "Benito", "Juan Manuel", "Hermenegildo", "Reynaldo", "Armando", "Mariano", "Balbino",
            "Maximiliano", "Leonardo", "Camilo", "Alexis", "Emanuel", "Ian", "Lucas", "Mateo", "Nicolas", "Ariel",
            "Rodolfo", "Martin", "Juan David", "Sebastian", "Diego Alejandro", "Cristian", "Daniel Alejandro", "Andres Felipe", "Carlos Daniel", "Sergio Andres",
            "Juan Sebastian", "Carlos Andres", "Gabriel", "Samuel", "Angel", "Diego Armando", "Luis Fernando", "Carlos Alberto", "Juan Esteban", "Oscar",
            "Julian", "Andres", "Carlos Mario", "Jhon Jairo", "Mario", "Hernan", "Jaime", "Luis Carlos", "Jorge Ivan", "Luis Alberto",
            "Oscar Ivan", "Jhon Fredy", "Diego Fernando", "Carlos Arturo", "Jhon", "Carlos Eduardo", "Edgar", "Jairo", "Carlos Enrique", "Fabian",
            "Humberto", "Ivan", "Gustavo Adolfo", "Mario Alberto", "Jhonatan", "Carlos Julian", "Juan Camilo", "Alex", "Jhon Edison", "Carlos Javier",
            "Didier", "Luis Eduardo", "Victor Manuel", "Alvaro Jose", "Carlos Felipe", "Jhon Alexander", "Luis Javier", "Freddy", "Luis Gabriel", "Carlos Manuel",
            "Edwin", "Gustavo", "Mario Alejandro", "Paulo", "Andres Camilo", "Jhonny", "Julian Andres", "Andres Julian", "Mauricio", "Pedro"
        );
        $nombresMujeres = array(
            "María Carmen", "María", "Carmen", "Josefa", "Isabel", "Ana María", "María Pilar", "María Dolores", "María Teresa", "Ana",
            "Laura", "Cristina", "Marta", "Sara", "Andrea", "Patricia", "Beatriz", "Sonia", "Paula", "Silvia",
            "Sandra", "Raquel", "Lucía", "Teresa", "Ana Isabel", "Susana", "Juana", "Rosa María", "Pilar", "María José",
            "María Isabel", "María Luisa", "Inmaculada", "María Teresa", "María Jesús", "Lourdes", "María Soledad", "Mercedes", "Rosa", "Ana Belén",
            "Yolanda", "María Angeles", "María Mar", "Alicia", "Julia", "Isabel María", "María Pilar", "María Mercedes", "Eva", "Rocío",
            "Concepción", "Victoria", "María Rosario", "Ana Rosa", "María Victoria", "María Concepción", "Ana María", "Elena", "María Elena", "María Rocío",
            "María Yolanda", "María Cristina", "Consuelo", "María Consuelo", "María Amparo", "Amparo", "María Dolores", "Dolores", "María Luz", "Luz",
            "María Juana", "Juana", "María Beatriz", "Beatriz", "María Laura", "Laura", "María Patricia", "Patricia", "María Marta", "Marta",
            "María Sara", "Sara", "María Andrea", "Andrea", "María Sonia", "Sonia", "María Paula", "Paula", "María Silvia", "Silvia",
            "María Sandra", "Sandra", "María Raquel", "Raquel", "María Lucía", "Lucía", "María Teresa", "Teresa", "María Susana", "Susana"
        );

        $apellidos = array(
            "García", "González", "Rodríguez", "Fernández", "López", "Martínez", "Sánchez", "Pérez", "Gómez", "Martín",
            "Ruiz", "Hernández", "Jiménez", "Díaz", "Moreno", "Muñoz", "Álvarez", "Romero", "Alonso", "Gutiérrez",
            "Navarro", "Torres", "Domínguez", "Vargas", "Ramos", "Gil", "Ramírez", "Serrano", "Blanco", "Molina",
            "Morales", "Suárez", "Ortega", "Delgado", "Castro", "Ortiz", "Rubio", "Marín", "Sanz", "Iglesias",
            "Medina", "Cortés", "Garrido", "Castillo", "Santos", "Lozano", "Guerrero", "Cano", "Prieto", "Méndez",
            "Cruz", "Calvo", "Gallego", "Vidal", "León", "Herrero", "Peña", "Flores", "Cabrera", "Campos",
            "Vega", "Fuentes", "Carrasco", "Diez", "Caballero", "Nieto", "Reyes", "Aguilar", "Santana", "Lorenzo",
            "Hidalgo", "Montero", "Herrera", "Marquez", "Peñalver", "Rojas", "Sepúlveda", "Paredes", "Cordero", "Zamora",
            "Manso", "Soto", "Barrio", "Moya", "Luque", "Soriano", "Covarrubias", "Guillén", "Espinosa", "Gallardo",
            "Montes", "Riera", "Esteban", "Cuenca", "Pascual", "Bravo", "Miralles", "Duque", "Vera", "Crespo"
        );

        $iglesias = Iglesia::get();

        foreach ($iglesias as $iglesia) {

            if ($iglesia->users_has_iglesia->count() < 20) {



                $personas = array();

                // 10 personas (hombres o mujeres) con fecha de nacimiento > 01/01/2005 y < 2015 y grupo = 1
                for ($i = 0; $i < 10; $i++) {
                    $genero = rand(1, 2); // género aleatorio (1 para mujer, 2 para hombre)
                    $nombre = $genero == 1 ? $nombresMujeres[array_rand($nombresMujeres)] : $nombresHombres[array_rand($nombresHombres)]; // nombre aleatorio basado en el género
                    $personas[] = array(
                        "nombre" => $nombre,
                        "apellido" => $apellidos[array_rand($apellidos)], // apellido aleatorio
                        "genero" => $genero,
                        "email" => strtolower(str_replace(' ', '', $nombre)) . rand(100, 999) . "@mail.com", // email aleatorio
                        "document_number" => rand(10000000, 99999999) . "-" . rand(0, 9), // número de documento aleatorio
                        "birthdate" => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 28), rand(2006, 2014))), // fecha de nacimiento aleatoria > 01/01/2005 y < 2015
                        "cell_phone_number" => rand(1000, 9999) . "-" . rand(1000, 9999), // número de teléfono celular aleatorio
                        "grupo" => "1" // grupo estático
                    );
                }


                // 5 hombres con fecha de nacimiento < 01/01/2006 y grupo = 2
                for ($i = 10; $i < 15; $i++) {
                    $nombre = $nombresHombres[array_rand($nombresHombres)]; // nombre aleatorio de hombre
                    $personas[] = array(
                        "nombre" => $nombre,
                        "apellido" => $apellidos[array_rand($apellidos)], // apellido aleatorio
                        "genero" => 2, // 2 para hombre
                        "email" => strtolower(str_replace(' ', '', $nombre)) . rand(100, 999) . "@mail.com", // email aleatorio
                        "document_number" => rand(10000000, 99999999) . "-" . rand(0, 9), // número de documento aleatorio
                        "birthdate" => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(1980, 2005))), // fecha de nacimiento aleatoria < 01/01/2006
                        "cell_phone_number" => rand(1000, 9999) . "-" . rand(1000, 9999), // número de teléfono celular aleatorio
                        "grupo" => "2" // grupo estático
                    );
                }


                // 5 mujeres con fecha de nacimiento < 01/01/2006 y grupo = 3
                for ($i = 15; $i < 20; $i++) {
                    $nombre = $nombresMujeres[array_rand($nombresMujeres)]; // nombre aleatorio de mujer
                    $personas[] = array(
                        "nombre" => $nombre,
                        "apellido" => $apellidos[array_rand($apellidos)], // apellido aleatorio
                        "genero" => 1, // 1 para mujer
                        "email" => strtolower(str_replace(' ', '', $nombre)) . rand(100, 999) . "@mail.com", // email aleatorio
                        "document_number" => rand(10000000, 99999999) . "-" . rand(0, 9), // número de documento aleatorio
                        "birthdate" => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(1980, 2005))), // fecha de nacimiento aleatoria < 01/01/2006
                        "cell_phone_number" => rand(1000, 9999) . "-" . rand(1000, 9999), // número de teléfono celular aleatorio
                        "grupo" => "3" // grupo estático
                    );
                }



                // 5 personas (hombres o mujeres) con fecha de nacimiento < 01/01/2006 y grupo = 4
                for ($i = 20; $i < 25; $i++) {
                    $genero = rand(1, 2); // género aleatorio (1 para mujer, 2 para hombre)
                    $nombre = $genero == 1 ? $nombresMujeres[array_rand($nombresMujeres)] : $nombresHombres[array_rand($nombresHombres)]; // nombre aleatorio basado en el género
                    $personas[] = array(
                        "nombre" => $nombre,
                        "apellido" => $apellidos[array_rand($apellidos)], // apellido aleatorio
                        "genero" => $genero,
                        "email" => strtolower(str_replace(' ', '', $nombre)) . rand(100, 999) . "@mail.com", // email aleatorio
                        "document_number" => rand(10000000, 99999999) . "-" . rand(0, 9), // número de documento aleatorio
                        "birthdate" => date("Y-m-d", mktime(0, 0, 0, rand(1, 12), rand(1, 31), rand(1980, 2005))), // fecha de nacimiento aleatoria < 01/01/2006
                        "cell_phone_number" => rand(1000, 9999) . "-" . rand(1000, 9999), // número de teléfono celular aleatorio
                        "grupo" => "4" // grupo estático
                    );
                }

                foreach ($personas as $persona) {
                    $usuario = new User();
                    $usuario->name = $persona["nombre"];
                    $usuario->last_name = $persona["apellido"];
                    $usuario->email = $persona["email"];
                    $usuario->password = Hash::make('12345678');
                    $usuario->save();

                    $participante = new Member();
                    $participante->users_id = $usuario->id;
                    $participante->name_member = $persona["nombre"];
                    $participante->lastname_member = $persona["apellido"];
                    $participante->birthdate = $persona["birthdate"];
                    $participante->document_number = $persona["document_number"];
                    $participante->catalog_gender_id = $persona["genero"];
                    $participante->email = $persona["email"];
                    $participante->cell_phone_number = $persona["cell_phone_number"];
                    $participante->municipio_id = $iglesia->catalog_municipio_id;
                    $participante->departamento_id = $iglesia->catalog_departamento_id;
                    $participante->save();

                    $iglesia->users_has_iglesia()->attach($usuario->id);
                    $participante->member_has_group()->attach($persona["grupo"]);
                }
            }
        }

        dd("");

        return view('test');
    }


    public function confirmacion()
    {
        dd('redireccionado');
        return view('confirma');
    }
}
