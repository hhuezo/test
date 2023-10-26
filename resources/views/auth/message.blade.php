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
    <script src="{{ asset('assets/js/iconify-icon.min.js') }}"></script>
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- START : Theme Config js-->
    <script src="assets/js/settings.js" sync></script>

</head>

<body class=" font-inter skin-default">

    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Lo Sentimos , su iglesia aun no esta
                        preparada para unirse al programa
                        <a href="{{url('/')}}">
                        <button class="btn btn-dark btn-sm float-right">
                            <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                            </iconify-icon>
                            </button>
                        </a>
                    </div>
                </div>
            </header>
            <div class="card-text h-full">
                <p style="text-align: justify" class="text-sm font-Inter text-slate-600 dark:text-slate-300">
                    Te invitamos a unirte mas adelante
            </div>
        </div>
    </div>
</body>

</html>
