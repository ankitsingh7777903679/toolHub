  <div class="py-3" style="background-color: #F4FAFE;">
        <div class="container pdf_tool_head d-flex flex-column justify-content-center align-items-center">
            <h1 class="mb-4">Ai Write</h1>
            <p>Free Ai Writing Tools</p>
        </div>
        <div class="container pdf_tool_body d-flex justify-content-center align-items-center mt-4">
            <form class="d-flex col-lg-6 search-tool mb-2 mb-lg-0 align-items-center shadow shadow-lg" role="search">
                <i class="fa-solid fa-magnifying-glass" style="color: #8B8D8F;"></i>
                <input class="search-tool-input form-control form-control-sm border border-0" type="search" placeholder="Search" aria-label="Search" style="background: none; color: #8B8D8F; ">
                <button class="search-tool-btn btn" type="submit">search</button>
            </form>
        </div>
        <div class="container d-flex flex-wrap gap-2 mt-5 pt-3">
                            <!-- <h1 class="text-center">catogeries</h1> -->
                            <?php
                            include('./common/db.php');
                            $query = "select * from tools where tool_category = 3";
                            $result = $conn->query($query);
                            foreach ($result as $row) {
                                $id = $row['id'];
                                $tool_name =  $row['toll_name'];
                                $icon_calss_name = $row['icon_class_name'];
                                $icon_color = $row['icon_color'];
                                $bg_icon_color = $row['bg_icon_color'];
                                $tool_description = $row['tool_description'];
                                $tool_link = $row['tool_link'];

                                echo "   
                                    <div class='d-flex' style='border-radius: 15px;'>
                                        <div class='tool_items' id='preview-card' style='background-color: #FFFFFF; width: 210px;'>
                                            <a href='$tool_link' class='tool_content'>
                                                <div class='tool_header d-flex justify-content-between align-items-center'>
                                                    <div class='tool_circle rounded d-flex justify-content-center align-items-center' id='preview-icon-bg' style='background-color: $bg_icon_color;'>
                                                        <i class='fa-regular fa-file-lines fs-5' id='preview-icon' style='color: $icon_color;'></i>
                                                    </div>
                                                </div>
                                                <div class='tool_body d-flex justify-content-between align-items-center my-2 gap-3'>
                                                    <div>
                                                        <p class='tool_name mb-0 fw-bolder text-black' id='preview-tool-name'>$tool_name</p>
                                                        <span class='tool_descr text-black' id='preview-description'>$tool_description</span>
                                                    </div>
                                                    <div>
                                                        <i class='fa-solid fa-arrow-right text-black'></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                ";
                            }
                            ?>
                        </div>
    </div>
