<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header> <?php include 'navbar.php' ?> </header>
    <div class="home_area container mt-5 mb-5">
        <div class="containr">
            <div class="container home_content align-items-center d-flex flex-column">
                <h1 class="text-md-center">Free Tools to Make <span>Everything</span> Simple</h1>
                <p class="py-lg-4 py-2">We offer PDF, video, image and other online tools to make your life easier</p>
                <form class="d-flex col-lg-6 search-tool mb-2 mb-lg-0 align-items-center shadow shadow-lg" role="search">
                    <i class="fa-solid fa-magnifying-glass" style="color: #8B8D8F;"></i>
                    <input class="search-tool-input form-control form-control-sm border border-0" type="search" placeholder="Search" aria-label="Search" style="background: none; color: #8B8D8F; ">
                    <button class="search-tool-btn btn" type="submit">search</button>
                </form>
            </div>
        </div>
        <div class="container container_tool my-5">
            <div class="toll_tools row row-cols-1 row-cols-md-3 row-cols-lg-5 gy-3 gx-4">
                <div class="col px-lg-1">
                    <div class="tool_items " style="background-color: #6f56ec;">
                        <a href="" class="tool_content">
                            <div class="tool_header d-flex justify-content-between align-items-center">
                                <div class="tool_circle rounded-circle d-flex justify-content-center align-items-center" style="background-color: #9d8cf2;">
                                    <i class="fa-regular fa-file-lines fs-5"></i>
                                </div>
                                <div class="tool_tag" style="background-color: #9d8cf2;">
                                    <span>45 + tools</span>
                                </div>
                            </div>
                            <div class="tool_body d-flex justify-content-between align-items-center my-2 gap-3">
                                <div>
                                    <p class="tool_name mb-0 fw-bolder">PDF Tools</p>
                                    <span class="tool_descr">Solve Your PDF Problems</span>
                                </div>
                                <div>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                            <div class="tool_footer mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Featured Tool :</span>
                                    <a href="" style="color: #6f56ec;">PDF Creator</a>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col px-lg-1">
                    <div class="tool_items col" style="background-color: #F66213;">
                        <a href="" class="tool_content">
                            <div class="tool_header d-flex justify-content-between align-items-center">
                                <div class="tool_circle rounded-circle d-flex justify-content-center align-items-center" style="background-color: #F8935F;">
                                    <i class="fa-regular fa-file-lines fs-5"></i>
                                </div>
                                <div class="tool_tag" style="background-color: #F8935F;">
                                    <span>45 + tools</span>
                                </div>
                            </div>
                            <div class="tool_body d-flex justify-content-between align-items-center my-2 gap-3">
                                <div>
                                    <p class="tool_name mb-0 fw-bolder">Image Tools</p>
                                    <span class="tool_descr">Solve Your Image Problems</span>
                                </div>
                                <div>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                            <div class="tool_footer mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Featured Tool :</span>
                                    <a href="" style="color: #F66213;">Remove BG</a>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col px-lg-1">
                    <div class="tool_items col" style="background-color: #D61C4E;">
                        <a href="" class="tool_content">
                            <div class="tool_header d-flex justify-content-between align-items-center">
                                <div class="tool_circle rounded-circle d-flex justify-content-center align-items-center" style="background-color: #E36587;">
                                    <i class="fa-regular fa-file-lines fs-5"></i>
                                </div>
                                <div class="tool_tag" style="background-color: #E36587;">
                                    <span>45 + tools</span>
                                </div>
                            </div>
                            <div class="tool_body d-flex justify-content-between align-items-center my-2 gap-3">
                                <div>
                                    <p class="tool_name mb-0 fw-bolder">Video Tools</p>
                                    <span class="tool_descr">Solve Your Video Problems</span>
                                </div>
                                <div>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                            <div class="tool_footer mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Featured Tool :</span>
                                    <a href="" style="color: #D61C4E;">Mute Video</a>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col px-lg-1">
                    <div class="tool_items col" style="background-color: #1C67CA;">
                        <a href="" class="tool_content">
                            <div class="tool_header d-flex justify-content-between align-items-center">
                                <div class="tool_circle rounded-circle d-flex justify-content-center align-items-center" style="background-color: #6598DB;">
                                    <i class="fa-regular fa-file-lines fs-5"></i>
                                </div>
                                <div class="tool_tag" style="background-color: #6598DB;">
                                    <span>45 + tools</span>
                                </div>
                            </div>
                            <div class="tool_body d-flex justify-content-between align-items-center my-2 gap-3">
                                <div>
                                    <p class="tool_name mb-0 fw-bolder">AI Write</p>
                                    <span class="tool_descr">Solve Your Text Problems</span>
                                </div>
                                <div>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                            <div class="tool_footer mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Featured Tool :</span>
                                    <a href="" style="color: #1C67CA;">Paragraph Writer</a>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col px-lg-1">
                    <div class="tool_items col" style="background-color: #247881;">
                        <a href="" class="tool_content">
                            <div class="tool_header d-flex justify-content-between align-items-center">
                                <div class="tool_circle rounded-circle d-flex justify-content-center align-items-center" style="background-color: #6AA3AA;">
                                    <i class="fa-regular fa-file-lines fs-5"></i>
                                </div>
                                <div class="tool_tag" style="background-color: #6AA3AA;">
                                    <span>45 + tools</span>
                                </div>
                            </div>
                            <div class="tool_body d-flex justify-content-between align-items-center my-2 gap-3">
                                <div>
                                    <p class="tool_name mb-0 fw-bolder">File Tools</p>
                                    <span class="tool_descr">Solve Your File Problems</span>
                                </div>
                                <div>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </div>
                            <div class="tool_footer mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Featured Tool :</span>
                                    <a href="" style="color: #247881;">Split Excel</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="static_con container d-flex justify-content-around align-items-center gap-3 my-5">
            <div class="static_item">
                <div class="static_num">1m</div>
                <div class="static_text">
                    <span>Active</span>
                    <span>User</span>
                </div>
            </div>
            <div class="static_item">
                <div class="static_num">10m</div>
                <div class="static_text">
                    <span>Files</span>
                    <span>Converted</span>
                </div>
            </div>
            <div class="static_item ">
                <div class="static_num">200+</div>
                <div class="static_text">
                    <span>Online</span>
                    <span>Tools</span>
                </div>
            </div>
            <div class="static_item ">
                <div class="static_num">500k</div>
                <div class="static_text">
                    <span>PDFs</span>
                    <span>Created</span>
                </div>
            </div>
        </div> -->
    </div>
</body>

</html>