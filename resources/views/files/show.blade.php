@extends('layouts.app')

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden p-6">
    <div class="text-center mb-6">
        <svg class="mx-auto h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <h2 class="text-xl font-semibold text-gray-800 mt-2">Arquivo Pronto para Compartilhamento!</h2>
        <p class="text-gray-600 mt-1">{{ $file->original_name }} ({{ formatFileSize($file->size) }})</p>
    </div>
    
    <div class="space-y-4">
        <div>
            <label for="share-link" class="block text-sm font-medium text-gray-700">Link de compartilhamento</label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <input id="share-link" type="text" readonly value="{{ route('files.download', $file->token) }}" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <button onclick="copyToClipboard()" class="inline-flex items-center px-3 py-2 border border-l-0 border-gray-300 rounded-r-md bg-gray-50 text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                    Copiar
                </button>
            </div>
        </div>
        
        <div class="bg-blue-50 p-4 rounded-md">
            <h3 class="text-sm font-medium text-blue-800">Informações do Link</h3>
            <div class="mt-2 text-sm text-blue-700">
                @if($file->expiration_type === 'none')
                    <p>Este link não expirará.</p>
                @elseif($file->expiration_type === 'download')
                    <p>O arquivo será excluído após o primeiro download.</p>
                @else
                    <p>O link expirará em {{ $file->expires_at->format('d/m/Y H:i') }}.</p>
                @endif
            </div>
        </div>
        
        <div class="flex justify-center mt-6">
            <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Compartilhar outro arquivo
            </a>
        </div>
    </div>
</div>

<script>
function copyToClipboard() {
    const copyText = document.getElementById("share-link");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    
    const button = document.querySelector("#share-link + button");
    button.textContent = "Copiado!";
    setTimeout(() => {
        button.textContent = "Copiar";
    }, 2000);
}
</script>
@endsection