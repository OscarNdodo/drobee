<!DOCTYPE html>
<html lang="pt" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drobee - Baixar Arquivo</title>
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
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .timeline-line {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: drawLine 4s ease-in-out infinite;
        }

        @keyframes drawLine {
            0% {
                stroke-dashoffset: 1000;
            }

            50% {
                stroke-dashoffset: 0;
            }

            100% {
                stroke-dashoffset: -1000;
            }
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
                <path class="timeline-line" d="M0,100 Q250,50 500,100 T1000,100" />
                <path class="timeline-line" d="M0,300 Q250,250 500,300 T1000,300" style="animation-delay: 0.5s" />
                <path class="timeline-line" d="M0,500 Q250,450 500,500 T1000,500" style="animation-delay: 1s" />
                <path class="timeline-line" d="M0,700 Q250,650 500,700 T1000,700" style="animation-delay: 1.5s" />
                <path class="timeline-line" d="M0,900 Q250,850 500,900 T1000,900" style="animation-delay: 2s" />
            </g>
        </svg>
    </div>

    <!-- Header -->
    <header class="relative z-10 px-6 py-5 bg-black/70 opacity-80 backdrop-blur-md border-b border-slate-800">
        <nav class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div
                    class="w-8 h-8 bg-gradient-to-r from-blue-500 to-orange-500 rounded-lg flex items-center justify-center">

                </div>
                <span class="text-xl font-bold">Drobee</span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-slate-400">Upload Seguro</span>
                <div class="w-2 h-2 bg-green-400 rounded-full pulse-animation"></div>
            </div>
        </nav>
    </header>


    <div
        class="bg-slate-800/50 backdrop-blur-md rounded-3xl border border-slate-700 p-8 md:p-12 max-w-2xl mx-auto text-center my-14">
        @if (isset($error))
            <div class="mb-8">
                <div
                    class="w-20 h-20 bg-gradient-to-r from-red-500 to-rose-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white">
                    <span class="bg-gradient-to-r from-red-400 to-rose-400 bg-clip-text text-transparent">
                        Link Inválido
                    </span>
                </h2>
                <p class="text-slate-300 mt-3">{{ $error }}</p>
            </div>

            <div class="pt-6">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-lg font-bold rounded-xl shadow-sm text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:scale-105">
                    Voltar
                </a>
            </div>
        @else
            <div class="mb-8">
                <div
                    class="w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-white">
                    <span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">
                        Download do Arquivo
                    </span>
                </h2>
                <p class="text-slate-300 mt-2" id="info">Preparando seu download...</p>

                <!-- Loading animation -->
                <div class="mt-6 flex justify-center">
                    <div id="loading" class="w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin">
                    </div>
                    
                    <a href="#" id="downloadMdBtn"
                    class="hidden max-w-40 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md items-center transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                    Download
                </a>
            </div>
            </div>

            <script>
                window.onload = function() {
                    setTimeout(function() {
                        document.getElementById("loading").style.display = "none";
                        document.getElementById("info").innerText = "Seu download está pronto."
                        document.getElementById("downloadMdBtn").href = "{{ route('download', $file) }}";
                        document.getElementById("downloadMdBtn").style.display = "flex";
                    },3000);
                };
            </script>
        @endif
    </div>





    <!-- Footer -->
    <footer class="relative z-10 px-6 py-12 bg-black/70 opacity-80 backdrop-blur-md border-b border-slate-800">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-orange-500 rounded-lg"></div>
                        <span class="text-xl font-bold">Drobee</span>
                    </div>
                    <p class="text-slate-400">
                        A forma mais segura de partilhar ficheiros e links temporários na Internet.
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Produto</h4>
                    <ul class="space-y-2 text-slate-400">
                        <li><a href="#" class="hover:text-white transition-colors">Recursos</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Segurança</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">API</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Empresa</h4>
                    <ul class="space-y-2 text-slate-400">
                        <li><a href="#" class="hover:text-white transition-colors">Sobre</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contacto</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Suporte</h4>
                    <ul class="space-y-2 text-slate-400">
                        <li><a href="#" class="hover:text-white transition-colors">Centro de Ajuda</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Documentação</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 mt-8 pt-8 text-center text-slate-400">
                <p>&copy;2025 | Todos os direitos reservados. Feito com ❤️ por Drobee.</p>
            </div>
        </div>
    </footer>

</body>

</html>
