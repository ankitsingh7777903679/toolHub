<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML to PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        .con {
            background-color: #fff;
            /* border: 1px solid #ddd; */
            border-radius: 8px;
            padding: 20px;
            width: 600px;
            /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
        }

        h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        #htmlInput {
            width: 100%;
            height: 200px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
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

        #status {
            margin-top: 10px;
            font-size: 12px;
            color: #666;
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
            <h1 class="fw-bolder ">Html to Pdf</h1>
            <h6 class="fw-normal mt-3">convert html to pdf</h6>
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="con shadow-lg">
            <div class="card">
                <h2>Enter HTML</h2>
                <textarea id="htmlInput" placeholder="Type your HTML here..."></textarea>
                <button id="convertButton">Convert to PDF</button>
                <p id="status"></p>
            </div>

        </div>
    </div>




    <script>
        const htmlInput = document.getElementById('htmlInput');
        const convertButton = document.getElementById('convertButton');
        const status = document.getElementById('status');

        convertButton.addEventListener('click', () => {
            const htmlContent = htmlInput.value;
            if (!htmlContent.trim()) {
                status.textContent = 'Please enter some HTML content.';
                return;
            }

            convertButton.disabled = true;
            status.textContent = 'Converting to PDF...';

            const element = document.createElement('div');
            element.innerHTML = htmlContent;

            html2pdf().from(element).save('document.pdf').then(() => {
                status.textContent = 'PDF generated successfully! Download initiated.';
            }).catch((error) => {
                console.error('Error converting to PDF:', error);
                status.textContent = 'Error converting to PDF. Please try again.';
            }).finally(() => {
                convertButton.disabled = false;
            });
        });
    </script>
</body>

</html>