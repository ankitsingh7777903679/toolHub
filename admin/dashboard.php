<div class="p-3 deshboard">
    <h2>Dashboard</h2>
    <p>Welcome to the admin dashboard. Here are some stats:</p>
    <div>
        <div class="">
            <div class="row row-cols-3 g-5">
                <!-- total users -->
                <div class="col">
                    <div class="card bg-white border-0 mb-3 p-3 ">
                        <div><i class="fa-solid fa-users fa-rotate-by fs-3 p-2 rounded icon"></i></i></div>
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
                </div>

                <!-- total tools -->
                <div class="col">
                    <div class="card bg-white border-0 mb-3 p-3">
                        <div><span class="material-symbols-outlined fs-3 p-2 rounded icon">handyman</span></div>
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
                </div>

                <!-- total tool categories -->
                <div class="col">
                    <div class="card bg-white border-0 mb-3 p-3 col">
                        <div>
                            <i class="fa-solid fa-layer-group fs-3 p-2 rounded icon"></i>
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


                <!-- total pdf tools -->
                <div class="col">
                    <div class="card bg-white border-0 mb-3 p-3">
                        <div>
                            <i class="fa-regular fa-file-pdf fs-3 p-2 rounded icon"></i>
                        </div>
                        <div class="">
                            <h5 class="mt-3 mb-2 fs-2">
                                <?php
                                // The database connection is now expected to be included by the parent script (admin.php)
                                $query = "SELECT COUNT(tool_category) AS tool_category FROM tools where tool_category= 1";
                                $result = $conn->query($query);
                                $user_count = 0;
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    $user_count = $row['tool_category'];
                                }
                                echo $user_count;
                                ?>
                            </h5>
                            <p class="">Total Pdf tools</p>
                        </div>
                    </div>
                </div>

                <!-- total Ai writing tools -->
                <div class="col">
                    <div class="card bg-white border-0 mb-3 p-3 col">
                        <div>
                            <i class="fa-solid fa-pen-nib fs-3 p-2 rounded icon"></i>
                        </div>
                        <div class="">
                            <h5 class="mt-3 mb-2 fs-2">
                                <?php
                                // The database connection is now expected to be included by the parent script (admin.php)
                                $query = "SELECT COUNT(tool_category) AS tool_category FROM tools where tool_category= 3";
                                $result = $conn->query($query);
                                $user_count = 0;
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    $user_count = $row['tool_category'];
                                }
                                echo $user_count;
                                ?>
                            </h5>
                            <p class="">Total Writing tools</p>
                        </div>
                    </div>
                </div>

                <!-- total Image tools -->
                <div class="col">
                    <div class="card bg-white border-0 mb-3 p-3 col">
                        <div>
                            <i class="fa-solid fa-image fs-3 p-2 rounded icon"></i>
                        </div>
                        <div class="">
                            <h5 class="mt-3 mb-2 fs-2">
                                <?php
                                // The database connection is now expected to be included by the parent script (admin.php)
                                $query = "SELECT COUNT(tool_category) AS tool_category FROM tools where tool_category= 2";
                                $result = $conn->query($query);
                                $user_count = 0;
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    $user_count = $row['tool_category'];
                                }
                                echo $user_count;
                                ?>
                            </h5>
                            <p class="">Total Image tools</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- You can add more stats cards for tools, etc. here -->
        </div>
    </div>
</div>