@extends('index')

@section('main')
      <!-- Hero Section -->
      <section class="relative z-10 px-6 py-20 max-h-dvh bg-gradient-to-tr from-black to-gray-900 opacity-90">
        <div class="container mx-auto text-center">
            <div class="slide-in">
                <h1
                    class="text-5xl md:text-7xl font-black mb-6 bg-gradient-to-r from-blue-400 via-green-400 py-6 uppercase to-blue-400 bg-clip-text text-transparent">
                    Partilha Segura
                    <br>
                    <span class="text-white">Sem Complicações</span>
                </h1>
                <p class="text-sm md:text-xl text-slate-300 mb-8 max-w-2xl text-opacity-70 mx-auto leading-relaxed">
                    Envie ficheiros e links de forma segura com expiração automática.
                    Sem cadastro, sem complicações, máxima segurança.
                </p>
                <div class="flex flex-col md:flex-row gap-4 justify-center items-center mb-12">
                    <a href="{{ route('home') }}"
                        class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 px-8 py-4 rounded-xl text-lg font-bold transition-all duration-300 glow-green transform hover:scale-105">
                        Partilhar Agora - Grátis
                    </a>
                    <a href="#how-it-works"
                        class="border-2 border-blue-500 text-blue-400 hover:bg-blue-500 hover:text-white px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300">
                        Ver Como Funciona
                    </a>
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
                    <div class="text-3xl md:text-4xl font-bold text-green-400 mb-2">2M+</div>
                    <div class="text-slate-400">Ficheiros Partilhados</div>
                </div>
                <div class="float-animation" style="animation-delay: 0.2s">
                    <div class="text-3xl md:text-4xl font-bold text-blue-400 mb-2">89.2%</div>
                    <div class="text-slate-400">Uptime</div>
                </div>
                <div class="float-animation" style="animation-delay: 0.4s">
                    <div class="text-3xl md:text-4xl font-bold text-green-400 mb-2">50K+</div>
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
                    <span class="bg-gradient-to-r from-blue-400 to-green-400 bg-clip-text text-transparent">
                        Recursos Poderosos
                    </span>
                </h2>
                <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                    Tudo que precisa para partilhar ficheiros com máxima segurança e praticidade
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 hover:border-blue-500 transition-all duration-300 hover:transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Expiração Automática</h3>
                    <p class="text-slate-300 mb-6">Define quando os ficheiros devem ser eliminados automaticamente.
                        1 hora, 1 dia, 1 semana - você escolhe!</p>
                    <a href="{{ route('home') }}" class="text-blue-400 hover:text-blue-300 font-semibold">
                        Experimentar Agora →
                    </a>
                </div>

                <div
                    class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 hover:border-green-500 transition-all duration-300 hover:transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Criptografia Total</h3>
                    <p class="text-slate-300 mb-6">Todos os ficheiros são criptografados de ponta a ponta. Nem nós
                        conseguimos ver o que partilha!</p>
                    <a href="{{ route('home') }}" class="text-green-400 hover:text-green-300 font-semibold">
                        Saber Mais →
                    </a>
                </div>

                <div
                    class="bg-slate-800/50 p-8 rounded-2xl border border-slate-700 hover:border-blue-500 transition-all duration-300 hover:transform hover:scale-105">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-500 to-green-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Sem Cadastro</h3>
                    <p class="text-slate-300 mb-6">Use imediatamente sem criar contas ou fornecer dados pessoais.
                        Privacidade total garantida!</p>
                    <a href="{{ route('home') }}" class="text-blue-400 hover:text-blue-300 font-semibold">
                        Começar →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="relative z-10 px-6 py-20 bg-gradient-to-b from-black to-black/20">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Como <span
                        class="bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text text-transparent">Funciona</span>
                </h2>
                <p class="text-xl text-slate-300">3 passos simples para partilha segura</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div
                        class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 pulse-animation">
                        <span class="text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Arraste & Solte</h3>
                    <p class="text-slate-300">Arraste os ficheiros para a área de upload ou clique para selecionar
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6 pulse-animation"
                        style="animation-delay: 0.5s">
                        <span class="text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Configure</h3>
                    <p class="text-slate-300">Escolha quando o ficheiro deve expirar e defina uma palavra-passe
                        opcional</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-green-500 rounded-full flex items-center justify-center mx-auto mb-6 pulse-animation"
                        style="animation-delay: 1s">
                        <span class="text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Partilhe</h3>
                    <p class="text-slate-300">Copie o link seguro e partilhe com quem quiser. Simples assim!</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('home') }}"
                    class="bg-gradient-to-r to-green-500 from-blue-500 hover:from-green-600 hover:to-blue-600 px-10 py-4 rounded-xl text-xl font-bold transition-all duration-300 glow-green transform hover:scale-105">
                    Experimentar Gratuitamente
                </a>
            </div>
        </div>
    </section>

    <!-- Security Section -->
    <section id="security" class="relative z-10 px-6 py-20 bg-black/20">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        <span class="bg-gradient-to-r from-blue-400 to-green-400 bg-clip-text text-transparent">
                            Segurança Máxima
                        </span>
                    </h2>
                    <p class="text-xl text-slate-300 mb-8">
                        Sua privacidade é nossa prioridade. Usamos as melhores práticas de segurança da indústria.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Criptografia AES-256</h4>
                                <p class="text-slate-400">Padrão militar de criptografia para proteger seus dados
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Zero-Knowledge</h4>
                                <p class="text-slate-400">Nem nós conseguimos ver o conteúdo dos seus ficheiros</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2">Auto-Destruição</h4>
                                <p class="text-slate-400">Ficheiros eliminados permanentemente após expiração</p>
                            </div>
                        </div>
                    </div>

                   
                </div>

                <div class="relative">
                    <div
                        class="w-full h-96 bg-gradient-to-br from-slate-800 to-slate-900 rounded-3xl border border-slate-700 flex items-center justify-center">
                        <div class="text-center">
                            <div
                                class="w-24 h-24 bg-gradient-to-r from-blue-500 to-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z" />
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
    <section class="relative z-10 px-6 py-20 bg-gradient-to-r from-blue-600 to-green-500">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl md:text-6xl font-black mb-6">
                Pronto para Começar?
            </h2>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Junte-se a milhares de utilizadores que confiam no Drobee
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <a href="{{ route('home') }}"
                    class="bg-white text-blue-600 hover:bg-slate-100 px-10 py-4 rounded-xl text-xl font-bold transition-all duration-300 transform hover:scale-105">
                    Começar Gratuitamente
                </a>
                <a href="https://linktr.ee/devndodo" target="_blank"
                    class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-10 py-4 rounded-xl text-xl font-semibold transition-all duration-300">
                    Contactar Suporte
                </a>
            </div>
        </div>
    </section>

@endsection