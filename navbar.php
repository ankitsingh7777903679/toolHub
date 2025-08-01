<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToolHub</title>
    <link rel="stylesheet" href="./framework/bootstrap.min.css">
    <!-- <script src="./framework/bootstrap.min.js"></script> -->
    <script src="./framework/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        * {
            text-decoration: none !important;
            list-style: none;
        }

        .container {
            max-width: 1200px;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Ensure smooth alignment */
        .dropdown-menu {
            margin-top: 0;
            width: max-content;
            padding: 10px 15px;
            text-decoration: none;
            list-style: none;
        }

        .navbar-icon {
            cursor: pointer;
            padding: 0 5px;
            border: 1px solid #ccc;
            border-radius: 25px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 5px;
            font-weight: 600;
            font-size: 17px;

        }

        .catogary-tool-item {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #000;
            margin: auto 5px;
        }

        .catogary-tool-item:hover {
            background-color: #f8f9fa;
            border-radius: 5px;
            transition: background-color 0.3s ease;

        }

        .catogary-tool {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: start;
        }

        .catogary-menu {
            display: flex;
            flex-direction: column;
            align-items: start;
            border-left: 1px solid #ccc;
        }

        .tool-icon {
            padding: 15px 20px;
            border-radius: 5px;
            margin: 10px 10px;
        }

        .tool-text {
            margin-right: 10px;
        }

        .tool-text>p {
            margin-bottom: 0;
        }

        .tool-text h4:first-child {
            font-weight: 700;
            font-size: 16px;
        }

        .tool-text p:nth-child(2) {
            color: #666;
            font-size: 14px;
            /* Add these properties for text wrapping */
            white-space: normal;
            overflow-wrap: break-word;
            word-wrap: break-word;
            max-width: 200px;
            line-height: 1.2;
            /* Optional: add ellipsis after 2 lines */
            display: -webkit-box;
            /* -webkit-line-clamp: 2; */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .menu-name-catogary {
            font-weight: 600;
            font-size: 12px !important;
            color: #878A8B;
            margin-bottom: 10px;
        }

        .mega_menu {
            width: max-content;
            padding-left: 0 !important;

        }

        .mega_menu li {
            padding: 5px 0;
            font-size: 14px;
            color: #333;
            font-weight: 500;
            font-size: 16px;
        }

        .mega_menu li a {
            color: #333;
            white-space: normal;
            overflow-wrap: break-word !important;
            word-wrap: break-word;
            max-width: 164px;
            line-height: 1.2;
            /* Optional: add ellipsis after 2 lines */
            display: -webkit-box;
            /* -webkit-line-clamp: 2; */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .social_icon a {
            cursor: pointer;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 25px;
        }

        .search-input:hover,
        .search-input:focus {
            border-color: none;
            box-shadow: 0 0 0 0.2rem #ffffff40;

        }

        .search-nav {
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .search-nav:hover,
        .search-nav:focus {
            border-color: #97c8f9ff;
            box-shadow: 0 0 0 0.2rem #ffffff40;
        }

        @media (max-width: 992px) {
            .pdf-dropdown {
                gap: 30px;
            }

            .dropdown-menu {
                width: 100%;
            }

            .tool-icon {
                padding: 15px 20px;
                border-radius: 5px;
                margin: 10px 10px;
            }

            .catogary-menu {
                border-left: none;
            }

            .social_icon a {
                cursor: pointer;
                padding: 8px 10px;
                border: 1px solid #ccc;
                border-radius: 25px;

            }
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-lg">
        <div class="container px-2 px-lg-5">
            <a class="navbar-brand" href="#">ToolHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav gap-4 me-auto ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PDF
                        </a>
                        <ul class="dropdown-menu">
                            <div class="d-lg-flex pdf-dropdown">
                                <div class="catogary-tool pe-lg-4 ">
                                    <p class="menu-name-catogary">FEATURED TOOLS</p>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFE0E6;">
                                            <i class="fa-regular fa-file-lines fs-4" style="color: #FF5975;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Edit PDF</h4>
                                            <p>Free PDF Editor</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #E2F0FE;">
                                            <i class="fa-regular fa-file-lines fs-4" style="color: #3D99F5;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">PDF to Word</h4>
                                            <p>Convert a PDF to Word Document</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFEDE0;">
                                            <i class="fa-regular fa-file-lines fs-4" style="color: #FF8127;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">JPG to PDF</h4>
                                            <p>Upload images and receive as a PDF</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #E2F0FE;">
                                            <i class="fa-solid fa-code-merge fs-4" style="color: #3D99F5;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Merge PDF</h4>
                                            <p>Merge 2 or more PDF files into a single PDF file</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="catogary-menu ps-lg-2 mt-3 mt-lg-0">
                                    <p class="menu-name-catogary">OTHER PDF TOOLS</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="mega_menu">
                                                <li><a href="">Create PDF</a></li>
                                                <li><a href="">PDF to JPG</a></li>
                                                <li><a href="">Compress PDF</a></li>
                                                <li><a href="">Word to PDF</a></li>
                                                <li><a href="">Split</a></li>
                                                <li><a href="">Remove Password</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="mega_menu">
                                                <li><a href="">PDF Translator</a></li>
                                                <li><a href="">eSign</a></li>
                                                <li><a href="">Protect</a></li>
                                                <li><a href="">Rearrange</a></li>
                                                <li><a href="">Extract Text</a></li>
                                                <li><a href="#" class="text-primary">All Pdf Tools</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Image
                        </a>
                        <ul class="dropdown-menu">
                            <div class="d-lg-flex pdf-dropdown">
                                <div class="catogary-tool pe-lg-4 ">
                                    <p class="menu-name-catogary">AI TOOLS</p>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #E9E6F9;">
                                            <i class="fa-regular fa-image fs-5" style="color: #624BD8;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Background Remover</h4>
                                            <p>Easily Remove the Background from an image</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #E3FCFD;">
                                            <i class="fa-regular fa-image fs-5" style="color: #10D0D5;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Restore Photos</h4>
                                            <!-- <p>Sentence Rewriter</p> -->
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFEDE0;">
                                            <i class="fa-regular fa-user fs-4" style="color: #FF8127;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Profile Photo Maker</h4>
                                            <!-- <p>Easily create an essay with AI</p> -->
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FEF9E2;">
                                            <i class="fa-regular fa-image fs-5" style="color: #E9D469;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Remove Person from Photo</h4>
                                            <!-- <p>Create an article from a title</p> -->
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #ECFAE5;">
                                            <i class="fa-regular fa-file-lines fs-4" style="color: #79DC47;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Extract Text From Image</h4>
                                            <!-- <p>Create an article from a title</p> -->
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #ECFAE5;">
                                            <i class="fa-regular fa-image fs-5" style="color: #79DC47;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">AI Image Generator</h4>
                                            <!-- <p>Create an article from a title</p> -->
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FEF9E2;">
                                            <i class="fa-regular fa-image fs-5" style="color: #E9D469;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Remove Objects Photo</h4>
                                            <!-- <p>Create an article from a title</p> -->
                                        </div>
                                    </a>

                                </div>

                                <div class="catogary-menu ps-lg-2 mt-3 mt-lg-0">
                                    <p class="menu-name-catogary">FEATURED TOOLS</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="mega_menu">
                                                <li><a href="">Blur Background</a></li>
                                                <li><a href="">Colorize Photo</a></li>
                                                <li><a href="">Combine Images</a></li>
                                                <li><a href="">Collage Maker</a></li>
                                                <li><a href="">Remove watermark</a></li>
                                                <li><a href="">Chart Maker</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="mega_menu">
                                                <li><a href="">Transparent Background</a></li>
                                                <li><a href="">Crop Image</a></li>
                                                <li><a href="">Add Border to Image</a></li>
                                                <li><a href="">Image Splitter</a></li>
                                                <li><a href="">Add Text to Image</a></li>
                                                <li><a href="#" class="text-primary">Pixelate Image</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Write
                        </a>
                        <ul class="dropdown-menu">
                            <div class="d-lg-flex pdf-dropdown">
                                <div class="catogary-tool pe-lg-4 ">
                                    <p class="menu-name-catogary">FEATURED TOOLS</p>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFE0E6;">
                                            <i class="fa-regular fa-file-lines fs-4" style="color: #FF5975;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Paragraph Writer</h4>
                                            <p>Paragraph Writer</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #E2F0FE;">
                                            <i class="fa-regular fa-file-lines fs-4" style="color: #3D99F5;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Sentence Rewriter</h4>
                                            <p>Sentence Rewriter</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFEDE0;">
                                            <i class="fa-regular fa-file-lines fs-4" style="color: #FF8127;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Essay Writer</h4>
                                            <p>Easily create an essay with AI</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FEF9E2;">
                                            <i class="fa-regular fa-file-lines fs-4" style="color: #E9D469;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Article Writer</h4>
                                            <p>Create an article from a title</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="catogary-menu ps-lg-2 mt-3 mt-lg-0">
                                    <p class="menu-name-catogary">OTHER WRITE TOOLS</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="mega_menu">
                                                <li><a href="">FB Headline Generator</a></li>
                                                <li><a href="">FAQ Generator</a></li>
                                                <li><a href="">Real Estate Descriptions</a></li>
                                                <li><a href="">Paragraph Completer</a></li>
                                                <li><a href="">Business Name Generator</a></li>
                                                <li><a href="">Blog Outline Generator</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="mega_menu">
                                                <li><a href="">Blog Post Ideas</a></li>
                                                <li><a href="">Instagram Caption Generator</a></li>
                                                <li><a href="">LinkedIn Post Generator</a></li>
                                                <li><a href="">Grammar Fixer</a></li>
                                                <li><a href="">Content Improver</a></li>
                                                <li><a href="#" class="text-primary">All AI Write</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Video
                        </a>
                        <ul class="dropdown-menu">
                            <div class="d-lg-flex pdf-dropdown">
                                <div class="catogary-tool pe-lg-4 ">
                                    <p class="menu-name-catogary">FEATURED TOOLS</p>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFE0E6;">
                                            <i class="fa-solid fa-compress fs-4" style="color: #FF5975;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Compress Video</h4>
                                            <p>Lessen the file size of a Video file</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #E2F0FE;">
                                            <i class="fa-solid fa-video fs-4" style="color: #3D99F5;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Video to Gif</h4>
                                            <p>Upload an MP4 and convert to animated GIF</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFEDE0;">
                                            <i class="fa-solid fa-video-slash fs-4" style="color: #FF8127;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Trim Video</h4>
                                            <p>Select a start and stop of a video and download the trimmed video</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FEF9E2;">
                                            <i class="fa-solid fa-volume-high fs-4" style="color: #E9D469;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">MP4 to MP3</h4>
                                            <p>Convert MP4 to MP3 audio</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="catogary-menu ps-lg-2 mt-3 mt-lg-0">
                                    <p class="menu-name-catogary">OTHER VIDEO TOOLS</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <ul class="mega_menu">
                                                <li><a href="">Audio to Text</a></li>
                                                <li><a href="">Resize Video</a></li>
                                                <li><a href="">Extract Audio</a></li>
                                                <li><a href="">MOV to MP4</a></li>
                                                <li><a href="">MKV to MP4</a></li>
                                                <li><a href="">Facebook Download</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-6">
                                            <ul class="mega_menu">
                                                <li><a href="">Instagram Download</a></li>
                                                <li><a href="">Twitter Download</a></li>
                                                <li><a href="">M4A to MP3</a></li>
                                                <li><a href="">Video to WebP</a></li>
                                                <li><a href="">Audio to Text</a></li>
                                                <li><a href="#" class="text-primary">All Video Tools</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            File
                        </a>
                        <ul class="dropdown-menu">
                            <div class="d-lg-flex pdf-dropdown">
                                <div class="catogary-tool pe-lg-4 ">
                                    <p class="menu-name-catogary">FILE TOOLS</p>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFE0E6;">
                                            <i class="fa-solid fa-file fs-4" style="color: #FF5975;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Split CSV</h4>
                                            <p>Split into one or multiple PDF files</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #E2F0FE;">
                                            <i class="fa-solid fa-file fs-4" style="color: #3D99F5;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Excel to PDF</h4>
                                            <p>Convert Excel to PDF</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFEDE0;">
                                            <i class="fa-solid fa-file fs-4" style="color: #FF8127;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Excel to XML</h4>
                                            <p>Convert Excel to XML</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FEF9E2;">
                                            <i class="fa-solid fa-file fs-4" style="color: #E9D469;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">XML to CSV</h4>
                                            <p>Convert XML to CSV</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="catogary-menu ps-lg-2 mt-3 mt-lg-0">
                                    <p class="menu-name-catogary"></p>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFE0E6;">
                                            <i class="fa-solid fa-file fs-4" style="color: #FF5975;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">Split Excel</h4>
                                            <p>Split into one or multiple Excel files</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #E2F0FE;">
                                            <i class="fa-solid fa-file fs-4" style="color: #3D99F5;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">XML to Excel</h4>
                                            <p>Convert XML to Excel</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FFEDE0;">
                                            <i class="fa-solid fa-file fs-4" style="color: #FF8127;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">CSV to Excel</h4>
                                            <p>Convert CSV to Excel</p>
                                        </div>
                                    </a>
                                    <a href="" class="catogary-tool-item">
                                        <div class="tool-icon" style="background-color: #FEF9E2;">
                                            <i class="fa-solid fa-file fs-4" style="color: #E9D469;"></i>
                                        </div>
                                        <div class="tool-text">
                                            <h4 class="">XML to JSON</h4>
                                            <p>Convert XML to JSON</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </ul>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-1 justify-content-center mb-3 mb-lg-0">
                    <!-- <img src="./svg/moon.svg" alt="img" width="30px" height="30px" class="me-1 navbar-icon"> -->
                    <!-- Replace the moon.svg img with this button -->
                    <button class="btn theme-toggle me-1" id="themeSwitcher" aria-label="Toggle theme">
                        <i class="fa-regular fa-sun fs-1" id="themeIcon"></i>
                    </button>
                    <img src="./svg/share.svg" data-bs-target="#share" data-bs-toggle="modal" alt="share" width="30px" height="30px" class="me-2 navbar-icon">
                </div>
                <form class="d-flex search-nav mb-2 mb-lg-0" role="search">
                    <button class="search-btn btn pe-0" type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #8B8D8F;"></i></button>
                    <input class="search-input form-control form-control-sm border border-0" type="search" placeholder="Search" aria-label="Search" style="background: none; color: #8B8D8F; ">
                </form>


                <button class="btn btn-primary ms-1" data-bs-toggle="modal" data-bs-target="#signInModal" type="button">Sign In</button>


                <!-- Sign In Modal -->
                <div class="modal fade" id="signInModal" aria-labelledby="signInModalLabel" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered justify-content-center">
                        <div class="modal-content w-75">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5 w-100 text-center" id="signInModalLabel">Sign In to ToolHub</h1>
                            </div>
                            <div class="modal-body">
                                <button type="button d-flex align-items-center gap-2" class="btn btn-outline-secondary w-100">
                                    <img src="./svg/google-color-svgrepo-com.svg" alt="google" width="24" height="24">

                                    <span>Sign in with Google</span>
                                </button>
                                <form class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="signInEmail" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="signInEmail" placeholder="name@example.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="signInPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="signInPassword" required>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit">Sign In</button>

                                    </div>
                                </form>
                                <div class="text-center mt-3">
                                    <p class="mb-0">Don't have an account?
                                        <a href="#" data-bs-target="#signUpModal" data-bs-toggle="modal">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sign Up Modal -->
                <div class="modal fade" id="signUpModal" aria-labelledby="signUpModalLabel" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered justify-content-center">
                        <div class="modal-content w-75">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5 w-100 text-center" id="signUpModalLabel">Create Account</h1>
                            </div>
                            <div class="modal-body">
                                <button type="button d-flex align-items-center gap-2" class="btn btn-outline-secondary w-100">
                                    <img src="./svg/google-color-svgrepo-com.svg" alt="google" width="24" height="24">
                                    <span>Sign Up with Google</span>
                                </button>
                                <form class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="signUpEmail" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="signUpEmail" placeholder="name@example.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="signUpPassword" class="form-label">Create Password</label>
                                        <input type="password" class="form-control" id="signUpPassword" required>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                                        <label class="form-check-label" for="agreeTerms">I agree to the Terms and Privacy Policy</label>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary" type="submit">Create Account</button>

                                    </div>
                                </form>
                                <div class="text-center mt-3">
                                    <p class="mb-0">Already have an account?
                                        <a href="#" data-bs-target="#signInModal" data-bs-toggle="modal">Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- share with  -->
                <div class="modal fade" id="share" aria-labelledby="exampleModalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
                        <div class="modal-content p-3 w-75">
                            <div class="modal-header p-0 border border-0 d-flex flex-column justify-content-start align-items-start">
                                <h5 class="modal-title fw-bolder fs-4">Show Us Some Love</h5>
                                <p class="modal-header-text">Tell the world about Toolhub</p>
                            </div>
                            <div class="modal-body p-0 py-3">
                                <div class="social_icon d-flex justify-content-between">
                                    <a data-pin-do="buttonBookmark" href="#" title="Share to Pinterest" onclick="window.open('https://www.pinterest.com/pin/create/button/?url='+encodeURIComponent(window.location)+'&amp;media'+encodeURIComponent('')+'=&amp;description='+encodeURIComponent('Free PDF, Video, Image &amp;amp; Other Online Tools-TinyWow'), 'pop', 'width=600, height=400, scrollbars=no'); return false;" rel="noreferrer noopener">
                                        <img src="./svg/pinterest-color-svgrepo-com.svg" alt="Pinterest" width="24" height="24">
                                    </a>



                                    <a href="https://tumblr.com/widgets/share/tool?canonicalUrl=https://.com" onclick="window.open('https://tumblr.com/widgets/share/tool?canonicalUrl='+ encodeURIComponent(window.location), 'pop', 'width=600, height=400, scrollbars=no'); return false;" target="_blank" title="Share to Tumblr" rel="noreferrer noopener">
                                        <img src="./svg/tumblr-svgrepo-com.svg" alt="Tumblr" width="24" height="24">
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=Free PDF, Video, Image &amp;amp; Other Online Tools-TinyWow&amp;url=https://tinywow.com" onclick="window.open('https://twitter.com/intent/tweet?text='+encodeURIComponent('Free PDF, Video, Image &amp;amp; Other Online Tools-TinyWow')+'&amp;url='+ encodeURIComponent(window.location), 'pop', 'width=600, height=400, scrollbars=no'); return false;" target="_blank" title="Share to Twitter" rel="noreferrer noopener">
                                        <img src="./svg/twitter-svgrepo-com.svg" alt="Twitter" width="24" height="24">
                                    </a>
                                    <a href="#" title="Share to Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+ encodeURIComponent(window.location), 'pop', 'width=600, height=400, scrollbars=no'); return false;" rel="noreferrer noopener">
                                        <img src="./svg/facebook-1-svgrepo-com.svg" alt="Facebook" width="24" height="24">
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://.com" onclick="window.open('https://www.linkedin.com/sharing/share-offsite/?url='+ encodeURIComponent(window.location), 'pop', 'width=600, height=400, scrollbars=no'); return false;" target="_blank" title="Share to LinkedIn" rel="noreferrer noopener">
                                        <img src="./svg/linkedin-svgrepo-com.svg" alt="LinkedIn" width="24" height="24">
                                    </a>
                                </div>
                            </div>
                            <div class="modal-footer border border-0 p-0">
                                <div class="input-group border border-1 rounded">
                                    <input type="text" class="form-control border border-0 default-background" value="choko lega" aria-label="" readonly="" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn js-copy-link" data-link="" type="button" id="button-addon2">Copy Link</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<script>
// Check for saved theme preference, otherwise use system preference
const getPreferredTheme = () => {
    const savedTheme = localStorage.getItem('theme')
    if (savedTheme) {
        return savedTheme
    }
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
}

// Apply theme
const setTheme = (theme) => {
    document.documentElement.setAttribute('data-bs-theme', theme)
    localStorage.setItem('theme', theme)
    
    // Update icon
    const icon = document.getElementById('themeIcon')
    if (theme === 'dark') {
        icon.className = 'fa-regular fa-moon'
    } else {
        icon.className = 'fa-regular fa-sun'
    }
}

// Initialize theme
setTheme(getPreferredTheme())

// Add click handler
document.getElementById('themeSwitcher').addEventListener('click', () => {
    const currentTheme = document.documentElement.getAttribute('data-bs-theme')
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark'
    setTheme(newTheme)
})
</script>
</body>

</html>