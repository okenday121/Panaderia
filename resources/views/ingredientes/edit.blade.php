<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Ingrediente') }}
            </h2>            
        </div>       
    </x-slot>
    
    <div class="py-6">        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 20px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li></li>
                    <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div>
                            <span class="font-medium">{{$error}}</span>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="bg-blue-200 py-32 px-10 min-h-screen ">
            <!--   tip; mx-auto -- jagab ilusti keskele  -->
            <div class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto">
          
              <form action="{{route('ingredientes.update', $ingrediente)}}" method="POST">
                @csrf @method('put')
                <!--       flex - asjad korvuti, nb! flex-1 - element kogu ylejaanud laius -->
                <div class="flex items-center mb-5">
                  <!--         tip - here neede inline-block , but why? -->
                  <label for="name" class="inline-block w-20 mr-6 text-right 
                                           font-bold text-gray-600">Detalle</label>
                  <input value="{{old('nombre', $ingrediente->detalle)}}" type="text" name="detalle" 
                         class="flex-1 py-2 border-b-2 border-gray-400 focus:border-blue-400 
                                text-gray-600 placeholder-gray-400
                                outline-none">
                </div>
                           
                <div class="text-right">
                  <button type="submit" class="py-3 px-8 bg-blue-400 text-white font-bold">Actualizar</button> 
                </div>
          
              </form>
            </div>
          </div>
</x-app-layout>
