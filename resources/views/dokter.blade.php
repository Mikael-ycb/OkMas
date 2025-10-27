<x-layout>
    <section class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Tim Dokter Kami</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Kartu Dokter -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ asset('img/dokter1.jpg') }}" alt="Dokter" class="w-full h-80 object-cover">
                    <div class="bg-blue-100 py-6 text-center">
                        <h3 class="text-gray-800 font-medium text-lg">Doctor’s Name</h3>
                        <p class="text-blue-900 font-extrabold tracking-widest">NEUROLOGY</p>

                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Kartu Dokter 2 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ asset('img/dokter2.jpg') }}" alt="Dokter" class="w-full h-80 object-cover">
                    <div class="bg-blue-100 py-6 text-center">
                        <h3 class="text-gray-800 font-medium text-lg">Doctor’s Name</h3>
                        <p class="text-blue-900 font-extrabold tracking-widest">CARDIOLOGY</p>

                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Kartu Dokter 3 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="{{ asset('img/dokter3.jpg') }}" alt="Dokter" class="w-full h-80 object-cover">
                    <div class="bg-blue-100 py-6 text-center">
                        <h3 class="text-gray-800 font-medium text-lg">Doctor’s Name</h3>
                        <p class="text-blue-900 font-extrabold tracking-widest">DERMATOLOGY</p>

                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="#" class="text-blue-900 hover:text-blue-600">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-layout>