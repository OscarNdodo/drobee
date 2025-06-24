@extends('index')

@section('main')
    <main class="relative z-10 p-6 ">
        <div class="container mx-auto max-w-4xl">
            <div class="slide-in">
                <!-- Title Section -->
                <div class="text-center mb-12">
                    <h1 class="text-4xl md:text-5xl font-black mb-4">
                        <span class="bg-gradient-to-r uppercase from-blue-400 to-green-400 bg-clip-text text-transparent">
                            Partilhar Conteúdo
                        </span>
                    </h1>
                    <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                        Partilhe ficheiros, links ou mensagens de forma segura com expiração automática. Sem registo
                        necessário.
                    </p>
                </div>

                <!-- Upload Form -->
                <div class="bg-slate-800/50 backdrop-blur-md rounded-3xl border border-slate-700 p-8 md:p-12">
                    <form id="uploadForm" action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-8">
                        @csrf

                        <!-- Content Type Tabs -->
                        <div class="space-y-6">
                            <div class="flex justify-center">
                                <div class="flex bg-slate-800/50 rounded-2xl p-2 gap-2">
                                    <button type="button" class="tab-button active" data-tab="file">
                                        📁 Arquivo
                                    </button>
                                    <button type="button" class="tab-button" data-tab="link">
                                        🔗 Link
                                    </button>
                                    <button type="button" class="tab-button" data-tab="text">
                                        📝 Mensagem
                                    </button>
                                </div>
                            </div>

                            <!-- File Upload Tab -->
                            <div id="file-tab" class="tab-content active">
                                <div class="space-y-4">
                                    <label class="block text-lg font-semibold text-slate-200 mb-4">
                                        📁 Selecione um arquivo (até 10MB)
                                    </label>

                                    <div id="uploadZone"
                                        class="upload-zone border-2 border-dashed border-slate-600 rounded-2xl p-12 text-center cursor-pointer transition-all duration-300 hover:border-blue-500">
                                        <div class="space-y-4">
                                            <div
                                                class="w-20 h-20 bg-gradient-to-r from-blue-500/20 to-green-500/20 rounded-full flex items-center justify-center mx-auto">
                                                <svg class="w-10 h-10 text-blue-400" stroke="currentColor" fill="none"
                                                    viewBox="0 0 48 48">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>

                                            <div>
                                                <p class="text-xl font-semibold text-slate-200 mb-2">
                                                    Arraste e solte o arquivo aqui
                                                </p>
                                                <p class="text-slate-400 mb-4">ou</p>
                                                <button type="button"
                                                    class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-6 py-3 rounded-xl font-semibold transition-all duration-300 glow-effect">
                                                    Escolher Arquivo
                                                </button>
                                            </div>

                                            <p class="text-sm text-slate-500">
                                                Formatos suportados: Todos os tipos • Tamanho máximo: 10MB
                                            </p>
                                        </div>
                                    </div>

                                    <input id="fileInput" name="file" type="file" class="hidden">

                                    <!-- File Preview -->
                                    <div id="filePreview" class="file-preview">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p id="fileName" class="font-semibold text-slate-200"></p>
                                                    <p id="fileSize" class="text-sm text-slate-400"></p>
                                                </div>
                                            </div>
                                            <button type="button" id="removeFile"
                                                class="text-red-400 hover:text-red-300 transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="mt-3">
                                            <div class="bg-slate-700 rounded-full h-2">
                                                <div id="progressBar" class="progress-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Link Tab -->
                            <div id="link-tab" class="tab-content">
                                <div class="space-y-4">
                                    <label class="block text-lg font-semibold text-slate-200 mb-4">
                                        🔗 Inserir Link
                                    </label>

                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-300 mb-2">URL do Link</label>
                                            <input type="url" id="linkUrl" name="link_url"
                                                placeholder="https://exemplo.com"
                                                class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-xl text-white placeholder-slate-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-slate-300 mb-2">Título do Link
                                                (opcional)</label>
                                            <input type="text" id="linkTitle" name="link_title"
                                                placeholder="Título descritivo do link"
                                                class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-xl text-white placeholder-slate-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-slate-300 mb-2">Descrição
                                                (opcional)</label>
                                            <textarea id="linkDescription" name="link_description" rows="3" placeholder="Breve descrição sobre o link..."
                                                class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-xl text-white placeholder-slate-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors resize-none"></textarea>
                                        </div>

                                        <div id="linkPreview" class="text-content-preview" style="display: none;">
                                            <h4 class="text-blue-400 font-semibold mb-2">Pré-visualização:</h4>
                                            <div id="linkPreviewContent" class="text-slate-300 text-sm"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Text Message Tab -->
                            <div id="text-tab" class="tab-content">
                                <div class="space-y-4">
                                    <label class="block text-lg font-semibold text-slate-200 mb-4">
                                        📝 Mensagem de Texto
                                    </label>

                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-300 mb-2">Título da Mensagem
                                                (opcional)</label>
                                            <input type="text" id="textTitle" name="text_title"
                                                placeholder="Título da sua mensagem"
                                                class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-xl text-white placeholder-slate-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-slate-300 mb-2">Conteúdo da
                                                Mensagem</label>
                                            <textarea id="textContent" name="text_content" rows="8"
                                                placeholder="Digite sua mensagem aqui... Suporte a Markdown disponível (ex: **negrito**, *itálico*, # título)"
                                                class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-xl text-white placeholder-slate-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors resize-none"></textarea>
                                            <p class="text-xs text-slate-400 mt-2">
                                                💡 Dica: Use formatação Markdown para melhorar a apresentação
                                            </p>
                                        </div>

                                        <div id="textPreview" class="text-content-preview" style="display: none;">
                                            <h4 class="text-blue-400 font-semibold mb-2">Pré-visualização:</h4>
                                            <div id="textPreviewContent"
                                                class="text-slate-300 text-sm whitespace-pre-wrap"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden inputs for content type -->
                        <input type="hidden" id="contentType" name="content_type" value="file">

                        <!-- Expiration Options -->
                        <div class="space-y-6">
                            <h3 class="text-xl font-semibold text-slate-200 flex items-center">
                                ⏰ Tempo de Expiração
                            </h3>

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                <label
                                    class="flex flex-col items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-slate-500 transition-colors cursor-pointer">
                                    <input class="radio-custom mb-2" name="expiration" type="radio" value="1h">
                                    <span class="text-2xl mb-1">⚡</span>
                                    <span class="text-sm font-semibold text-slate-200">1 Hora</span>
                                </label>

                                <label
                                    class="flex flex-col items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-slate-500 transition-colors cursor-pointer">
                                    <input class="radio-custom mb-2" name="expiration" type="radio" value="1d"
                                        checked>
                                    <span class="text-2xl mb-1">🌅</span>
                                    <span class="text-sm font-semibold text-slate-200">1 Dia</span>
                                </label>

                                <label
                                    class="flex flex-col items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-slate-500 transition-colors cursor-pointer">
                                    <input class="radio-custom mb-2" name="expiration" type="radio" value="7d">
                                    <span class="text-2xl mb-1">📅</span>
                                    <span class="text-sm font-semibold text-slate-200">7 Dias</span>
                                </label>

                                <label
                                    class="flex flex-col items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-slate-500 transition-colors cursor-pointer">
                                    <input class="radio-custom mb-2" name="expiration" type="radio" value="download">
                                    <span class="text-2xl mb-1">💥</span>
                                    <span class="text-sm font-semibold text-slate-200">1x Download</span>
                                </label>
                            </div>
                        </div>

                        <!-- Security Features -->
                        <div
                            class="bg-gradient-to-r from-blue-500/10 to-green-500/10 rounded-2xl p-6 border border-blue-500/20">
                            <h4 class="text-lg font-semibold text-slate-200 mb-4 flex items-center">
                                🔒 Recursos de Segurança Ativados
                            </h4>
                            <div class="grid md:grid-cols-3 gap-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                    <span class="text-sm text-slate-300">Criptografia AES-256</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                    <span class="text-sm text-slate-300">Zero-Knowledge</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                    <span class="text-sm text-slate-300">Destruição Automática</span>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center pt-6">
                            <button type="submit" id="submitBtn" disabled
                                class="disabled:opacity-50 disabled:cursor-not-allowed bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 px-10 py-4 rounded-xl text-lg font-bold transition-all duration-300 glow-green transform hover:scale-105 disabled:transform-none disabled:hover:scale-100">
                                🚀 <span id="submitText">Enviar Conteúdo Seguro</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Info Cards -->
                <div class="grid md:grid-cols-3 gap-6 mt-12">
                    <div class="text-center p-6 bg-slate-800/30 rounded-2xl border border-slate-700">
                        <div class="text-3xl mb-3">⚡</div>
                        <h4 class="font-semibold text-slate-200 mb-2">Processamento Rápido</h4>
                        <p class="text-sm text-slate-400">Tecnologia otimizada para partilha rápida e segura</p>
                    </div>

                    <div class="text-center p-6 bg-slate-800/30 rounded-2xl border border-slate-700">
                        <div class="text-3xl mb-3">🛡️</div>
                        <h4 class="font-semibold text-slate-200 mb-2">Máxima Segurança</h4>
                        <p class="text-sm text-slate-400">Seu conteúdo é criptografado durante todo o processo</p>
                    </div>

                    <div class="text-center p-6 bg-slate-800/30 rounded-2xl border border-slate-700">
                        <div class="text-3xl mb-3">🌍</div>
                        <h4 class="font-semibold text-slate-200 mb-2">Global & Local</h4>
                        <p class="text-sm text-slate-400">Acesso rápido em Moçambique e em todo o mundo</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/js/create.js') }}"></script>
@endsection
