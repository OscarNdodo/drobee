<!DOCTYPE html>
<html lang="pt" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drobee - Partilha Segura de Ficheiros</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
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

        .glow-green {
            box-shadow: 0 0 20px rgba(22, 249, 116, 0.4);
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
                opacity: 0.5;
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
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

        .timeline-line {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: drawLine 3s ease-in-out infinite;
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

        /* Crate view */

        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        }

        .glow-effect {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        .glow-orange {
            background-color: rgba(22, 249, 116, 0.1);
            
        }

        .upload-zone {
            transition: all 0.3s ease;
        }

        .upload-zone:hover {
            border-color: #3b82f6;
            background-color: rgba(59, 130, 246, 0.05);
        }

        .upload-zone.dragover {
            border-color: #16f98f;
            background-color: rgba(22, 249, 116, 0.1);
            transform: scale(1.02);
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

        .radio-custom {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #64748b;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .radio-custom:checked {
            border-color: #3b82f6;
            background: linear-gradient(135deg, #3b82f6, #16f98f);
        }

        .radio-custom:checked::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .progress-bar {
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #16f98f);
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .file-preview {
            display: none;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid #3b82f6;
            border-radius: 12px;
            padding: 16px;
            margin-top: 16px;
        }

        .tab-button {
            transition: all 0.3s ease;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            cursor: pointer;
        }

        .tab-button.active {
            background: linear-gradient(135deg, #3b82f6, #16f96d);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }

        .tab-button:not(.active) {
            background: rgba(71, 85, 105, 0.3);
            color: #94a3b8;
            border: 1px solid #475569;
        }

        .tab-button:not(.active):hover {
            background: rgba(71, 85, 105, 0.5);
            color: #e2e8f0;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .text-content-preview {
            background: rgba(59, 130, 246, 0.05);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 16px;
            margin-top: 12px;
            max-height: 200px;
            overflow-y: auto;
        }

        /* Show Download */
      
        
    </style>
</head>

<body class="bg-slate-900 text-white overflow-x-hidden">
    <!-- Background SVG Animation -->
    <div class="fixed inset-0 z-0 opacity-30">
        <svg class="w-full h-full" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="timelineGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                    <stop offset="50%" style="stop-color:#16f99a;stop-opacity:1" />
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
            <a href="{{ route('index') }}" class="flex items-end space-x-1">
                <div class="w-3 h-3 bg-gradient-to-r from-blue-500 to-green-500 rounded-full mb-2"></div>
                <span class="text-xl font-bold">Drobee</span>
            </a>
            @if (url()->current() == route('index'))
                <div class="hidden md:flex space-x-8">
                    <a href="#features" class="hover:text-blue-400 transition-colors">Recursos</a>
                    <a href="#how-it-works" class="hover:text-blue-400 transition-colors">Como Funciona</a>
                    <a href="#security" class="hover:text-blue-400 transition-colors">Segurança</a>
                </div>
                <a href="{{ route('home') }}"
                    class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-6 py-2 rounded-lg font-semibold transition-all duration-300 glow-effect">
                    Começar Agora
                </a>
            @else
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-slate-400">Upload Seguro</span>
                    <div class="w-2 h-2 bg-green-400 rounded-full pulse-animation"></div>
                </div>
            @endif
        </nav>
    </header>

    {{-- Main content --}}
    @yield('main')

    <!-- Footer -->
    <footer class="relative z-10 px-6 py-12 bg-black/70 opacity-80 backdrop-blur-md border-b border-slate-800">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <a href="{{ route('index') }}" class="flex items-end space-x-1">
                        <div class="w-3 h-3 bg-gradient-to-r from-blue-500 to-green-500 rounded-full mb-2"></div>
                        <span class="text-xl font-bold">Drobee</span>
                    </a>
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

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to header
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.classList.add('bg-slate-900/95');
            } else {
                header.classList.remove('bg-slate-900/95');
            }
        });

        // Add hover effects to buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });


        // Add hover effects to links
        document.querySelectorAll('a').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(-2px)';
            });

            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    </script>
</body>

</html>
