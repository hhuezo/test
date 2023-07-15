<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Dashcode - HTML Template</title>
    <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/rt-plugins.css">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- START : Theme Config js-->
    <script src="assets/js/settings.js" sync></script>
    <!-- END : Theme Config js-->
</head>

<body class=" font-inter skin-default">

    <div class="page-content">
        <div class="transition-all duration-150 container-fluid" id="page_layout">
            <div id="content_layout">

                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                    <!-- Basic Inputs -->
                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header
                                class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Registro de proyectos</div>
                                </div>
                            </header>
                            <form class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Nombre</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Apellido</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Descripción de proyecto</label>
                                        <input type="tel" class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Pais</label>
                                        <select id="select" class="form-control">
                                            <option value="option1" class="dark:bg-slate-700">El salvador</option>
                                            <option value="option2" class="dark:bg-slate-700">Country 2</option>
                                            <option value="option3" class="dark:bg-slate-700">Country 3</option>
                                            <option value="option4" class="dark:bg-slate-700">Country 4</option>
                                        </select>
                                    </div>
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Fecha inicio</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Fecha final</label>
                                        <input type="date" class="form-control">
                                    </div>
                                  
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Recomendaciones</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="input-area relative">
                                        <label for="largeInput" class="form-label">Imagen</label>
                                        <input type="file" class="form-control">
                                    </div>
                                 
                                  
                                  
                                </div>
                                <div style="text-align: right;">
                                    <button class="btn inline-flex justify-center btn-dark">Aceptar</button>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>





    <!-- scripts -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/rt-plugins.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
