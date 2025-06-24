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
        
        .glow-orange {
            box-shadow: 0 0 20px rgba(249, 115, 22, 0.4);
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .slide-in {
            animation: slideIn 0.8s ease-out;
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .timeline-line {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: drawLine 3s ease-in-out infinite;
        }
        
        @keyframes drawLine {
            0% { stroke-dashoffset: 1000; }
            50% { stroke-dashoffset: 0; }
            100% { stroke-dashoffset: -1000; }
        }
    </style>
</head>
<body class="bg-slate-900 text-white overflow-x-hidden">
    <!-- Background SVG Animation -->
    <div class="fixed inset-0 z-0 opacity-30">
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
                    <fa class="solid fa-shield "></fa>
                </div>
                <span class="text-xl font-bold">Drobee</span>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="#features" class="hover:text-blue-400 transition-colors">Recursos</a>
                <a href="#how-it-works" class="hover:text-blue-400 transition-colors">Como Funciona</a>
                <a href="#security" class="hover:text-blue-400 transition-colors">Segurança</a>
            </div>
            <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-6 py-2 rounded-lg font-semibold transition-all duration-300 glow-effect">
                Começar Agora
            </a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="relative z-10 px-6 py-20 max-h-dvh bg-gradient-to-tr from-black to-gray-900 opacity-90">
        <div class="container mx-auto text-center">
            <div class="slide-in">
                <h1 class="text-5xl md:text-7xl font-black mb-6 bg-gradient-to-r from-blue-400 via-orange-400 py-6 uppercase to-blue-400 bg-clip-text text-transparent">
                    Partilha Segura
                    <br>
                    <span class="text-white">Sem Complicações</span>
                </h1>
                <p class="text-sm md:text-xl text-slate-300 mb-8 max-w-2xl text-opacity-70 mx-auto leading-relaxed">
                    Envie ficheiros e links de forma segura com expiração automática. 
                    Sem cadastro, sem complicações, máxima segurança.
                </p>
                <div class="flex flex-col md:flex-row gap-4 justify-center items-center mb-12">
                    <button class="bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 px-8 py-4 rounded-xl text-lg font-bold transition-all duration-300 glow-orange transform hover:scale-105">
                        Partilhar Agora - Grátis
                    </button>
                    <button class="border-2 border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300">
                        Ver Como Funciona
                    </button>
                </div>
                <div class="flex justify-center items-center space-x-8 text-slate-400">
                    <div class="flex items-center space-x-2">
                        <span class="text-green-400">✓</span>
                        <span>Sem registo</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-green-400">✓</span>
                        <span>100% gratuito</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-green-400">✓</span>
                        <span>Auto-destrutivo</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="relative z-10 px-6 py-36 bg-black/80 border-y-2 border-y-slate-900 shadow-lg ">
        <div class="container mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="float-animation">
                    <div class="text-3xl md:text-4xl font-bold text-orange-400 mb-2">2M+</div>
                    <div class="text-slate-400">Ficheiros Partilhados</div>
                </div>
                <div class="float-animation" style="animation-delay: 0.2s">
                    <div class="text-3xl md:text-4xl font-bold text-blue-400 mb-2">89.2%</div>
                    <div class="text-slate-400">Uptime</div>
                </div>
                <div class="float-animation" style="animation-delay: 0.4s">
                    <div class="text-3xl md:text-4xl font-bold text-orange-400 mb-2">50K+</div>
                    <div class="text-slate-400">Visitantes</div>
                </div>
                <div class="float-animation" style="animation-delay: 0.6s">
                    <div class="text-3xl md:text-4xl font-bold text-blue-400 mb-2">3M+</div>
                    <div class="text-slate-400">Links Partilhados</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="relative z-10 px-6 py-20 bg-gradient-to-b from-black/60 opacity-100 to-black">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent">
                        Recursos Poderosos
                    </span>
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Tudo que precisa para partilhar ficheiros com máxima segurança e praticidade
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 hover:border-blue-500 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Expiração Automática</h3>
                    <p class="text-slate-300 mb-6">Define quando os ficheiros devem ser eliminados automaticamente. 1 hora, 1 dia, 1 semana - você escolhe!</p>
                    <button class="text-blue-400 hover:text-blue-300 font-semibold">
                        Experimentar Agora →
                    </button>
                </div>

                <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 hover:border-orange-500 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Criptografia Total</h3>
                    <p class="text-slate-300 mb-6">Todos os ficheiros são criptografados de ponta a ponta. Nem nós conseguimos ver o que partilha!</p>
                    <button class="text-orange-400 hover:text-orange-300 font-semibold">
                        Saber Mais →
                    </button>
                </div>

                <div class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 hover:border-blue-500 transition-all duration-300 hover:transform hover:scale-105">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-orange-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Sem Cadastro</h3>
                    <p class="text-slate-300 mb-6">Use imediatamente sem criar contas ou fornecer dados pessoais. Privacidade total garantida!</p>
                    <button class="text-blue-400 hover:text-blue-300 font-semibold">
                        Começar →
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="relative z-10 px-6 py-20 bg-gradient-to-b from-black to-black/20">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Como <span class="bg-gradient-to-r from-orange-400 to-blue-400 bg-clip-text text-transparent">Funciona</span>
                </h2>
                <p class="text-xl text-slate-300">3 passos simples para partilha segura</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 pulse-animation">
                        <span class="text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Arraste & Solte</h3>
                    <p class="text-slate-300">Arraste os ficheiros para a área de upload ou clique para selecionar</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-6 pulse-animation" style="animation-delay: 0.5s">
                        <span class="text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Configure</h3>
                    <p class="text-slate-300">Escolha quando o ficheiro deve expirar e defina uma palavra-passe opcional</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 pulse-animation" style="animation-delay: 1s">
                        <span class="text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Partilhe</h3>
                    <p class="text-slate-300">Copie o link seguro e partilhe com quem quiser. Simples assim!</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <button class="bg-gradient-to-r to-orange-500 from-blue-500 hover:from-orange-600 hover:to-blue-600 px-10 py-4 rounded-xl text-xl font-bold transition-all duration-300 glow-orange transform hover:scale-105">
                    Experimentar Gratuitamente
                </button>
            </div>
        </div>
    </section>

    <!-- Security Section -->
    <section id="security" class="relative z-10 px-6 py-20 bg-black/20">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent">
                            Segurança Máxima
                        </span>
                    </h2>
                    <p class="text-xl text-slate-300 mb-8">
                        Sua privacidade é nossa prioridade. Usamos as melhores práticas de segurança da indústria.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Criptografia AES-256</h4>
                                <p class="text-slate-400">Padrão militar de criptografia para proteger seus dados</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Zero-Knowledge</h4>
                                <p class="text-slate-400">Nem nós conseguimos ver o conteúdo dos seus ficheiros</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Auto-Destruição</h4>
                                <p class="text-slate-400">Ficheiros eliminados permanentemente após expiração</p>
                            </div>
                        </div>
                    </div>

                    <button class="mt-8 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300 glow-effect">
                        Partilhar com Segurança
                    </button>
                </div>

                <div class="relative">
                    <div class="w-full h-96 bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl border border-slate-700 flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z"/>
                                </svg>
                            </div>
                            <p class="text-2xl font-bold text-slate-300">Seus dados protegidos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative z-10 px-6 py-20 bg-gradient-to-r from-blue-600 to-orange-500">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl md:text-6xl font-black mb-6">
                Pronto para Começar?
            </h2>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Junte-se a milhares de utilizadores que confiam no Drobee
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <button class="bg-white text-blue-600 hover:bg-slate-100 px-10 py-4 rounded-xl text-xl font-bold transition-all duration-300 transform hover:scale-105">
                    Começar Gratuitamente
                </button>
                <button class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-10 py-4 rounded-xl text-xl font-semibold transition-all duration-300">
                    Contactar Suporte
                </button>
            </div>
        </div>
    </section>

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

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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