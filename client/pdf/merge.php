<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Merger</title>
    <script src="https://unpkg.com/pdf-lib@1.17.0/dist/pdf-lib.min.js"></script>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }*/
        .con {
            background-color: #ffffff;
            /* border: 1px solid #e5e7eb; */
            border-radius: 8px;
            padding: 20px;
            max-width: 900px;
            width: 100%;
        }

        h1 {
            color: #111827;
            text-align: center;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .file-input-container {
            border: 1px dashed #d1d5db;
            border-radius: 4px;
            padding: 15px;
            text-align: center;
            background-color: #fafafa;
        }

        #fileInput {
            display: block;
            margin: 10px auto;
            font-size: 14px;
        }

        #fileList {
            list-style: none;
            padding: 0;
            margin: 15px 0;
            max-height: 150px;
            overflow-y: auto;
        }

        #fileList li {
            background-color: #f9fafb;
            padding: 8px;
            margin: 5px 0;
            border-radius: 4px;
            font-size: 13px;
            color: #374151;
        }

        #mergeButton {
            background-color: #374151;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            display: block;
            margin: 15px auto 0;
        }

        #mergeButton:hover {
            background-color: #4b5563;
        }

        #mergeButton:disabled {
            background-color: #d1d5db;
            cursor: not-allowed;
        }

        #status {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #6b7280;
        }

        @media (max-width: 500px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 18px;
            }

            #mergeButton {
                padding: 8px 16px;
                font-size: 13px;
            }
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
            <h1 class="fw-bolder ">PDF Merger</h1>
            <h6 class="fw-normal mt-3"> Merge 2 or more PDF files into a single PDF file</h6>
        </div>

    </div>
    <div class="container d-flex justify-content-center align-items-center">

        <div class="con shadow-lg">
        <div class="card ">
            <h1>PDF Merger</h1>
            <div class="file-input-container">
                <input type="file" id="fileInput" multiple accept=".pdf">
            </div>
            <ul id="fileList"></ul>
            <button id="mergeButton" disabled>Merge PDFs</button>
            <p id="status"></p>
        </div>

        </div>
    </div>


    <script>
        const fileInput = document.getElementById('fileInput');
        const mergeButton = document.getElementById('mergeButton');
        const status = document.getElementById('status');
        const fileList = document.getElementById('fileList');
        let pdfFiles = [];

        fileInput.addEventListener('change', (event) => {
            pdfFiles = Array.from(event.target.files);
            updateFileList();
            mergeButton.disabled = pdfFiles.length < 2;
        });

        function updateFileList() {
            fileList.innerHTML = '';
            pdfFiles.forEach((file, index) => {
                const li = document.createElement('li');
                li.textContent = `${index + 1}. ${file.name}`;
                fileList.appendChild(li);
            });
        }

        mergeButton.addEventListener('click', async () => {
            if (pdfFiles.length < 2) {
                status.textContent = 'Please upload at least two PDF files.';
                return;
            }

            mergeButton.disabled = true;
            status.textContent = 'Merging PDFs...';

            try {
                const mergedPdf = await PDFLib.PDFDocument.create();

                for (const file of pdfFiles) {
                    const arrayBuffer = await file.arrayBuffer();
                    const pdf = await PDFLib.PDFDocument.load(arrayBuffer);
                    const copiedPages = await mergedPdf.copyPages(pdf, pdf.getPageIndices());
                    copiedPages.forEach((page) => mergedPdf.addPage(page));
                }

                const pdfBytes = await mergedPdf.save();
                const blob = new Blob([pdfBytes], {
                    type: 'application/pdf'
                });
                const url = URL.createObjectURL(blob);
                const link = document.createElement('a');
                link.href = url;
                link.download = 'merged.pdf';
                link.click();
                URL.revokeObjectURL(url);

                status.textContent = 'PDFs merged successfully!';
            } catch (error) {
                console.error('Error merging PDFs:', error);
                status.textContent = 'Error merging PDFs. Please try again.';
            } finally {
                mergeButton.disabled = false;
            }
        });
    </script>
</body>

</html>