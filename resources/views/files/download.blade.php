@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden p-6 text-center">
    @if(isset($error))
        <div class="mb-6">
            <svg class="mx-auto h-12 w-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <h2 class="text-xl font-semibold text-gray-800 mt-2">Link Inválido</h2>
            <p class="text-gray-600 mt-2">{{ $error }}</p>
        </div>
        
        <div class="mt-6">
            <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Voltar
            </a>
        </div>
    @else
        <div class="mb-6">
            <svg class="mx-auto h-12 w-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            <h2 class="text-xl font-semibold text-gray-800 mt-2">Download do Arquivo</h2>
            <p class="text-gray-600 mt-1">Preparando seu download...</p>
        </div>
        
        <script>
            window.onload = function() {
                setTimeout(function() {
                    window.location.href = "{{ route('files.download', $file->token) }}";
                }, 1500);
            };
        </script>
    @endif
</div>
@endsection