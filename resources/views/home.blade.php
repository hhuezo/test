@extends ('menu')
@section('contenido')
    <div class=" space-y-5">

      <div>
      
        <div class="grid grid-cols-12 gap-5 mb-5">
          <div class="2xl:col-span-3 lg:col-span-4 col-span-12">
            <div class="bg-no-repeat bg-cover bg-center p-4 rounded-[6px] relative"
              style="background-image: url(assets/images/all-img/widget-bg-1.png)">
              <div class="max-w-[180px]">
                <div class="text-xl font-medium text-slate-900 mb-2">
                  Información general
                </div>
                <p class="text-sm text-slate-800">
                  &nbsp;
                </p>
              </div>
              <div class="absolute top-1/2 -translate-y-1/2 ltr:right-6 rtl:left-6 mt-2 h-12 w-12 bg-white rounded-full text-xs font-medium
                  flex flex-col items-center justify-center">
                Now
              </div>
            </div>
          </div>
          <div class="2xl:col-span-9 lg:col-span-8 col-span-12">
            <div class="p-4 card">
              <div class="grid md:grid-cols-3 col-span-1 gap-4">

                <!-- BEGIN: Group Chart2 -->


                <div class="py-[18px] px-4 rounded-[6px] bg-[#E5F9FF] dark:bg-slate-900	 ">
                  <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <div class="flex-none">
                      <div id="wline1"></div>
                    </div>
                    <div class="flex-1">
                      <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                        Activas
                      </div>
                      <div class="text-slate-900 dark:text-white text-lg font-medium">
                        450
                      </div>
                    </div>
                  </div>
                </div>

                <div class="py-[18px] px-4 rounded-[6px] bg-[#FFEDE5] dark:bg-slate-900	 ">
                  <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <div class="flex-none">
                      <div id="wline2"></div>
                    </div>
                    <div class="flex-1">
                      <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                        Pendientes de aprovación
                      </div>
                      <div class="text-slate-900 dark:text-white text-lg font-medium">
                        72
                      </div>
                    </div>
                  </div>
                </div>

                <div class="py-[18px] px-4 rounded-[6px] bg-[#EAE5FF] dark:bg-slate-900	 ">
                  <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <div class="flex-none">
                      <div id="wline3"></div>
                    </div>
                    <div class="flex-1">
                      <div class="text-slate-800 dark:text-slate-300 text-sm mb-1 font-medium">
                        Rechazadas
                      </div>
                      <div class="text-slate-900 dark:text-white text-lg font-medium">
                       12
                      </div>
                    </div>
                  </div>
                </div>

                <!-- END: Group Chart2 -->
              </div>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-12 gap-5">
         
         
          <div class="lg:col-span-8 col-span-12">
            <div class="card">
              <header class="card-header noborder">
                <h4 class="card-title">Departamental</h4>
                <div>
                  <!-- BEGIN: Card Dropdown -->
                  <div class="relative">
                    <div class="dropdown relative">
                      <button class="text-xl text-center block w-full " type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
          rounded dark:text-slate-400">
                          <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                        </span>
                      </button>
                      <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
      shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                        <li>
                          <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
              dark:hover:text-white">
                            Last 28 Days</a>
                        </li>
                        <li>
                          <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
              dark:hover:text-white">
                            Last Month</a>
                        </li>
                        <li>
                          <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
              dark:hover:text-white">
                            Last Year</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- END: Card Droopdown -->
                </div>
              </header>
              <div class="card-body p-6">

                <!-- BEGIN: Company Table -->


                <div class="overflow-x-auto -mx-6">
                  <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="  bg-slate-200 dark:bg-slate-700">
                          <tr>

                            <th scope="col" class=" table-th ">
                              Departamento
                            </th>

                            <th scope="col" class=" table-th ">
                              Numero de iglesias
                            </th>

                          

                          </tr>
                        </thead>
                        <tbody
                          class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                          <tr>
                            <td class="table-td">
                              <div class="flex items-center">
                                <div class="flex-none">
                                  <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                    <img src=assets/images/users/user-1.jpg alt=""
                                      class="w-full h-full rounded-[100%] object-cover">
                                  </div>
                                </div>
                                <div class="flex-1 text-start">
                                  <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                    AHUACHAPAN
                                  </h4>
                                
                                </div>
                              </div>
                            </td>
                            <td class="table-td">10</td>                           
                          </tr>

                          <tr>
                            <td class="table-td">
                              <div class="flex items-center">
                                <div class="flex-none">
                                  <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                    <img src=assets/images/users/user-1.jpg alt=""
                                      class="w-full h-full rounded-[100%] object-cover">
                                  </div>
                                </div>
                                <div class="flex-1 text-start">
                                  <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                    SANTA ANA
                                  </h4>
                                
                                </div>
                              </div>
                            </td>
                            <td class="table-td">5</td>                           
                          </tr>

                          <tr>
                            <td class="table-td">
                              <div class="flex items-center">
                                <div class="flex-none">
                                  <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                    <img src=assets/images/users/user-1.jpg alt=""
                                      class="w-full h-full rounded-[100%] object-cover">
                                  </div>
                                </div>
                                <div class="flex-1 text-start">
                                  <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                    AHUACHAPAN
                                  </h4>
                                
                                </div>
                              </div>
                            </td>
                            <td class="table-td">10</td>                           
                          </tr>

                          <tr>
                            <td class="table-td">
                              <div class="flex items-center">
                                <div class="flex-none">
                                  <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                    <img src=assets/images/users/user-1.jpg alt=""
                                      class="w-full h-full rounded-[100%] object-cover">
                                  </div>
                                </div>
                                <div class="flex-1 text-start">
                                  <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                    SONSONATE
                                  </h4>
                                
                                </div>
                              </div>
                            </td>
                            <td class="table-td">26</td>                           
                          </tr>

                          <tr>
                            <td class="table-td">
                              <div class="flex items-center">
                                <div class="flex-none">
                                  <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                    <img src=assets/images/users/user-1.jpg alt=""
                                      class="w-full h-full rounded-[100%] object-cover">
                                  </div>
                                </div>
                                <div class="flex-1 text-start">
                                  <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                    CHALATENANGO
                                  </h4>
                                
                                </div>
                              </div>
                            </td>
                            <td class="table-td">6</td>                           
                          </tr>

                          <tr>
                            <td class="table-td">
                              <div class="flex items-center">
                                <div class="flex-none">
                                  <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                    <img src=assets/images/users/user-1.jpg alt=""
                                      class="w-full h-full rounded-[100%] object-cover">
                                  </div>
                                </div>
                                <div class="flex-1 text-start">
                                  <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                    LA LIBERTAD
                                  </h4>
                                
                                </div>
                              </div>
                            </td>
                            <td class="table-td">13</td>                           
                          </tr>

                          <tr>
                            <td class="table-td">
                              <div class="flex items-center">
                                <div class="flex-none">
                                  <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                    <img src=assets/images/users/user-1.jpg alt=""
                                      class="w-full h-full rounded-[100%] object-cover">
                                  </div>
                                </div>
                                <div class="flex-1 text-start">
                                  <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                    SAN SALVADOR
                                  </h4>
                                
                                </div>
                              </div>
                            </td>
                            <td class="table-td">43</td>                           
                          </tr>
                         

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- END: Company Table -->
              </div>
            </div>
          </div>
          <div class="lg:col-span-4 col-span-12">
            <div class="card ">
              <div class="card-header ">
                <h4 class="card-title">Recent Activity</h4>
                <div>
                  <!-- BEGIN: Card Dropdown -->
                  <div class="relative">
                    <div class="dropdown relative">
                      <button class="text-xl text-center block w-full " type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
          rounded dark:text-slate-400">
                          <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                        </span>
                      </button>
                      <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
      shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                        <li>
                          <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
              dark:hover:text-white">
                            Last 28 Days</a>
                        </li>
                        <li>
                          <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
              dark:hover:text-white">
                            Last Month</a>
                        </li>
                        <li>
                          <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
              dark:hover:text-white">
                            Last Year</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- END: Card Droopdown -->
                </div>
              </div>
              <div class="card-body p-6">

                <!-- BEGIN: Activity Card -->

                <div>
                  <ul class="list-item space-y-3 h-full overflow-x-auto">



                    <li
                      class="flex items-center space-x-3 rtl:space-x-reverse border-b border-slate-100 dark:border-slate-700 last:border-b-0 pb-3 last:pb-0">
                      <div>
                        <div class="w-8 h-8 rounded-[100%]">
                          <img src=assets/images/users/user-1.jpg alt=""
                            class="w-full h-full rounded-[100%] object-cover">
                        </div>
                      </div>
                      <div class="text-start overflow-hidden text-ellipsis whitespace-nowrap max-w-[63%]">
                        <div
                          class="text-sm text-slate-600 dark:text-slate-300 overflow-hidden text-ellipsis whitespace-nowrap">
                          Finance KPI Mobile app launch preparion meeting.
                        </div>
                      </div>
                      <div class="flex-1 ltr:text-right rtl:text-left">
                        <div class="text-sm font-light text-slate-400 dark:text-slate-400">
                          1 hours
                        </div>
                      </div>
                    </li>


                    <li
                      class="flex items-center space-x-3 rtl:space-x-reverse border-b border-slate-100 dark:border-slate-700 last:border-b-0 pb-3 last:pb-0">
                      <div>
                        <div class="w-8 h-8 rounded-[100%]">
                          <img src=assets/images/users/user-2.jpg alt=""
                            class="w-full h-full rounded-[100%] object-cover">
                        </div>
                      </div>
                      <div class="text-start overflow-hidden text-ellipsis whitespace-nowrap max-w-[63%]">
                        <div
                          class="text-sm text-slate-600 dark:text-slate-300 overflow-hidden text-ellipsis whitespace-nowrap">
                          Finance KPI Mobile app launch preparion meeting.
                        </div>
                      </div>
                      <div class="flex-1 ltr:text-right rtl:text-left">
                        <div class="text-sm font-light text-slate-400 dark:text-slate-400">
                          1 hours
                        </div>
                      </div>
                    </li>


                    <li
                      class="flex items-center space-x-3 rtl:space-x-reverse border-b border-slate-100 dark:border-slate-700 last:border-b-0 pb-3 last:pb-0">
                      <div>
                        <div class="w-8 h-8 rounded-[100%]">
                          <img src=assets/images/users/user-3.jpg alt=""
                            class="w-full h-full rounded-[100%] object-cover">
                        </div>
                      </div>
                      <div class="text-start overflow-hidden text-ellipsis whitespace-nowrap max-w-[63%]">
                        <div
                          class="text-sm text-slate-600 dark:text-slate-300 overflow-hidden text-ellipsis whitespace-nowrap">
                          Finance KPI Mobile app launch preparion meeting.
                        </div>
                      </div>
                      <div class="flex-1 ltr:text-right rtl:text-left">
                        <div class="text-sm font-light text-slate-400 dark:text-slate-400">
                          1 hours
                        </div>
                      </div>
                    </li>


                    <li
                      class="flex items-center space-x-3 rtl:space-x-reverse border-b border-slate-100 dark:border-slate-700 last:border-b-0 pb-3 last:pb-0">
                      <div>
                        <div class="w-8 h-8 rounded-[100%]">
                          <img src=assets/images/users/user-4.jpg alt=""
                            class="w-full h-full rounded-[100%] object-cover">
                        </div>
                      </div>
                      <div class="text-start overflow-hidden text-ellipsis whitespace-nowrap max-w-[63%]">
                        <div
                          class="text-sm text-slate-600 dark:text-slate-300 overflow-hidden text-ellipsis whitespace-nowrap">
                          Finance KPI Mobile app launch preparion meeting.
                        </div>
                      </div>
                      <div class="flex-1 ltr:text-right rtl:text-left">
                        <div class="text-sm font-light text-slate-400 dark:text-slate-400">
                          1 hours
                        </div>
                      </div>
                    </li>


                    <li
                      class="flex items-center space-x-3 rtl:space-x-reverse border-b border-slate-100 dark:border-slate-700 last:border-b-0 pb-3 last:pb-0">
                      <div>
                        <div class="w-8 h-8 rounded-[100%]">
                          <img src=assets/images/users/user-5.jpg alt=""
                            class="w-full h-full rounded-[100%] object-cover">
                        </div>
                      </div>
                      <div class="text-start overflow-hidden text-ellipsis whitespace-nowrap max-w-[63%]">
                        <div
                          class="text-sm text-slate-600 dark:text-slate-300 overflow-hidden text-ellipsis whitespace-nowrap">
                          Finance KPI Mobile app launch preparion meeting.
                        </div>
                      </div>
                      <div class="flex-1 ltr:text-right rtl:text-left">
                        <div class="text-sm font-light text-slate-400 dark:text-slate-400">
                          1 hours
                        </div>
                      </div>
                    </li>


                    <li
                      class="flex items-center space-x-3 rtl:space-x-reverse border-b border-slate-100 dark:border-slate-700 last:border-b-0 pb-3 last:pb-0">
                      <div>
                        <div class="w-8 h-8 rounded-[100%]">
                          <img src=assets/images/users/user-6.jpg alt=""
                            class="w-full h-full rounded-[100%] object-cover">
                        </div>
                      </div>
                      <div class="text-start overflow-hidden text-ellipsis whitespace-nowrap max-w-[63%]">
                        <div
                          class="text-sm text-slate-600 dark:text-slate-300 overflow-hidden text-ellipsis whitespace-nowrap">
                          Finance KPI Mobile app launch preparion meeting.
                        </div>
                      </div>
                      <div class="flex-1 ltr:text-right rtl:text-left">
                        <div class="text-sm font-light text-slate-400 dark:text-slate-400">
                          1 hours
                        </div>
                      </div>
                    </li>


                    <li
                      class="flex items-center space-x-3 rtl:space-x-reverse border-b border-slate-100 dark:border-slate-700 last:border-b-0 pb-3 last:pb-0">
                      <div>
                        <div class="w-8 h-8 rounded-[100%]">
                          <img src=assets/images/users/user-1.jpg alt=""
                            class="w-full h-full rounded-[100%] object-cover">
                        </div>
                      </div>
                      <div class="text-start overflow-hidden text-ellipsis whitespace-nowrap max-w-[63%]">
                        <div
                          class="text-sm text-slate-600 dark:text-slate-300 overflow-hidden text-ellipsis whitespace-nowrap">
                          Finance KPI Mobile app launch preparion meeting.
                        </div>
                      </div>
                      <div class="flex-1 ltr:text-right rtl:text-left">
                        <div class="text-sm font-light text-slate-400 dark:text-slate-400">
                          1 hours
                        </div>
                      </div>
                    </li>


                    <li
                      class="flex items-center space-x-3 rtl:space-x-reverse border-b border-slate-100 dark:border-slate-700 last:border-b-0 pb-3 last:pb-0">
                      <div>
                        <div class="w-8 h-8 rounded-[100%]">
                          <img src=assets/images/users/user-2.jpg alt=""
                            class="w-full h-full rounded-[100%] object-cover">
                        </div>
                      </div>
                      <div class="text-start overflow-hidden text-ellipsis whitespace-nowrap max-w-[63%]">
                        <div
                          class="text-sm text-slate-600 dark:text-slate-300 overflow-hidden text-ellipsis whitespace-nowrap">
                          Finance KPI Mobile app launch preparion meeting.
                        </div>
                      </div>
                      <div class="flex-1 ltr:text-right rtl:text-left">
                        <div class="text-sm font-light text-slate-400 dark:text-slate-400">
                          1 hours
                        </div>
                      </div>
                    </li>


                    <li
                      class="flex items-center space-x-3 rtl:space-x-reverse border-b border-slate-100 dark:border-slate-700 last:border-b-0 pb-3 last:pb-0">
                      <div>
                        <div class="w-8 h-8 rounded-[100%]">
                          <img src=assets/images/users/user-3.jpg alt=""
                            class="w-full h-full rounded-[100%] object-cover">
                        </div>
                      </div>
                      <div class="text-start overflow-hidden text-ellipsis whitespace-nowrap max-w-[63%]">
                        <div
                          class="text-sm text-slate-600 dark:text-slate-300 overflow-hidden text-ellipsis whitespace-nowrap">
                          Finance KPI Mobile app launch preparion meeting.
                        </div>
                      </div>
                      <div class="flex-1 ltr:text-right rtl:text-left">
                        <div class="text-sm font-light text-slate-400 dark:text-slate-400">
                          1 hours
                        </div>
                      </div>
                    </li>

                  </ul>
                </div>
                <!-- END: Activity Card -->



              </div>
            </div>
          </div>


        </div>

        <div>&nbsp; </div>








        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Customer</h4>
            <div>
              <!-- BEGIN: Card Dropdown -->
              <div class="relative">
                <div class="dropdown relative">
                  <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
      rounded dark:text-slate-400">
  <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
