<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebP to JPG Converter</title>
    <link rel="stylesheet" href="../../framework/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/admin.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .con {
            max-width: 900px;
        }

        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 1rem;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
        }

        .gallery-item .download-link {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 8px 0;
            text-decoration: none;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .download-link {
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="con me-auto mx-auto mt-5">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class="card-title">WebP to JPG Converter</h1>
                    <p class="card-text text-muted">Convert your WebP images to JPG format with ease.</p>

                    <div class="my-4">
                        <input type="file" id="imageInput" class="form-control" accept="image/webp" multiple>
                    </div>

                    <button class="btn btn-primary" onclick="convertAndCompress()">Convert to JPG</button>
                    <button id="downloadAllBtn" class="btn btn-success" onclick="downloadAll()" style="display: none;">Download All as ZIP</button>

                    <div class="progress mt-4" style="height: 25px;">
                        <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div id="progressText" class="mt-2 text-muted">No files selected</div>

                </div>
            </div>

            <div class="gallery mt-4" id="gallery"></div>
            <canvas id="canvas" style="display: none;"></canvas>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script>
        const imageInput = document.getElementById('imageInput');
        const gallery = document.getElementById('gallery');
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');
        const canvas = document.getElementById('canvas');
        const downloadAllBtn = document.getElementById('downloadAllBtn');
        const ctx = canvas.getContext('2d');
        let convertedFiles = [];

        imageInput.addEventListener('change', (e) => {
            const files = e.target.files;
            progressText.textContent = `Selected ${files.length} file(s)`;
            gallery.innerHTML = '';
            convertedFiles = [];
            downloadAllBtn.style.display = 'none';
            progressBar.style.width = '0%';
            progressBar.textContent = '';

            for (const file of files) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const galleryItem = document.createElement('div');
                    galleryItem.className = 'gallery-item';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = file.name;

                    galleryItem.appendChild(img);
                    gallery.appendChild(galleryItem);
                };
                reader.readAsDataURL(file);
            }
        });

        async function convertAndCompress() {
            const files = imageInput.files;
            if (files.length === 0) {
                progressText.textContent = 'Please select at least one WebP file';
                return;
            }

            progressText.textContent = 'Converting...';
            gallery.innerHTML = '';
            convertedFiles = [];
            downloadAllBtn.style.display = 'none';
            let processedCount = 0;

            for (const file of files) {
                await new Promise((resolve) => {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = new Image();
                        img.src = e.target.result;
                        img.onload = () => {
                            canvas.width = img.width;
                            canvas.height = img.height;
                            ctx.drawImage(img, 0, 0);

                            const dataUrl = canvas.toDataURL('image/jpeg', 0.9);

                            const galleryItem = document.createElement('div');
                            galleryItem.className = 'gallery-item';

                            const outputImg = document.createElement('img');
                            outputImg.src = dataUrl;
                            outputImg.alt = `Converted ${file.name}`;

                            const downloadLink = document.createElement('a');
                            downloadLink.href = dataUrl;
                            downloadLink.download = file.name.replace(/\.webp$/i, '.jpg');
                            downloadLink.textContent = 'Download';
                            downloadLink.className = 'download-link';

                            galleryItem.appendChild(outputImg);
                            galleryItem.appendChild(downloadLink);
                            gallery.appendChild(galleryItem);

                            convertedFiles.push({
                                name: file.name.replace(/\.webp$/i, '.jpg'),
                                dataUrl: dataUrl
                            });

                            processedCount++;
                            const progress = (processedCount / files.length) * 100;
                            progressBar.style.width = `${progress}%`;
                            progressBar.textContent = `${Math.round(progress)}%`;
                            progressText.textContent = `Converting ${file.name} (${processedCount}/${files.length})`;

                            resolve();
                        };
                    };
                    reader.readAsDataURL(file);
                });
            }

            progressText.textContent = 'Conversion complete!';
            if (convertedFiles.length > 0) {
                downloadAllBtn.style.display = 'inline-block';
            }
        }

        function downloadAll() {
            const zip = new JSZip();
            convertedFiles.forEach(file => {
                const binary = atob(file.dataUrl.split(',')[1]);
                const array = new Uint8Array(binary.length);
                for (let i = 0; i < binary.length; i++) {
                    array[i] = binary.charCodeAt(i);
                }
                zip.file(file.name, array);
            });

            zip.generateAsync({
                type: 'blob'
            }).then(blob => {
                saveAs(blob, 'converted_images.zip');
            });
        }
    </script>
</body>

</html>