<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Ingrediente Detalle') }}
            </h2>            
        </div>       
    </x-slot>
    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- component -->
                <div class="h-screen">
                    <div class="w-80 mt-24 m-auto lg:mt-16 max-w-sm">
                    <div class="bg-white shadow-2xl rounded-b-3xl">
                        <h2 class="text-center text-gray-800 text-2xl font-bold pt-4">Nombre: {{$ingrediente->nombre}}</h2>                        
                        <div class="grid grid-cols-4 w-72 lg:w-5/6 m-auto bg-blue-50 mt-2 p-4 lg:p-4 rounded-2xl">
                        <div class="col-span-2 pt-1">
                            <p class="text-gray-800 font-bold lg:text-sm">Nombre: </p><p class="text-gray-800 font-regular lg:text-sm">{{$ingrediente->detalle}}</p>    
                        </div>
                    </div>                                                
                    <div class="text-center">
                        <a class="p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-md rounded-md focus:border-4 border-blue-300" href="{{route('ingredientes.index')}}">Volver</a>                    
                    </div>
                    </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</x-app-layout>
