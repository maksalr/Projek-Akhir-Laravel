<x-app-layout>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/css/app.css')}}">
    </link>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>

    <x-slot name="header">
        <div class="flex justify-center">
            <h2 class="font-bold italic text-7xl text-gray-800 leading-tight">
                {{ __('JOB HUNTER') }}
            </h2>
        </div>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <ul>
                        @php
                        $statusTombol = "";
                        @endphp

                        @foreach($Quest as $Q)
                        <li>
                            <form action="/quest/update/{{$Q->id}}" method="POST">
                                @csrf
                                @php
                                if(auth()->user()->id == $Q->user_id){
                                $statusTombol = "disabled";
                                } else {
                                $statusTombol = "";
                                }
                                @endphp
                                <button type="submit" contenteditable="false" {{ $statusTombol }}>
                                    @if(Auth::id() == $Q->user_id)
                                    <h2 class="text-3xl font-bold">Pengaju: Anda</h2>
                                    @else
                                    <h2 class="text-3xl font-bold">Pengaju: {{ $Q->name }}</h2>
                                    @endif
                                    <h2 class="text-3xl">Quest:</h2>
                                    <h2 class="text-2xl font-semibold">{{ $Q->judul }}</h2>
                                    <p class="text-xl font-base">{{$Q->isi}}</p>
                                </button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <script>
                $(document).ready(function() {
                    all_notes = $("li a");
                    all_notes.on("keyup", function() {
                        note_title = $(this).find("h2").text();
                        note_content = $(this).find("p").text();
                        item_key = "list_" + $(this).parent().index();
                        data = {
                            title: note_title,
                            content: note_content
                        };
                        window.localStorage.setItem(item_key, JSON.stringify(data));
                    });

                });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>