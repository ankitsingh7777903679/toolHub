<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Generation with Gradio</title>
    <style>
        .con {
            text-align: end;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* #promptInput {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        } */


        #downloadBtn {
            position: absolute;
            top: 30px;
            right: 10px;
            z-index: 10;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        #downloadBtn.visible {
            opacity: 1;
        }

        #downloadBtn:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        button:hover {
            background-color: #45a049;
        }

        .download-btn {
            /* background-color: #1a8fe3 !important; */


        }

        .download-btn:hover {
            /* background-color: #0b7dda; */
        }

        .output-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin: 1rem 0;
            position: relative;
            width: 100%;
        }

        #output {
            margin-top: 20px;
            width: 100%;
            position: relative;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            max-width: 800px;
        }

        #output>img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 0px !important;
        }

        #status {
            margin-top: 10px;
            color: #333;
        }

        .demo_imges {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            aspect-ratio: 1/1;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .demo_img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .demo_img_prompt {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px;
            margin: 0;
            font-size: 12px;
            opacity: 0;
            transform: translateY(100%);
            transition: all 0.3s ease;
        }

        .demo_imges:hover {
            transform: translateY(-5px);

            .demo_img {
                transform: scale(1.05);
            }

            .demo_img_prompt {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .generated-image-container {
            position: relative;
            width: 100%;
        }

        .generated-image-container img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            border-radius: 8px;
        }

        .image-download-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            z-index: 10;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .generated-image-container:hover .image-download-btn {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="container pdf_tool_head d-flex flex-column justify-content-center align-items-center">
        <h1 class="mb-4">AI Image Generator</h1>
        <p>Free Online AI Image Generator</p>
    </div>
    <div class="container pdf_tool_body d-flex justify-content-center align-items-center mt-4">
        <div class="d-flex col-lg-6 search-tool mb-2 mb-lg-0 align-items-center shadow shadow-lg">
            <i class="fa-solid fa-magnifying-glass" style="color: #8B8D8F;"></i>
            <input class="search-tool-input form-control form-control-sm border border-0" id="promptInput" style="background: none; color: #8B8D8F !importent;">
            <button class="search-tool-btn btn py-3" id="generateBtn">Generate</button>
        </div>
    </div>
    <div class="con">
        <div>
            <div id="status" class="text-center">Enter a prompt and click the button to generate an image</div>

            <div class="output-container">
                <div id="output" class="row row-cols-lg-4"></div>
                <button id="downloadBtn" class="download-btn btn" style="display: none;">
                    <i class="fa-solid fa-download"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2 g-lg-4">
            <?php
            include('./common/db.php');
            try {
                $query = "SELECT * FROM gen_image ORDER BY id DESC";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $image_name = htmlspecialchars($row['image_name']);
                        $image_data = $row['image_data'];

                        if ($image_data) {
                            echo "
                                <div class='col'>
                                    <div class='position-relative demo_imges'>
                                        <img class='demo_img' src='data:image/*;base64," . base64_encode($image_data) . "' 
                                             alt='" . $image_name . "' loading='lazy'>
                                        <p class='demo_img_prompt'>" . $image_name . "</p>
                                    </div>
                                </div>";
                        }
                    }
                } else {
                    echo "<div class='col-12 text-center'><p>No images found</p></div>";
                }
            } catch (Exception $e) {
                echo "<div class='col-12 text-center text-danger'>Error loading images</div>";
            }
            ?>
        </div>
    </div>



    <script type="module">
        // Add SSE parser helper
        function parseSSEResponse(text) {
            const lines = text.split('\n');
            for (const line of lines) {
                if (line.startsWith('data: ')) {
                    try {
                        return JSON.parse(line.slice(6));
                    } catch (e) {
                        console.warn('Failed to parse SSE data line:', line);
                    }
                }
            }
            return null;
        }

        async function generateImage() {
            const promptInput = document.getElementById('promptInput').value;
            const status = document.getElementById('status');
            const output = document.getElementById('output');

            status.textContent = 'Generating images...';
            output.innerHTML = '';

            if (!promptInput.trim()) {
                status.textContent = 'Please enter a valid prompt.';
                return;
            }

            try {
                const apiUrl = "https://nihalgazi-flux-unlimited.hf.space/gradio_api/call/generate_image";
                // Generate 4 images in parallel
                const imagePromises = Array(4).fill().map(async () => {
                    const payload = {
                        data: [
                            promptInput,
                            2048,
                            2048,
                            3,
                            true,
                            "Google US Server"
                        ]
                    };

                    let postResp = await fetch(apiUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(payload)
                    });

                    if (!postResp.ok) throw new Error(`HTTP error! status: ${postResp.status}`);
                    const postJson = await postResp.json();
                    const eventId = postJson.event_id || postJson.id || (Array.isArray(postJson) ? postJson[0] : null);
                    if (!eventId) throw new Error('No event ID received');

                    // Poll for result
                    const pollUrl = `https://nihalgazi-flux-unlimited.hf.space/gradio_api/call/generate_image/${eventId}`;
                    let tries = 0;
                    let pollJson = null;

                    while (tries < 10) {
                        const pollResp = await fetch(pollUrl);
                        const pollText = await pollResp.text();
                        const sseData = parseSSEResponse(pollText);
                        
                        if (sseData) {
                            pollJson = { data: sseData };
                            break;
                        }

                        if (pollJson?.status !== "pending") break;
                        await new Promise(r => setTimeout(r, 2000));
                        tries++;
                    }

                    return pollJson?.data?.[0]?.url || null;
                });

                const imageUrls = await Promise.all(imagePromises);
                output.innerHTML = '';

                imageUrls.forEach((url, index) => {
                    if (url) {
                        const container = document.createElement('div');
                        container.className = 'generated-image-container col';

                        const img = document.createElement('img');
                        img.src = url;

                        const downloadBtn = document.createElement('button');
                        downloadBtn.className = 'image-download-btn';
                        downloadBtn.innerHTML = '<i class="fa-solid fa-download"></i>';
                        downloadBtn.onclick = async () => {
                            try {
                                const response = await fetch(url);
                                const blob = await response.blob();
                                const blobUrl = window.URL.createObjectURL(blob);
                                const link = document.createElement('a');
                                link.href = blobUrl;
                                link.download = `generated-image-${index + 1}.webp`;
                                document.body.appendChild(link);
                                link.click();
                                document.body.removeChild(link);
                                window.URL.revokeObjectURL(blobUrl);
                            } catch (err) {
                                console.error('Download failed:', err);
                                status.textContent = 'Failed to download image';
                            }
                        };

                        container.appendChild(img);
                        container.appendChild(downloadBtn);
                        output.appendChild(container);
                    }
                });

                status.textContent = 'Images generated successfully!';

            } catch (error) {
                console.error('Detailed Error:', error);
                status.textContent = 'Error generating images: ' + (error.message || 'Unknown error. Check console for details.');
            }
        }

        document.getElementById('generateBtn').addEventListener('click', generateImage);
    </script>
</body>

</html>