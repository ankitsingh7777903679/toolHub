<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced PDF Splitter</title>
    <script src="https://unpkg.com/pdf-lib@1.17.0/dist/pdf-lib.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            background-color: #fff;
        }

        .response {
            white-space: pre-wrap;
            font-family: 'Arial', sans-serif;
            border: 1px solid #ccc;
            border-radius: 8px;
            /* padding: 1rem; */
            height: 100%;
            /* max-height: 400px; */
            /* overflow-y: auto; */
            background-color: #f1f3f5;
            /* margin-top: 1rem; */
        }

        h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 15px;
            font-weight: 500;
        }

        #pdfInput {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
            background-color: #f1f3f5;

        }

        #previewSection {
            /* margin-bottom: 15px; */
            text-align: center;
        }

        #previewContainer {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-top: 10px;
            max-height: 500px;
            overflow-y: auto;
        }

        #previewContainer canvas {
            max-width: 120px;
            max-height: 160px;
            border: 1px solid #ddd;
            border-radius: 5px;
            position: relative;
        }

        #previewContainer .loading {
            width: 120px;
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }

        #pageCount {
            margin-top: 5px;
            font-size: 14px;
            color: #666;
        }

        #pageSelection {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 15px;
        }

        .page-item {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }

        .page-item input {
            margin-right: 10px;
        }

        #selectRangeButton {
            background-color: #6c757d;
            color: #fff;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 15px;
        }

        #selectRangeButton:hover {
            background-color: #5a6268;
        }

        #splitButton {
            background-color: #007bff;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        #splitButton:hover {
            background-color: #0056b3;
        }

        #splitButton:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        #status {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }

        #downloadAll {
            background-color: #28a745;
            color: #fff;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
            display: none;
        }

        #downloadAll:hover {
            background-color: #218838;
        }
        
    </style>
</head>

