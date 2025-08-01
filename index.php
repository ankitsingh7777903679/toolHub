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
        <div class="container container_tool">
            <div class="toll_tools d-flex flex-wrap justify-content-center align-items-center">
                <div class="tool_items">
                    <a href="" class="tool_content">
                        <div class="tool_header">
                            <div class="tool_circle">
                                <i class="fa-regular fa-file-lines fs-4" style="color: #f8e4e7ff;"></i>
                            </div>
                            <div class="tool_tag">
                                <span>45 + tools</span>
                            </div>
                        </div>
                        <div class="tool_body">
                            <div>
                                <p class="tool_name">PDF Tools</p>
                                <span class="tool_descr">Solve Your PDF Problems</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                        <div class="tool_footer">
                            <div>
                                <span>Featured Tool :</span>
                                <a href="">PDF Creator</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="tool_items"></div>
                <div class="tool_items"></div>
                <div class="tool_items"></div>
                <div class="tool_items"></div>
            </div>
        </div>
        <div class="container"></div>
    </div>
</body>
</html>