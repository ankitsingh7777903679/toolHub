  <div class="py-5" style="background-color: #F4FAFE;">
      <div class="container pdf_tool_head d-flex flex-column justify-content-center align-items-center">
          <h1 class="mb-4">Image Tools</h1>
          <p>Free Online Image Tools</p>
      </div>
      <div class="container pdf_tool_body d-flex justify-content-center align-items-center mt-4">
          <form class="d-flex col-lg-6 search-tool mb-2 mb-lg-0 align-items-center shadow shadow-lg" role="search">
              <i class="fa-solid fa-magnifying-glass" style="color: #8B8D8F;"></i>
              <input class="search-tool-input form-control form-control-sm border border-0" type="search" placeholder="Search" aria-label="Search" style="background: none; color: #8B8D8F; ">
              <button class="search-tool-btn btn" type="submit">search</button>
          </form>
      </div>
      <div class="d-flex justify-content-center align-items-center mb-4 mt-5">
          <div class="container row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
              <!-- <h1 class="text-center">catogeries</h1> -->
              <?php
                include('./common/db.php');
                $query = "select * from tools where tool_category = 1";
                $result = $conn->query($query);
                foreach ($result as $row) {
                    $id = $row['tool_category'];
                    $tool_title;
                    if ($id == 1) {
                        $tool_title = 'Pdf Tools';
                    } else if ($id == 2) {
                        $tool_title = 'Image Tools';
                    } else if ($id == 3) {
                        $tool_title = 'AI Write';
                    } else if ($id == 4) {
                        $tool_title = 'Video Tools';
                    } else if ($id == 5) {
                        $tool_title = 'Converter Tools';
                    }
                    $tool_name =  ucfirst($row['toll_name']);
                    $icon_calss_name = $row['icon_class_name'];
                    $icon_color = $row['icon_color'];
                    $bg_icon_color = $row['bg_icon_color'];
                    $tool_description = $row['tool_description'];
                    $tool_link = $row['tool_link'];

                    echo "   
                                    <div class='tool_box_items col'>
                                        <div class='tool_item h-100 p-2 p-md-3' id='preview-card' style='background-color: #FFFFFF;  border-radius:15px'>
                                            <a href='$tool_link' class='tool_content'>
                                                <div class='tool_header d-flex flex-column flex-md-row align-items-start align-items-md-center gap-2 gap-md-3'>
                                                    <div>
                                                        <div class='tool_circle rounded d-flex justify-content-center align-items-center' id='preview-icon-bg' style='background-color: $bg_icon_color;'>
                                                            <i class='fa-regular fa-file-lines fs-5' id='preview-icon' style='color: $icon_color;'></i>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div>
                                                        <p class='tool_name mb-0 fw-bolder text-black' id='preview-tool-name' style='font-size: 14px;'>$tool_name</p>
                                                        <span ='tool_title' class='mb-0' style='font-size: 11px !important; color: $icon_color;'>$tool_title</span>
                                                    </div>
                                                </div>
                                                <div class='tool_body d-none d-md-block d-flex justify-content-between align-items-center my-2 gap-3'>
                                                    <div>
                                                        
                                                        <p class='tool_descr mb-0 text-black' style='font-size: 13px !important;' id='preview-description'>$tool_description</p>
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

  </div>