<body>
    <div class="container pt-3">
        <div class="text-center mb-4">
            <h1 class="fw-bolder ">Split PDF File</h1>
            <h6 class="fw-normal mt-3">Split into one PDF files</h6>
        </div>
        <div class="row">
            <div class="col-4 card">
                <h2>Upload PDF</h2>
                <input type="file" id="pdfInput" accept=".pdf">

                <h2>Select Pages to Split</h2>
                <button id="selectRangeButton">Select Range</button>
                <div id="pageSelection"></div>
                <button id="splitButton" disabled>Split PDF</button>
                <button id="downloadAll" style="display: none;">Download All as ZIP</button>
                <p id="status"></p>
            </div>
            <div class="col-8 card" id="previewSection">
                <h2>image preview</h2>
                <div class="response">
                    <div id="pageCount"></div>
                    <div id="previewContainer"></div>

                </div>

            </div>
            
        </div>
    </div>


    <script>
        const pdfInput = document.getElementById('pdfInput');
        const splitButton = document.getElementById('splitButton');
        const status = document.getElementById('status');
        const pageSelection = document.getElementById('pageSelection');
        const previewContainer = document.getElementById('previewContainer');
        const pageCountDisplay = document.getElementById('pageCount');
        const selectRangeButton = document.getElementById('selectRangeButton');
        const downloadAllButton = document.getElementById('downloadAll');
        let pdfDoc = null;
        let pdfjsDoc = null;
        let selectedPages = new Set();

        pdfInput.addEventListener('change', async (event) => {
            const file = event.target.files[0];
            if (!file) return;

            splitButton.disabled = true;
            status.textContent = 'Loading PDF...';
            pageSelection.innerHTML = '';
            previewContainer.innerHTML = '';
            selectedPages.clear();

            try {
                const arrayBuffer = await file.arrayBuffer();
                pdfDoc = await PDFLib.PDFDocument.load(arrayBuffer);
                const totalPages = pdfDoc.getPageCount();
                pageCountDisplay.textContent = `Total Pages: ${totalPages}`;

                // Load PDF with pdf.js for previews
                pdfjsDoc = await pdfjsLib.getDocument(URL.createObjectURL(file)).promise;
                for (let i = 1; i <= totalPages; i++) {
                    const loadingDiv = document.createElement('div');
                    loadingDiv.className = 'loading';
                    loadingDiv.textContent = 'Loading...';
                    previewContainer.appendChild(loadingDiv);
                }
                await renderPreviews();

                for (let i = 1; i <= totalPages; i++) {
                    const div = document.createElement('div');
                    div.className = 'page-item';
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.id = `page_${i}`;
                    checkbox.value = i - 1; // 0-based index for pdf-lib
                    const label = document.createElement('label');
                    label.htmlFor = `page_${i}`;
                    label.textContent = `Page ${i}`;
                    div.appendChild(checkbox);
                    div.appendChild(label);
                    pageSelection.appendChild(div);
                    checkbox.addEventListener('change', updateButtonState);
                }

                splitButton.disabled = false;
                status.textContent = 'PDF loaded successfully. Select pages to split.';
            } catch (error) {
                console.error('Error loading PDF:', error);
                status.textContent = 'Error loading PDF. Please try again.';
                previewContainer.innerHTML = '<p>Preview unavailable due to error.</p>';
            }
        });

        async function renderPreviews() {
            if (!pdfjsDoc) return;
            const totalPages = pdfjsDoc.numPages;
            for (let i = 1; i <= totalPages; i++) {
                try {
                    const page = await pdfjsDoc.getPage(i);
                    const viewport = page.getViewport({
                        scale: 0.3
                    });
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
                    await page.render({
                        canvasContext: context,
                        viewport: viewport
                    }).promise;

                    // Draw page number
                    context.fillStyle = 'rgba(0, 0, 0, 0.7)';
                    context.font = 'bold 16px Arial';
                    context.fillText(i.toString(), 5, 20);

                    previewContainer.replaceChild(canvas, previewContainer.children[i - 1]);
                } catch (error) {
                    console.error(`Error rendering page ${i}:`, error);
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'loading';
                    errorDiv.textContent = 'Error loading page';
                    previewContainer.replaceChild(errorDiv, previewContainer.children[i - 1]);
                }
            }
        }

        selectRangeButton.addEventListener('click', () => {
            const start = prompt('Enter start page number:');
            const end = prompt('Enter end page number:');
            const startNum = parseInt(start);
            const endNum = parseInt(end);
            if (startNum && endNum && startNum <= endNum && endNum <= pdfDoc.getPageCount()) {
                for (let i = startNum; i <= endNum; i++) {
                    document.getElementById(`page_${i}`).checked = true;
                }
                updateButtonState();
            } else {
                alert('Invalid range. Ensure start and end are valid page numbers.');
            }
        });

        function updateButtonState() {
            selectedPages.clear();
            document.querySelectorAll('#pageSelection input:checked').forEach(checkbox => {
                selectedPages.add(parseInt(checkbox.value));
            });
            splitButton.disabled = selectedPages.size === 0;
        }

        splitButton.addEventListener('click', async () => {
            if (!pdfDoc || selectedPages.size === 0) {
                status.textContent = 'No PDF loaded or no pages selected.';
                return;
            }

            splitButton.disabled = true;
            status.textContent = 'Splitting PDF...';
            const zip = new JSZip();
            const pageArray = Array.from(selectedPages).sort((a, b) => a - b);

            try {
                for (const pageIndex of pageArray) {
                    const newPdfDoc = await PDFLib.PDFDocument.create();
                    const [copiedPage] = await newPdfDoc.copyPages(pdfDoc, [pageIndex]);
                    newPdfDoc.addPage(copiedPage);

                    const pdfBytes = await newPdfDoc.save();
                    zip.file(`split_page_${pageIndex + 1}.pdf`, pdfBytes);
                }

                const zipBlob = await zip.generateAsync({
                    type: 'blob'
                });
                saveAs(zipBlob, 'split_pdfs.zip');
                status.textContent = 'PDFs split successfully! ZIP download initiated.';
                downloadAllButton.style.display = 'block';
            } catch (error) {
                console.error('Error splitting PDF:', error);
                status.textContent = 'Error splitting PDF. Please try again.';
            } finally {
                splitButton.disabled = false;
            }
        });

        downloadAllButton.addEventListener('click', () => {
            if (pdfDoc) {
                splitButton.click(); // Re-trigger split to regenerate ZIP
            }
        });
    </script>
</body>

</html>