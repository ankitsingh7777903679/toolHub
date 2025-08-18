<select name="tool_category" id="tool_category" class="form-control">
    <option value="">Select A category</option>
    <?php
        // The database connection is now expected to be included by the parent script (admin.php or addTool.php)
        $query="select * from tool_category";
        $result=$conn->query($query);
        foreach($result as $row){
             $id = $row['id'];
             $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');

            echo "<option name='tool_category' value=\"$id\">$name</option>";
        }
    ?>
</select>