<div>
    <section>
        <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div
                        class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i
                                        class="fas fa-user-check fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total Aptos Ingresados</h2>
                                <p class="font-bold text-3xl">0 <span class="text-green-500"><i
                                            class="fas fa-caret-up"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div
                        class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-pink-600"><i
                                        class="fas fa-user-times fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Total No Aptos</h2>
                                <p class="font-bold text-3xl">0 <span class="text-pink-500"><i
                                            class="fas fa-exchange-alt"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div
                        class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-yellow-600"><i
                                        class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">NUEVOS SIMPATIZANTES</h2>
                                <p class="font-bold text-3xl">{{ $voters }} <span class="text-yellow-600"><i
                                            class="fas fa-caret-up"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div
                        class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-server fa-2x fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Votan en Sincelejo</h2>
                                <p class="font-bold text-3xl">{{ $sincelejo }}</p>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div
                        class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-indigo-600"><i
                                        class="fas fa-tasks fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Votan en Sucre</h2>
                                <p class="font-bold text-3xl">{{ $sucre }}</p>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div
                        class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-red-600"><i class="fas fa-inbox fa-2x fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">NO ESTÁN CENSO</h2>
                                <p class="font-bold text-3xl">{{ $noestan }} <span class="text-red-500"><i
                                            class="fas fa-caret-up"></i></span></p>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>


            {{-- <div class="flex flex-row flex-wrap flex-grow mt-2">

                <div class="w-full md:w-1/2 xl:w-1/2 p-6">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div
                            class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h class="font-bold uppercase text-gray-600">LLAMADAS REALIZADAS</h>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 xl:w-1/2 p-6">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div
                            class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h2 class="font-bold uppercase text-gray-600">INGRESO POR DÍA</h2>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div
                            class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h2 class="font-bold uppercase text-gray-600">Graph</h2>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div
                            class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined"
                                height="undefined"></canvas>

                        </div>
                    </div>
                    <!--/Graph Card-->
                </div> --}}



            {{-- <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <!--Advert Card-->
                <div class="bg-white border-transparent rounded-lg shadow-xl">
                    <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                        <h2 class="font-bold uppercase text-gray-600">Advert</h2>
                    </div>
                    <div class="p-5 text-center">


                        <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CK7D52JJ&placement=wwwtailwindtoolboxcom" id="_carbonads_js"></script>


                    </div>
                </div>
                <!--/Advert Card-->
            </div> --}}
            {{-- </div> --}}
        </div>
    </section>
</div>
