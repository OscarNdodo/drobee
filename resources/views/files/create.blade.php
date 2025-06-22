@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Enviar Arquivo</h2>
    
    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="space-y-2">
            <label for="file" class="block text-sm font-medium text-gray-700">Selecione um arquivo (até 10MB)</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                            <span>Carregue um arquivo</span>
                            <input id="file" name="file" type="file" class="sr-only">
                        </label>
                        <p class="pl-1">ou arraste e solte</p>
                    </div>
                    <p class="text-xs text-gray-500">Tamanho máximo: 10MB</p>
                </div>
            </div>
            @error('file')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="space-y-4">
            <h3 class="text-sm font-medium text-gray-700">Opções de Expiração</h3>
            
            <div class="space-y-2">
                <div class="flex items-center">
                    <input id="expiration-none" name="expiration_type" type="radio" value="none" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" checked>
                    <label for="expiration-none" class="ml-3 block text-sm font-medium text-gray-700">Não expirar</label>
                </div>
                
                <div class="flex items-center">
                    <input id="expiration-download" name="expiration_type" type="radio" value="download" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                    <label for="expiration-download" class="ml-3 block text-sm font-medium text-gray-700">Auto-destruir após o download</label>
                </div>
                
                <div class="flex items-center">
                    <input id="expiration-time" name="expiration_type" type="radio" value="time" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                    <label for="expiration-time" class="ml-3 block text-sm font-medium text-gray-700">Expirar após</label>
                    <input type="number" id="expires_in_hours" name="expires_in_hours" min="1" value="1" class="ml-2 block w-16 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    <span class="ml-2 text-sm text-gray-700">horas</span>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Enviar Arquivo
            </button>
        </div>
    </form>
</div>
@endsection