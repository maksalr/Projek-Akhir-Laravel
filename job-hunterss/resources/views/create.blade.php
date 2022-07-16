<x-app-layout>
    @if ($errors->any())
    <?php
    $message = 'Pesan error: \n';

    foreach ($errors->all() as $error) {
        $i = 1;
        $message = $message . '\t' . $i . '. ' . $error . '\n';
        $i++;
    }

    echo "<script>alert('$message')</script>";
    ?>
    @endif

    <link rel="stylesheet" type="text/css" href="{{asset('storage/css/app.css')}}">

    </link>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <style>

    </style>

    <x-slot name="header">
        <div class="flex justify-center">
            <h2 class="font-bold italic text-7xl text-gray-800 leading-tight">
                {{ __('JOB HUNTER') }}
            </h2>
        </div>

    </x-slot>
    <div class="py-12">

        <div class="flex justify-center">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="{{ route('quest.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="belum diambil" id="status">
                    <div class="mb-6 px-60">
                        <label for="judul"
                            class="block mb-2 text-sm font-medium text-black dark:text-black font-bold italic">QUEST</label>
                        <input type="text" id="judul" name="judul"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required="">
                    </div>
                    <div class="mb-6 px-60">
                        <label for="judul"
                            class="block mb-2 text-sm font-medium text-black font-bold italic dark:text-black">DESKRIPSI
                        </label>
                        <input type="text" id="deskripsi" name="deskripsi"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required="">
                    </div>
                    <div class="mb-6 px-96 flex justify-center">
                        <input type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 font-bold italic"
                            value="Ajukan">
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>