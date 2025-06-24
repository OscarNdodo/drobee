//____________________________V4______________________________________
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
        switch (tabId) {
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

    filePreview.style.display = 'block';

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
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2) + ' ' + sizes[i]);
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
            // Validate URL format
            try {
                new URL(linkUrl.value.trim());
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
            } catch (e) {
                linkPreview.style.display = 'none';
            }
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
                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                .replace(/\*(.*?)\*/g, '<em>$1</em>')
                .replace(/^#\s(.*$)/gm, '<h1 class="text-xl font-bold text-slate-200 mt-4 mb-2">$1</h1>')
                .replace(/^##\s(.*$)/gm, '<h2 class="text-lg font-bold text-slate-200 mt-3 mb-1">$1</h2>')
                .replace(/`(.*?)`/g, '<code class="bg-slate-700 px-1 rounded">$1</code>')
                .replace(/\n/g, '<br>');

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

    switch (activeTab) {
        case 'file-tab':
            isValid = fileInput.files.length > 0;
            break;
        case 'link-tab':
            try {
                new URL(linkUrl.value.trim());
                isValid = linkUrl.value.trim() !== '';
            } catch (e) {
                isValid = false;
            }
            break;
        case 'text-tab':
            isValid = textContent.value.trim() !== '';
            break;
    }

    submitBtn.disabled = !isValid;
}

// Função para criar arquivo .md e substituir o input file
async function createAndSetMarkdownFile(contentType) {
    let markdownContent = '';
    let filename = '';

    switch (contentType) {
        case 'text':
            const title = document.getElementById('textTitle').value.trim();
            const content = document.getElementById('textContent').value.trim();
            markdownContent = `# ${title || 'Sem título'}\n\n${content}`;
            filename = title ? `${title.replace(/[^a-z0-9]/gi, '_').toLowerCase()}.md` : 'mensagem.md';
            break;

        case 'link':
            const linkTitle = document.getElementById('linkTitle').value.trim();
            const linkDescription = document.getElementById('linkDescription').value.trim();
            const linkUrl = document.getElementById('linkUrl').value.trim();
            markdownContent = `# ${linkTitle || 'Link sem título'}\n\n${linkDescription || 'Nenhuma descrição fornecida.'}\n\n[Visitar link](${linkUrl})`;
            filename = linkTitle ? `${linkTitle.replace(/[^a-z0-9]/gi, '_').toLowerCase()}_link.md` : 'link.md';
            break;
    }

    // Criar um Blob com o conteúdo Markdown
    const blob = new Blob([markdownContent], { type: 'text/markdown' });
    
    // Criar um File a partir do Blob
    const mdFile = new File([blob], filename, { type: 'text/markdown' });
    
    // Criar um novo DataTransfer para substituir o arquivo no input
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(mdFile);
    
    // Substituir o arquivo no input
    fileInput.files = dataTransfer.files;
    
    // Atualizar o preview
    handleFileSelect(mdFile);
}

// Modificação no event listener de submit
document.getElementById('uploadForm').addEventListener('submit', async function (e) {
    const contentType = document.getElementById('contentType').value;
    
    // Para conteúdo de texto ou link, criar o arquivo .md primeiro
    if (contentType === 'text' || contentType === 'link') {
        e.preventDefault(); // Previne o submit temporariamente
        
        // Mostrar estado de carregamento
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="animate-pulse">Criando arquivo...</span>';

        try {
            await createAndSetMarkdownFile(contentType);
            
            // Pequeno delay para garantir que o input foi atualizado
            setTimeout(() => {
                // Agora permite o submit tradicional
                this.submit();
            }, 100);
        } catch (error) {
            console.error('Erro ao criar arquivo:', error);
            submitBtn.disabled = false;
            submitBtn.innerHTML = document.getElementById('submitText').textContent;
        }
    }
    
    // Para arquivos, o submit continua normal (sem prevenção)
});