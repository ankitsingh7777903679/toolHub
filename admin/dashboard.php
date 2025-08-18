<div class="p-3 deshboard">
    <h2>Dashboard</h2>
    <p>Welcome to the admin dashboard. Here are some stats:</p>
    <div>
        <div class="">
            <div class="row gap-4">
                <div class="card bg-white border-0 mb-3 p-3 col">
                    <div><i class="fa-solid fa-users fa-rotate-by fs-3 p-2 rounded icon" ></i></i></div>
                    <div class="">
                        <h5 class="mt-3 mb-2 fs-2">
                            <?php
                            // The database connection is now expected to be included by the parent script (admin.php)
                            $query = "SELECT COUNT(id) AS total_users FROM users";
                            $result = $conn->query($query);
                            $user_count = 0;
                            if ($result) {
                                $row = $result->fetch_assoc();
                                $user_count = $row['total_users'];
                            }
                            echo $user_count;
                            ?>
                        </h5>
                        <p class="">Total registered users.</p>
                    </div>
                </div>

                <div class="card bg-white border-0 mb-3 p-3 col">
                    <div><span class="material-symbols-outlined fs-3 p-2 rounded icon" >handyman</span></div>
                    <div class="">
                        <h5 class="mt-3 mb-2 fs-2">
                            <?php
                            // The database connection is now expected to be included by the parent script (admin.php)
                            $query = "SELECT COUNT(id) AS total_tools FROM tools";
                            $result = $conn->query($query);
                            $user_count = 0;
                            if ($result) {
                                $row = $result->fetch_assoc();
                                $user_count = $row['total_tools'];
                            }
                            echo $user_count;
                            ?>
                        </h5>
                        <p class="">Total tools</p>
                    </div>
                </div>

                <div class="card bg-white border-0 mb-3 p-3 col">
                    <div>
                            <i class="fa-solid fa-layer-group fs-3 p-2 rounded icon" ></i>
                    </div>
                    <div class="">
                        <h5 class="mt-3 mb-2 fs-2">
                            <?php
                            // The database connection is now expected to be included by the parent script (admin.php)
                            $query = "SELECT COUNT(id) AS tool_category FROM tool_category";
                            $result = $conn->query($query);
                            $user_count = 0;
                            if ($result) {
                                $row = $result->fetch_assoc();
                                $user_count = $row['tool_category'];
                            }
                            echo $user_count;
                            ?>
                        </h5>
                        <p class="">Types of tools</p>
                    </div>
                </div>
            </div>
            <!-- You can add more stats cards for tools, etc. here -->
        </div>
    </div>
</div>