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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/rt-plugins.css">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- START : Theme Config js-->
    <script src="assets/js/settings.js" sync></script>
    <!-- END : Theme Config js-->

    <style>
        .card-title,
        .form-label {
            text-transform: none;
        }

        .altura {
            height: 600px;
        }
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body class=" font-inter skin-default">



    <div class="content-wrapper transition-all duration-150" id="content_wrapper">
        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">

                    <div class="space-y-5">
                        <div class="grid grid-cols-12 gap-5">
                            <div class="xl:col-span-2 col-span-12 lg:col-span-5 ">
                                &nbsp;
                            </div>
                            <div class="xl:col-span-8 col-span-12 lg:col-span-7">
                                <div class="card h-full">
                                    <div class="wizard card">
                                        <div class="card-header">
                                            <h4 class="card-title">form wizard</h4>
                                        </div>
                                        <div class="card-body p-6">
                                            <div class="wizard-steps flex z-[5] items-center relative justify-center md:mx-8">

                                                <div class="  active pass  relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step" data-step="1">
                                                    <div class="number-box">
                                                        <span class="number">
                                                            1
                                                        </span>
                                                        <span class="no-icon text-3xl">
                                                            <iconify-icon icon="bx:check-double"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="bar-line"></div>
                                                    <div class="circle-box">

                                                    </div>
                                                </div>
                                                @php($i = 2)
                                                @foreach($questions as $obj)
                                                <div class="  relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step" data-step="1" id="div{{$i}}">
                                                    <div class="number-box">
                                                        <span class="number">
                                                           {{$i}} 
                                                        </span>
                                                        <span class="no-icon text-3xl">
                                                            <iconify-icon icon="bx:check-double"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="bar-line"></div>
                                                    <div class="circle-box">

                                                    </div>
                                                </div>
                                                @php($i++)
                                                @php($num = $i)
                                                @endforeach

                                                <div class="  relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step" data-step="1">
                                                    <div class="number-box">
                                                        <span class="number">
                                                            {{$num +1 }}
                                                        </span>
                                                        <span class="no-icon text-3xl">
                                                            <iconify-icon icon="bx:check-double"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="bar-line"></div>
                                                    <div class="circle-box">
                                                        <span class="w-max">Address</span>
                                                    </div>
                                                </div>

                                                <div class="  relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step" data-step="1">
                                                    <div class="number-box">
                                                        <span class="number">
                                                            {{$num + 1 + 1}}
                                                        </span>
                                                        <span class="no-icon text-3xl">
                                                            <iconify-icon icon="bx:check-double"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="bar-line"></div>
                                                    <div class="circle-box">
                                                        <span class="w-max">Address</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- inicio del form -->
                                            <form class="wizard-form mt-10" action="#" >
                                                <div class="wizard-form-step active" data-step="1">
                                                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                        <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                            <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Enter Your Account Details</h4>
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="username" class="form-label">User Name*</label>
                                                            <input id="username" type="text" class="form-control" placeholder="Username">
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="fullname" class="form-label">Full Name*</label>
                                                            <input id="fullname" type="text" class="form-control" placeholder="Full Name">
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="email" class="form-label">Email*</label>
                                                            <input id="email" type="text" class="form-control" placeholder="Enter Your Email">
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="phonenumber" class="form-label">Phone number*</label>
                                                            <input id="phonenumber" type="text" class="form-control" placeholder="Phone Number">
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="password" class="form-label">Password*</label>
                                                            <input id="password" type="password" class="form-control" placeholder="Password">
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="confirmPassword" class="form-label">Confirm Password*</label>
                                                            <input id="confirmPassword" type="password" class="form-control" placeholder="Confirm Password">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php($j=2)
                                                @foreach($questions as $obj)
                                                <div class="wizard-form-step" data-step="{{$j}}">
                                                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                        <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                            <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Personal Information</h4>
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="firstname" class="form-label">First Name*</label>
                                                            <input id="firstname" type="text" class="form-control" placeholder="First">
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="lastname" class="form-label">Last Name*</label>
                                                            <input id="lastname" type="text" class="form-control" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php($j++)
                                                @php($numm = $j)
                                                @endforeach
                                                <div class="wizard-form-step" data-step="{{$numm+1}}">
                                                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                        <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                            <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Address</h4>
                                                        </div>
                                                        <div class="input-area lg:col-span-3 md:col-span-2 col-span-1">
                                                            <label for="address" class="form-label">Address*</label>
                                                            <textarea name="address" id="address" rows="3" class="form-control" placeholder="Your Address"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wizard-form-step" data-step="{{$numm+1+1}}">
                                                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                        <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                            <h4 class="text-base text-slate-800 dark:text-slate-300 my-6">Social Links</h4>
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="fblink" class="form-label">Facebook Link*</label>
                                                            <input id="fblink" type="url" class="form-control" placeholder="Facebook Link">
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="youtubelink" class="form-label">Youtube Link*</label>
                                                            <input id="youtubelink" type="url" class="form-control" placeholder="Youtube Link">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-6   space-x-3">
                                                    <button class="btn btn-dark prev-button" type="button">prev</button>
                                                    <button class="btn btn-dark next-button" type="button">next</button>
                                                </div>
                                            </form>
                                            <!-- fin de formulario -->
                                        </div>
                                    </div>
                                    <!-- END: Step Form Horizontal -->

                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-2 col-span-12 space-y-5">
                            &nbsp;
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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js'></script>
    <script>
        $(document).ready(function() {
            $(":input").inputmask();
        });
    </script>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('/images', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Imagen subida con éxito');
                    } else {
                        alert('Error al subir la imagen');
                    }
                })
                .catch(error => {
                    alert('Error en la solicitud');
                });
        });
    </script>


    <script>
        function myFunctionbackt0() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'block';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.add('active');
            document.getElementById("active8").classList.remove('active');
            // var x = document.getElementById("div1");
            // if (x.style.display === "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";

            // }
            // var y= document.getElementById("div2");
            // if (y.style.display === "none") {
            //     y.style.display = "block";
            // } else {
            //     y.style.display = "none";

            // }


        }

        function myFunctionbackt1() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'block';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.add('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
            // var x = document.getElementById("div1");
            // if (x.style.display === "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";

            // }
            // var y= document.getElementById("div2");
            // if (y.style.display === "none") {
            //     y.style.display = "block";
            // } else {
            //     y.style.display = "none";

            // }


        }


        function myFunctionbackt2() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'block';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.add('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionbackt3() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.add('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionbackt4() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div3").style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.add('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionbackt5() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'block';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.add('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionbackt6() {


            document.getElementById("div1").style.display = 'block';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.add('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionnext() {

            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'block';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active2").classList.add('active');
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
            // var x = document.getElementById("div1");
            // if (x.style.display === "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";

            // }
            // var y= document.getElementById("div2");
            // if (y.style.display === "none") {
            //     y.style.display = "block";
            // } else {
            //     y.style.display = "none";

            // }


        }

        function myFunctionnext2() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'block';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active3").classList.add('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext3() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active4").classList.add('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext4() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'block';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active5").classList.add('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext5() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'block';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active6").classList.add('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext6() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'block';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active7").classList.add('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext7() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'block';
            document.getElementById("active8").classList.add('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active").classList.remove('active');
        }

        function myFunctionnext8() {
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div8").style.display = 'block';
            document.getElementById("active8").classList.add('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active").classList.remove('active');
        }
    </script>


    <script>
        google.charts.load('current', {
            'packages': ['geochart']
        });

        $(document).ready(function() {
            get_map('A');
        });


        function get_map(dep) {
            //console.log(dep);
            // Realizar la solicitud AJAX
            $.ajax({
                url: "{{ url('get_map') }}/" + dep, // La URL de la solicitud
                type: "GET", // Método de la solicitud (GET en este caso)
                //dataType: "json", // Tipo de datos esperados en la respuesta (puedes ajustarlo según tus necesidades)

                // Función que se ejecuta cuando la solicitud es exitosa
                success: function(data) {
                    //console.log(data);
                    // Pintar la respuesta en el div_result
                    $("#div_result").html(data);
                },

                // Función que se ejecuta si la solicitud falla
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", status, error);
                }
            });
        }
    </script>
</body>

</html>