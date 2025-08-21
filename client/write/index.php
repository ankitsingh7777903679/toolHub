<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Generator</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"> -->
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {

            /* margin-top: 2rem;
            margin-bottom: 2rem; */
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            background-color: #fff;
        }

        #response {
            white-space: pre-wrap;
            font-family: 'Arial', sans-serif;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 1rem;
            height: 400px;
            max-height: 400px;
            overflow-y: auto;
            background-color: #f1f3f5;
            margin-top: 1rem;
        }

        #datetime {
            font-style: italic;
            color: #666;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        h1,
        h2,
        h3 {
            font-family: 'Arial', sans-serif;
            margin: 0.5rem 0;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control,
        .form-select {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .copy-button {
            /* position: absolute; */
            top: 10px;
            /* right: 10px; */
            padding: 5px 10px;
            background-color: #6c757d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .copy-button:hover {
            background-color: #5a6268;
        }

        .response-container {
            position: relative;
        }

        @media (max-width: 576px) {
            .container {
                padding: 0 1rem;
            }

            .card {
                padding: 1rem;
            }

            #response {
                height: 300px;
            }
        }
    </style>
    <? //php include('../bootstrap.php');
    ?>
</head>

<body>
    <?php //include('../navbar.php');
    ?>
    <div class="container mt-5" style="max-width: 1200px;">
        <div class="text-center mb-4">
            <h1 class="fw-bolder ">AI Blog Post Generator</h1>
            <h5 class="fw-normal mt-3">Let AI Generate an SEO Optimized Blog Post</h5>
        </div>

        <div class="row g-4">
        
            <div class="card col-12 col-md-4">
                <div class="mb-3">
                    <label for="text" class="form-label">Enter Prompt</label>
                    <textarea class="form-control" id="text" rows="4" placeholder="Type your prompt here..."></textarea>
                </div>
                <div class="mb-3">
                    <label for="pera" class="form-label">Number of Paragraphs</label>
                    <select class="form-select" id="pera" name="pera" aria-label="Select number of paragraphs">
                        <option selected value="3">Select paragraphs (default: 3)</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                        <option value="5">Five</option>
                        <option value="6">Six</option>
                        <option value="7">Seven</option>
                        <option value="8">Eight</option>
                        <option value="9">Nine</option>
                        <option value="10">Ten</option>
                    </select>
                </div>
                <button onclick="generateResponse();" class="btn btn-primary">Generate</button>
            </div>

            <div class="card col-12 col-md-8">
                <div class="response-container">
                    <div class="d-flex justify-content-end mb-2">
                        <button class="copy-button" onclick="copyResponse()">Copy</button>

                    </div>
                    <div id="response"></div>
                </div>
                <div id="datetime"></div>
            </div>
        </div>


    </div>
    <script src="/toolHub/client/write/script.js"></script>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script> -->
    <script>
        function copyResponse() {
            const responseText = document.getElementById('response').textContent;
            navigator.clipboard.writeText(responseText)
                .then(() => {
                    const copyBtn = document.querySelector('.copy-button');
                    copyBtn.textContent = 'Copied!';
                    setTimeout(() => {
                        copyBtn.textContent = 'Copy';
                    }, 2000);
                })
                .catch(err => {
                    console.error('Failed to copy text: ', err);
                });
        }
    </script>
    <?php //include('../footer.php');
    ?>
</body>

</html>