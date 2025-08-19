
<div class="admin_menu_show">
<div class="container row addtools">
    <div class="col-8 add-tool">
        <form method="post" action="./server/request.php" class="row ">
            <h1 class="text-center">Add new Tool</h1>
            <div class="mb-3 col-6 ">
                <label for="tool_name" class="form-label">Tool Name</label>
                <input type="text" name="tool_name" class="form-control" id="tool_name" placeholder="enter tool name">
            </div>

            <div class="mb-3 col-6 ">
                <label for="icon_class_name" class="form-label">Tool Icon Class</label>
                <input type="text" name="icon_class_name" class="form-control" id="icon_class_name" placeholder="fa-solid fa-user">
            </div>

            <div class="mb-3 col-6 ">
                <div class="d-flex gap-3">
                    <div>
                        <label for="icon_color" class="form-label">Icon Color</label>
                        <input type="color" class="form-control form-control-color" id="icon_color" name="icon_color" value="#FF5975" title="Choose your color">

                    </div>
                    <div>
                        <label for="iconbg_color" class="form-label">Bg Icon Color</label>
                        <input type="color" class="form-control form-control-color" id="iconbg_color" name="bg_icon_color" value="#FFE0E6" title="Choose your color">

                    </div>
                </div>

            </div>


            <div class="mb-3 col-6 ">
                <label for="tool_description" class="form-label">Tool Description</label>
                <textarea name="tool_description" class="form-control" id="tool_description" placeholder="Enter Description"></textarea>
            </div>

            <div class="mb-3 col-6 ">
                <label for="tool_category" class="form-label">Tool Category</label>
                <?php
                include("tool_category.php");
                ?>
            </div>

            <div class="mb-3 col-6 ">
                <label for="tool_link" class="form-label">Tool Link</label>
                <input type="text" name="tool_link" class="form-control" id="tool_link" placeholder="tool link">
            </div>
            <div>
            <button type="submit" name="addtool" class="btn btn-primary btn col-3">Add Tool</button>

            </div>
        </form>
    </div>
    <div class="col-4 preview-tool d-flex flex-column align-items-center justify-content-center">
        <!-- <h4 class="mb-3">Live Preview</h4> -->
        <div class="d-flex ">
            <div class="tool_items" id="preview-card" style="background-color: #FFFFFF;">
                <a href="#" class="tool_content" onclick="event.preventDefault();">
                    <div class="tool_header d-flex justify-content-between align-items-center">
                        <div class="tool_circle rounded d-flex justify-content-center align-items-center" id="preview-icon-bg" style="background-color: #FFE0E6;">
                            <i class="fa-regular fa-file-lines fs-5" id="preview-icon" style="color: #FF5975;"></i>
                        </div>
                    </div>
                    <div class="tool_body d-flex justify-content-between align-items-center my-2 gap-3">
                        <div>
                            <p class="tool_name mb-0 fw-bolder text-black" id="preview-tool-name">Tool Name</p>
                            <span class="tool_descr text-black" id="preview-description">Tool Description</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-arrow-right text-black"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Input elements from the form
        const toolNameInput = document.getElementById('tool_name');
        const toolClassNameInput = document.getElementById('icon_class_name');
        const iconColorInput = document.getElementById('icon_color');
        const iconBgColorInput = document.getElementById('iconbg_color');
        const descriptionInput = document.getElementById('tool_description');

        // Preview elements on the right
        const previewCard = document.getElementById('preview-card');
        const previewToolName = document.getElementById('preview-tool-name');
        const previewIcon = document.getElementById('preview-icon');
        const previewIconBg = document.getElementById('preview-icon-bg');
        const previewDescription = document.getElementById('preview-description');

        // --- Event Listeners to update the preview in real-time ---

        toolNameInput.addEventListener('input', () => {
            previewToolName.textContent = toolNameInput.value || 'Tool Name';
        });

        descriptionInput.addEventListener('input', () => {
            previewDescription.textContent = descriptionInput.value || 'Tool Description';
        });

        toolClassNameInput.addEventListener('input', () => {
            // Update the icon class (e.g., "fa-solid fa-file-pdf")
            previewIcon.className = toolClassNameInput.value ? toolClassNameInput.value + ' fs-5' : 'fa-regular fa-file-lines fs-5';
        });

        iconColorInput.addEventListener('input', () => {
            previewIcon.style.color = iconColorInput.value;
        });

        iconBgColorInput.addEventListener('input', () => {
            previewIconBg.style.backgroundColor = iconBgColorInput.value;
        });
    });
</script>