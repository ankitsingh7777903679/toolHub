<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image to PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <style>
        
        .con {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 600px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        #imageInput {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #convertButton {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
        }

        #convertButton:hover {
            background-color: #0056b3;
        }

        #convertButton:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        #status {
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }

        #previewContainer {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        #previewContainer img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .card {
            border-radius: 10px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
            padding: 1.5rem;
            background-color: #fff;
            /* max-width: 500px; */
            /* border: none; */
        }
    </style>
</head>

<body>
    <div class="container pt-3">


        <div class="text-center mb-4">
            <h1 class="fw-bolder ">Img to Pdf</h1>
            <h6 class="fw-normal mt-3"> Merge 2 or more PDF files into a single PDF file</h6>
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="con shadow-lg">
            <div class="card">
                <h2>Upload Images</h2>
                <input type="file" id="imageInput" multiple accept="image/*">
                <div id="previewContainer"></div>
                <button id="convertButton" disabled>Convert to PDF</button>
                <p id="status"></p>
            </div>

        </div>
    </div>
    <script>
        const imageInput = document.getElementById('imageInput');
        const convertButton = document.getElementById('convertButton');
        const status = document.getElementById('status');
        const previewContainer = document.getElementById('previewContainer');
        let imageFiles = [];

        imageInput.addEventListener('change', (event) => {
            imageFiles = Array.from(event.target.files);
            if (imageFiles.length > 0) {
                convertButton.disabled = false;
                updatePreviews();
            } else {
                convertButton.disabled = true;
                previewContainer.innerHTML = '';
            }
        });

        function updatePreviews() {
            previewContainer.innerHTML = '';
            imageFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }

        convertButton.addEventListener('click', async () => {
            if (imageFiles.length === 0) {
                status.textContent = 'Please upload at least one image.';
                return;
            }

            convertButton.disabled = true;
            status.textContent = 'Converting to PDF...';

            try {
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF();

                for (let i = 0; i < imageFiles.length; i++) {
                    const file = imageFiles[i];
                    const reader = new FileReader();
                    const imgData = await new Promise((resolve) => {
                        reader.onload = (e) => resolve(e.target.result);
                        reader.readAsDataURL(file);
                    });
                    const imgProps = doc.getImageProperties(imgData);
                    const pdfWidth = doc.internal.pageSize.getWidth();
                    const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                    if (i > 0) doc.addPage();
                    doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                }

                doc.save('images.pdf');
                status.textContent = 'PDF generated successfully! Download initiated.';
            } catch (error) {
                console.error('Error converting to PDF:', error);
                status.textContent = 'Error converting to PDF. Please try again.';
            } finally {
                convertButton.disabled = false;
            }
        });
    </script>
</body>

</html>