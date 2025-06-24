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
        
        .upload-zone {
            transition: all 0.3s ease;
        }
        
        .upload-zone:hover {
            border-color: #3b82f6;
            background-color: rgba(59, 130, 246, 0.05);
        }
        
        .upload-zone.dragover {
            border-color: #f97316;
            background-color: rgba(249, 115, 22, 0.1);
            transform: scale(1.02);
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
            background: linear-gradient(135deg, #3b82f6, #f97316);
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
            background: linear-gradient(90deg, #3b82f6, #f97316);
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
            background: linear-gradient(135deg, #3b82f6, #f97316);
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
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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

    <!-- Main Content -->
    <main class="relative z-10 p-6 ">
        <div class="container mx-auto max-w-4xl">
            <div class="slide-in">
                <!-- Title Section -->
                <div class="text-center mb-12">
                    <h1 class="text-4xl md:text-5xl font-black mb-4">
                        <span class="bg-gradient-to-r uppercase from-blue-400 to-orange-400 bg-clip-text text-transparent">
                            Partilhar Conteúdo
                        </span>
                    </h1>
                    <p class="text-xl text-slate-300 max-w-2xl mx-auto">
                        Partilhe ficheiros, links ou mensagens de forma segura com expiração automática. Sem registo necessário.
                    </p>
                </div>

                <!-- Upload Form -->
                <div class="bg-slate-800/50 backdrop-blur-md rounded-3xl border border-slate-700 p-8 md:p-12">
                    <form id="uploadForm" action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
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
                                    
                                    <div id="uploadZone" class="upload-zone border-2 border-dashed border-slate-600 rounded-2xl p-12 text-center cursor-pointer transition-all duration-300 hover:border-blue-500">
                                        <div class="space-y-4">
                                            <div class="w-20 h-20 bg-gradient-to-r from-blue-500/20 to-orange-500/20 rounded-full flex items-center justify-center mx-auto">
                                                <svg class="w-10 h-10 text-blue-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            
                                            <div>
                                                <p class="text-xl font-semibold text-slate-200 mb-2">
                                                    Arraste e solte o arquivo aqui
                                                </p>
                                                <p class="text-slate-400 mb-4">ou</p>
                                                <button type="button" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 px-6 py-3 rounded-xl font-semibold transition-all duration-300 glow-effect">
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
                                                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p id="fileName" class="font-semibold text-slate-200"></p>
                                                    <p id="fileSize" class="text-sm text-slate-400"></p>
                                                </div>
                                            </div>
                                            <button type="button" id="removeFile" class="text-red-400 hover:text-red-300 transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M6 18L18 6M6 6l12 12"/>
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
                                            <label class="block text-sm font-medium text-slate-300 mb-2">Título do Link (opcional)</label>
                                            <input type="text" id="linkTitle" name="link_title" 
                                                   placeholder="Título descritivo do link" 
                                                   class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-xl text-white placeholder-slate-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-slate-300 mb-2">Descrição (opcional)</label>
                                            <textarea id="linkDescription" name="link_description" rows="3" 
                                                     placeholder="Breve descrição sobre o link..."
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
                                            <label class="block text-sm font-medium text-slate-300 mb-2">Título da Mensagem (opcional)</label>
                                            <input type="text" id="textTitle" name="text_title" 
                                                   placeholder="Título da sua mensagem" 
                                                   class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-xl text-white placeholder-slate-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors">
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-slate-300 mb-2">Conteúdo da Mensagem</label>
                                            <textarea id="textContent" name="text_content" rows="8" 
                                                     placeholder="Digite sua mensagem aqui... Suporte a Markdown disponível (ex: **negrito**, *itálico*, # título)"
                                                     class="w-full px-4 py-3 bg-slate-800 border border-slate-600 rounded-xl text-white placeholder-slate-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-colors resize-none"></textarea>
                                            <p class="text-xs text-slate-400 mt-2">
                                                💡 Dica: Use formatação Markdown para melhorar a apresentação
                                            </p>
                                        </div>
                                        
                                        <div id="textPreview" class="text-content-preview" style="display: none;">
                                            <h4 class="text-blue-400 font-semibold mb-2">Pré-visualização:</h4>
                                            <div id="textPreviewContent" class="text-slate-300 text-sm whitespace-pre-wrap"></div>
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
                                <label class="flex flex-col items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-slate-500 transition-colors cursor-pointer">
                                    <input class="radio-custom mb-2" name="expiration" type="radio" value="1h">
                                    <span class="text-2xl mb-1">⚡</span>
                                    <span class="text-sm font-semibold text-slate-200">1 Hora</span>
                                </label>
                                
                                <label class="flex flex-col items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-slate-500 transition-colors cursor-pointer">
                                    <input class="radio-custom mb-2" name="expiration" type="radio" value="1d" checked>
                                    <span class="text-2xl mb-1">🌅</span>
                                    <span class="text-sm font-semibold text-slate-200">1 Dia</span>
                                </label>
                                
                                <label class="flex flex-col items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-slate-500 transition-colors cursor-pointer">
                                    <input class="radio-custom mb-2" name="expiration" type="radio" value="7d">
                                    <span class="text-2xl mb-1">📅</span>
                                    <span class="text-sm font-semibold text-slate-200">7 Dias</span>
                                </label>
                                
                                <label class="flex flex-col items-center p-4 bg-slate-700/30 rounded-xl border border-slate-600 hover:border-slate-500 transition-colors cursor-pointer">
                                    <input class="radio-custom mb-2" name="expiration" type="radio" value="download">
                                    <span class="text-2xl mb-1">💥</span>
                                    <span class="text-sm font-semibold text-slate-200">1x Download</span>
                                </label>
                            </div>
                        </div>

                        <!-- Security Features -->
                        <div class="bg-gradient-to-r from-blue-500/10 to-orange-500/10 rounded-2xl p-6 border border-blue-500/20">
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
                                    class="disabled:opacity-50 disabled:cursor-not-allowed bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 px-10 py-4 rounded-xl text-lg font-bold transition-all duration-300 glow-orange transform hover:scale-105 disabled:transform-none disabled:hover:scale-100">
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
{{-- 
    <script>
        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.dataset.tab;
                
                // Update active tab button
                document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                
                // Update active tab content
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
                document.getElementById(`${tabId}-tab`).classList.add('active');
                
                // Update content type
                document.getElementById('contentType').value = tabId;
                
                // Update submit button text
                const submitText = document.getElementById('submitText');
                switch(tabId) {
                    case 'file':
                        submitText.textContent = 'Enviar Arquivo Seguro';
                        break;
                    case 'link':
                        submitText.textContent = 'Partilhar Link Seguro';
                        break;
                    case 'text':
                        submitText.textContent = 'Partilhar Mensagem Segura';
                        break;
                }
                
                // Check if submit should be enabled
                checkSubmitButton();
            });
        });

        // File upload functionality
        const uploadZone = document.getElementById('uploadZone');
        const fileInput = document.getElementById('fileInput');
        const filePreview = document.getElementById('filePreview');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        const removeFile = document.getElementById('removeFile');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.getElementById('progressBar');

        // Click to select file
        uploadZone.addEventListener('click', () => {
            fileInput.click();
        });

        // Drag and drop functionality
        uploadZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadZone.classList.add('dragover');
        });

        uploadZone.addEventListener('dragleave', () => {
            uploadZone.classList.remove('dragover');
        });

        uploadZone.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadZone.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFileSelect(files[0]);
            }
        });

        // File input change
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handleFileSelect(e.target.files[0]);
            }
        });

        // Handle file selection
        function handleFileSelect(file) {
            // Check file size (10MB limit)
            if (file.size > 10 * 1024 * 1024) {
                alert('Arquivo muito grande! Tamanho máximo: 10MB');
                return;
            }

            // Show file preview
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            
            // Update file icon based on type
            const fileIcon = document.querySelector('#filePreview .w-10.h-10');
            const { icon, bgColor } = getFileIcon(file.type, file.name);
            fileIcon.className = `w-10 h-10 ${bgColor} rounded-lg flex items-center justify-center`;
            fileIcon.innerHTML = icon;
            
            filePreview.style.display = 'block';            filePreview.style.display = 'block';
            
            // Enable submit button
            checkSubmitButton();
        }

        // Remove file
        removeFile.addEventListener('click', (e) => {
            e.stopPropagation();
            fileInput.value = '';
            filePreview.style.display = 'none';
            checkSubmitButton();
        });

        // Format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2) + ' ' + sizes[i];
        }

        // Get file icon based on type
        function getFileIcon(type, name) {
            const extension = name.split('.').pop().toLowerCase();
            let icon = `<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                        </svg>`;
            let bgColor = 'bg-blue-500';
            
            if (type.includes('image')) {
                icon = `<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                        </svg>`;
                bgColor = 'bg-green-500';
            } else if (type.includes('pdf')) {
                icon = `<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/>
                        </svg>`;
                bgColor = 'bg-red-500';
            } else if (type.includes('zip') || type.includes('compressed') || extension === 'zip' || extension === 'rar') {
                icon = `<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4V5h12v10z"/>
                        </svg>`;
                bgColor = 'bg-yellow-500';
            } else if (type.includes('audio')) {
                icon = `<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 011.341.447A5.97 5.97 0 0118 10a5.97 5.97 0 01-1.106 3.447 1 1 0 01-1.341.448l-1.6-.8L11 15.677V17a1 1 0 11-2 0v-1.323l-3.954-1.582-1.599.8a1 1 0 01-1.341-.447A5.97 5.97 0 012 10c0-1.048.286-2.03.786-2.894a1 1 0 011.341-.447l1.6.8L9 4.323V3a1 1 0 011-1zm-4 8a4 4 0 108 0 4 4 0 00-8 0z"/>
                        </svg>`;
                bgColor = 'bg-purple-500';
            } else if (type.includes('video')) {
                icon = `<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4V5h12v10zM8 7l5 3-5 3V7z"/>
                        </svg>`;
                bgColor = 'bg-pink-500';
            } else if (type.includes('text') || extension === 'txt' || extension === 'md') {
                icon = `<svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"/>
                        </svg>`;
                bgColor = 'bg-indigo-500';
            }
            
            return { icon, bgColor };
        }

        // Link preview functionality
        const linkUrl = document.getElementById('linkUrl');
        const linkTitle = document.getElementById('linkTitle');
        const linkDescription = document.getElementById('linkDescription');
        const linkPreview = document.getElementById('linkPreview');
        const linkPreviewContent = document.getElementById('linkPreviewContent');

        [linkUrl, linkTitle, linkDescription].forEach(input => {
            input.addEventListener('input', () => {
                if (linkUrl.value.trim() !== '') {
                    linkPreview.style.display = 'block';
                    
                    const title = linkTitle.value.trim() !== '' ? linkTitle.value.trim() : 'Link sem título';
                    const description = linkDescription.value.trim() !== '' ? linkDescription.value.trim() : 'Nenhuma descrição fornecida.';
                    
                    linkPreviewContent.innerHTML = `
                        <div class="border-l-4 border-blue-400 pl-3 mb-3">
                            <h5 class="font-bold text-slate-200">${title}</h5>
                            <p class="text-slate-400 text-sm">${description}</p>
                        </div>
                        <p class="text-blue-400 text-xs break-all">${linkUrl.value.trim()}</p>
                    `;
                } else {
                    linkPreview.style.display = 'none';
                }
                
                checkSubmitButton();
            });
        });

        // Text preview functionality
        const textContent = document.getElementById('textContent');
        const textTitle = document.getElementById('textTitle');
        const textPreview = document.getElementById('textPreview');
        const textPreviewContent = document.getElementById('textPreviewContent');

        [textContent, textTitle].forEach(input => {
            input.addEventListener('input', () => {
                if (textContent.value.trim() !== '') {
                    textPreview.style.display = 'block';
                    
                    const title = textTitle.value.trim() !== '' ? `<h4 class="font-bold text-lg text-slate-200 mb-2">${textTitle.value.trim()}</h4>` : '';
                    const content = textContent.value.trim();
                    
                    // Simple markdown parsing
                    let parsedContent = content
                        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>') // bold
                        .replace(/\*(.*?)\*/g, '<em>$1</em>') // italic
                        .replace(/^#\s(.*$)/gm, '<h1 class="text-xl font-bold text-slate-200 mt-4 mb-2">$1</h1>') // h1
                        .replace(/^##\s(.*$)/gm, '<h2 class="text-lg font-bold text-slate-200 mt-3 mb-1">$1</h2>') // h2
                        .replace(/`(.*?)`/g, '<code class="bg-slate-700 px-1 rounded">$1</code>') // inline code
                        .replace(/\n/g, '<br>'); // line breaks
                    
                    textPreviewContent.innerHTML = title + parsedContent;
                } else {
                    textPreview.style.display = 'none';
                }
                
                checkSubmitButton();
            });
        });

        // Check if submit button should be enabled
        function checkSubmitButton() {
            const activeTab = document.querySelector('.tab-content.active').id;
            let isValid = false;
            
            switch(activeTab) {
                case 'file-tab':
                    isValid = fileInput.files.length > 0;
                    break;
                case 'link-tab':
                    isValid = linkUrl.value.trim() !== '';
                    break;
                case 'text-tab':
                    isValid = textContent.value.trim() !== '';
                    break;
            }
            
            submitBtn.disabled = !isValid;
        }

        // Form submission
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = e.target;
            const formData = new FormData(form);
            const activeTab = document.querySelector('.tab-content.active').id;
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="animate-pulse">Processando...</span>';
            
            if (activeTab === 'file-tab') {
                // Simulate upload progress
                let progress = 0;
                const interval = setInterval(() => {
                    progress += Math.random() * 10;
                    if (progress > 90) progress = 90;
                    progressBar.style.width = `${progress}%`;
                }, 200);
                
                // In a real app, you would use fetch or XMLHttpRequest
                setTimeout(() => {
                    clearInterval(interval);
                    progressBar.style.width = '100%';
                    
                    // Simulate successful upload
                    setTimeout(() => {
                        form.submit();
                    }, 500);
                }, 3000);
            } else {
                // For non-file uploads, submit immediately
                form.submit();
            }
        });
    </script> --}}

    <script src="{{ asset('assets/js/create.js') }}"></script>
</body>
</html>