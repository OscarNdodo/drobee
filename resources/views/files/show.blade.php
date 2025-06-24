<!DOCTYPE html>
<html lang="pt" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drobee - Enviar Arquivo</title>
    @vite('resources/css/app.css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        }
        
        .glow-effect {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }
        
        .glow-orange {
            box-shadow: 0 0 20px rgba(249, 115, 22, 0.4);
        }
        
        
        .slide-in {
            animation: slideIn 0.8s ease-out;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .timeline-line {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: drawLine 4s ease-in-out infinite;
        }
        
        @keyframes drawLine {
            0% { stroke-dashoffset: 1000; }
            50% { stroke-dashoffset: 0; }
            100% { stroke-dashoffset: -1000; }
        }
        
        
    </style>
</head>
<body class="max-h-dvh bg-gradient-to-tr from-black to-gray-900 opacity-90 text-white min-h-screen">
    <!-- Background SVG Animation -->
    <div class="fixed inset-0 z-0 opacity-5">
        <svg class="w-full h-full" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="timelineGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                    <stop offset="50%" style="stop-color:#f97316;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                </linearGradient>
            </defs>
            <g stroke="url(#timelineGradient)" stroke-width="2" fill="none">
                <path class="timeline-line" d="M0,100 Q250,50 500,100 T1000,100"/>
                <path class="timeline-line" d="M0,300 Q250,250 500,300 T1000,300" style="animation-delay: 0.5s"/>
                <path class="timeline-line" d="M0,500 Q250,450 500,500 T1000,500" style="animation-delay: 1s"/>
                <path class="timeline-line" d="M0,700 Q250,650 500,700 T1000,700" style="animation-delay: 1.5s"/>
                <path class="timeline-line" d="M0,900 Q250,850 500,900 T1000,900" style="animation-delay: 2s"/>
            </g>
        </svg>
    </div>

    <!-- Header -->
    <header class="relative z-10 px-6 py-5 bg-black/70 opacity-80 backdrop-blur-md border-b border-slate-800">
        <nav class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-orange-500 rounded-lg flex items-center justify-center">
                   
                </div>
                <span class="text-xl font-bold">Drobee</span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-slate-400">Upload Seguro</span>
                <div class="w-2 h-2 bg-green-400 rounded-full pulse-animation"></div>
            </div>
        </nav>
    </header>


<div class="bg-slate-800/50 backdrop-blur-md rounded-3xl border border-slate-700 p-8 md:p-12 max-w-2xl mx-auto mt-8">
    <div class="text-center mb-8">
        <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-white">
            <span class="bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent">
                Arquivo Pronto para Compartilhamento!
            </span>
        </h2>
        <p class="text-slate-300 mt-2">{{ $file->original_name }} ({{ formatFileSize($file->size) }})</p>
    </div>
    
    <div class="space-y-6">
        <div>
            <label for="share-link" class="block text-sm font-medium text-slate-300 mb-2">Link de compartilhamento</label>
            <div class="flex rounded-xl overflow-hidden shadow-lg glow-effect">
                <input id="share-link" type="text" readonly value="{{ route('files.download', $file->token) }}" 
                       class="flex-1 min-w-0 block w-full px-4 py-3 bg-slate-700 border border-slate-600 text-white focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                <button onclick="copyToClipboard()" 
                        class="inline-flex items-center px-4 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium hover:from-blue-700 hover:to-blue-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Copiar
                </button>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-blue-500/10 to-emerald-500/10 p-5 rounded-2xl border border-blue-500/20">
            <h3 class="text-sm font-medium text-blue-400 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                Informações do Link
            </h3>
            <div class="mt-2 text-sm text-slate-300">
                @if($file->expiration_type === 'none')
                    <p>Este link não expirará.</p>
                @elseif($file->expiration_type === 'download')
                    <p>O arquivo será excluído após o primeiro download.</p>
                @else
                    <p>O link expirará daqui <span class="font-semibold text-emerald-400">{{ $file->expires_at_formated }}</span>.</p>
                @endif
            </div>
        </div>
        
        <div class="pt-6 flex justify-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-bold rounded-xl shadow-sm text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:scale-105">
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
    navigator.clipboard.writeText(copyText.value);
    
    const button = document.querySelector("#share-link + button");
    const originalText = button.textContent;
    button.innerHTML = `
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        Copiado!
    `;
    
    setTimeout(() => {
        button.textContent = originalText;
    }, 2000);
}
</script>


</body>
</html>