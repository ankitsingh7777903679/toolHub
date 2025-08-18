<?php
// Centralized logic and database connection
include_once("./common/db.php");

// Determine which page to show.
$page = 'dashboard'; // Default page
if (isset($_GET['page'])) {
    $allowed_pages = ['dashboard', 'tools', 'users', 'addtool'];
    if (in_array($_GET['page'], $allowed_pages, true)) {
        $page = $_GET['page'];
    }
}
?>
<div class="admin" style="height: 100vh; background-color: #FFFFFF;">
    <div class="row mx-0 " style="height: 100vh;">
        <div class="col-2 p-3 admin_menu border-secondary-subtle border-end d-flex flex-column justify-content-between">
            <div>
                <div>
                    <h2 style="text-decoration: none; color: #111928;">Admin Panel</h2>
                </div>
                <div>
                    <ul class="nav flex-column">
                        <li class="nav-item ">
                            <a class="nav-link <?php echo ($page === 'dashboard') ? 'active' : ''; ?>" href="?admin=true&page=dashboard"> <span class="material-symbols-outlined">dashboard</span> Dashboard</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page === 'addtool') ? 'active' : ''; ?>" href="?admin=true&page=addtool"> <span class="material-symbols-outlined">handyman</span> Add Tool</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page === 'users') ? 'active' : ''; ?>" href="?admin=true&page=users"><i class="fa-solid fa-users"></i>Users</a>

                        </li>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="user-panel mb-0 border-top">
                
                <ul class="ps-0">

                    <li class="my-2 pb-1">
                        <a class="dropdown-item d-flex align-items-center gap-3 px-0">
                            <button class="btn btn-secondary user-avtar-inner rounded-circle fs-6 fw-bolder">
                                <i class="fa-regular fa-user"></i>
                            </button>
                            <div>
                                <p class="mb-0"><?php echo ucfirst($_SESSION['user']['username']); ?></p>
                                <p class="mb-0 user-avtar-email">
                                    <?php echo substr($_SESSION['user']['email'], 0, 18) . '...'; ?>
                                </p>
                            </div>

                        </a>
                    </li>
                    <li><a class="dropdown-item px-1 mt-1 py-0 text-start text-danger" href="./server/request.php?logout=true">
                            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Log out</a>
                    </li>

                </ul>
            </div>

        </div>
        <div class="col-10 " style="background-color: #F3F4F6;">
            <?php
            // Simple and secure router
            switch ($page) {
                case 'addtool':
                    include('./admin/addTool.php');
                    break;
                case 'users':
                    include('./admin/users.php');
                    break;
                case 'dashboard':
                default:
                    include('./admin/dashboard.php');
                    break;
            }
            ?>
        </div>
    </div>
</div>