</span>
                  </button>
                  <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
  shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                    <li>
                      <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
          dark:hover:text-white">
                        Last 28 Days</a>
                    </li>
                    <li>
                      <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
          dark:hover:text-white">
                        Last Month</a>
                    </li>
                    <li>
                      <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
          dark:hover:text-white">
                        Last Year</a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- END: Card Droopdown -->
            </div>
          </div>
          <div class="card-body p-6">

            <!-- BEGIN: Customer Card -->


            <div class="pb-2">
              <div class="grid md:grid-cols-3 grid-cols-1 gap-5">

                <div class="relative z-[1] text-center p-4 rounded before:w-full before:h-[calc(100%-60px)] before:absolute before:left-0
      before:top-[60px] before:rounded before:z-[-1] before:bg-opacity-[0.1] before:bg-info-500">
                  <div class="  h-[70px] w-[70px] rounded-full mx-auto mb-4 relative">

                    <img src=assets/images/all-img/cus-1.png alt="" class="w-full h-full rounded-full">
                    <span class="h-[27px] w-[27px] absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col
              items-center justify-center text-white text-xs font-medium">
          2
      </span>
                  </div>
                  <h4 class="text-sm text-slate-600 font-semibold mb-4">
                    Nicole Kidman
                  </h4>
                  <div class="inline-block bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                    70
                  </div>
                  <div>
                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3 mt-4">
                      <span>Progress</span>
                      <span class="font-normal">70%</span>
                    </div>

                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                      <div class="progress-bar bg-info-500 h-full rounded-xl" style="width: 70%"></div>
                    </div>
                  </div>
                </div>

                <div class="relative z-[1] text-center p-4 rounded before:w-full before:h-[calc(100%-60px)] before:absolute before:left-0
      before:top-[60px] before:rounded before:z-[-1] before:bg-opacity-[0.1] before:bg-warning-500">
                  <div class="  ring-2 ring-[#FFC155]  h-[70px] w-[70px] rounded-full mx-auto mb-4 relative">

                    <span class="crown absolute -top-[24px] left-1/2 -translate-x-1/2">
              <img src="assets/images/icon/crown.svg" alt="">
          </span>

                    <img src=assets/images/all-img/cus-2.png alt="" class="w-full h-full rounded-full">
                    <span class="h-[27px] w-[27px] absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col
              items-center justify-center text-white text-xs font-medium">
          1
      </span>
                  </div>
                  <h4 class="text-sm text-slate-600 font-semibold mb-4">
                    Monica Bellucci
                  </h4>
                  <div class="inline-block bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                    80
                  </div>
                  <div>
                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3 mt-4">
                      <span>Progress</span>
                      <span class="font-normal">80%</span>
                    </div>

                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                      <div class="progress-bar bg-warning-500 h-full rounded-xl" style="width: 80%"></div>
                    </div>
                  </div>
                </div>

                <div class="relative z-[1] text-center p-4 rounded before:w-full before:h-[calc(100%-60px)] before:absolute before:left-0
      before:top-[60px] before:rounded before:z-[-1] before:bg-opacity-[0.1] before:bg-success-500">
                  <div class="  h-[70px] w-[70px] rounded-full mx-auto mb-4 relative">

                    <img src=assets/images/all-img/cus-3.png alt="" class="w-full h-full rounded-full">
                    <span class="h-[27px] w-[27px] absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col
              items-center justify-center text-white text-xs font-medium">
          3
      </span>
                  </div>
                  <h4 class="text-sm text-slate-600 font-semibold mb-4">
                    Pamela Anderson
                  </h4>
                  <div class="inline-block bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                    65
                  </div>
                  <div>
                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3 mt-4">
                      <span>Progress</span>
                      <span class="font-normal">65%</span>
                    </div>

                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                      <div class="progress-bar bg-success-500 h-full rounded-xl" style="width: 65%"></div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="grid grid-cols-1 gap-5 mt-5">

                <div class="relative z-[1] p-4 rounded md:flex items-center bg-gray-5003 dark:bg-slate-900 md:space-x-10 md:space-y-0
      space-y-3 rtl:space-x-reverse">
                  <div class="  h-10 w-10 rounded-full relative">

                    <img src=assets/images/users/user-1.jpg alt="" class="w-full h-full rounded-full">
                    <span class="h-4 w-4 absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col items-center
              justify-center text-white text-[10px] font-medium">
          4
      </span>
                  </div>
                  <h4 class="text-sm text-slate-600 font-semibold">
                    Dianne Russell
                  </h4>
                  <div class="inline-block text-center bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                    60
                  </div>
                  <div class="flex-1">
                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3">
                      <span>Progress</span>
                      <span class="font-normal">60%</span>
                    </div>
                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                      <div class="progress-bar bg-info-500 h-full rounded-xl" style="width: 60%"></div>
                    </div>
                  </div>
                </div>

                <div class="relative z-[1] p-4 rounded md:flex items-center bg-gray-5003 dark:bg-slate-900 md:space-x-10 md:space-y-0
      space-y-3 rtl:space-x-reverse">
                  <div class="  h-10 w-10 rounded-full relative">

                    <img src=assets/images/users/user-2.jpg alt="" class="w-full h-full rounded-full">
                    <span class="h-4 w-4 absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col items-center
              justify-center text-white text-[10px] font-medium">
          5
      </span>
                  </div>
                  <h4 class="text-sm text-slate-600 font-semibold">
                    Robert De Niro
                  </h4>
                  <div class="inline-block text-center bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                    50
                  </div>
                  <div class="flex-1">
                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3">
                      <span>Progress</span>
                      <span class="font-normal">50%</span>
                    </div>
                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                      <div class="progress-bar bg-warning-500 h-full rounded-xl" style="width: 50%"></div>
                    </div>
                  </div>
                </div>

                <div class="relative z-[1] p-4 rounded md:flex items-center bg-gray-5003 dark:bg-slate-900 md:space-x-10 md:space-y-0
      space-y-3 rtl:space-x-reverse">
                  <div class="  h-10 w-10 rounded-full relative">

                    <img src=assets/images/users/user-3.jpg alt="" class="w-full h-full rounded-full">
                    <span class="h-4 w-4 absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col items-center
              justify-center text-white text-[10px] font-medium">
          6
      </span>
                  </div>
                  <h4 class="text-sm text-slate-600 font-semibold">
                    De Niro
                  </h4>
                  <div class="inline-block text-center bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                    60
                  </div>
                  <div class="flex-1">
                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3">
                      <span>Progress</span>
                      <span class="font-normal">60%</span>
                    </div>
                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                      <div class="progress-bar bg-warning-500 h-full rounded-xl" style="width: 60%"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- END: Customer Card -->
          </div>
        </div>








      </div>
    </div>
@endsection
