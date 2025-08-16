<div class="container admin">
    <h1>Admin</h1>
    <?php echo ucfirst($_SESSION['user']['username'][0]);
    // echo ucfirst($_SESSION['user']['email']);
    // print_r($_SESSION);
    ?>
    <ul class="">
        <p class="my-auto">admin</p>
        <li>
            <a class="dropdown-item d-flex align-items-center justify-content-center gap-2 px-0">
                <button class="btn btn-secondary user-avtar-inner rounded-circle fs-6 fw-bolder">
                    <i class="fa-regular fa-user"></i>
                </button>
                <p class="mb-0 user-avtar-email">
                    <?php echo substr($_SESSION['user']['email'], 0, 18) . '...'; ?>
                </p>
            </a>
        </li>
        <li><a class="dropdown-item border border-danger rounded mt-1 py-0 text-center text-danger" href="./server/request.php?logout=true">logout</a></li>
        <a href="?home=true" target="./client/home.php" rel="noopener noreferrer">back</a>
    </ul>
</div>