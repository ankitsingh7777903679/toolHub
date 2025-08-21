<?php
// 1. Check for Admin user first
if (isset($_SESSION['user']['email']) && $_SESSION['user']['email'] == "ankitsingh77779036@gmail.com" && isset($_SESSION['user']['password']) && $_SESSION['user']['password'] == "ankit@1234") { ?>

    <div class="dropdown user-panel ms-3">
        <a href="?admin=true" class="btn btn-secondary user-avtar rounded-circle fs-6 fw-bolder">
            <?php echo ucfirst($_SESSION['user']['username'][0]);
            // echo ucfirst($_SESSION['user']['email']);
            // print_r($_SESSION);
            ?>
        </a>
        <ul class="dropdown-menu end-0">

            <li class="border-bottom my-2 pb-1">
                <a class="dropdown-item d-flex align-items-center justify-content-center gap-3 px-0">
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

<?php // 2. Then, check for a regular logged-in user

} else if (isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['username'])) { ?>
    <div class="dropdown user-panel ms-3">
        <button class="btn btn-secondary user-avtar rounded-circle fs-6 fw-bolder" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo ucfirst($_SESSION['user']['username'][0]);
            // echo ucfirst($_SESSION['user']['email']);
            // print_r($_SESSION);
            ?>
        </button>
        <ul class="dropdown-menu end-0">

            <li class="border-bottom my-2 pb-1">
                <a class="dropdown-item d-flex align-items-center justify-content-center gap-3 px-0">
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
<?php // 3. Finally, show the sign-in button for guests

} else { ?>

    <button class="btn btn-primary ms-1" data-bs-toggle="modal" data-bs-target="#signInModal" type="button">Sign In</button>
    <!-- Sign In Modal -->
    <div class="modal" id="signInModal" aria-labelledby="signInModalLabel" tabindex="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 w-100 text-center" id="signInModalLabel">Login to ToolHub</h1>
                </div>
                <div class="modal-body">
                    <button type="button d-flex align-items-center gap-2" class="btn btn-outline-secondary w-100">
                        <img src="./svg/google-color-svgrepo-com.svg" alt="google" width="24" height="24">

                        <span>Login with Google</span>
                    </button>
                    <form method="post" action="./server/request.php" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="signInEmail" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="signInEmail" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="signInPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="signInPassword" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" name="login" type="submit">Sign In</button>

                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p class="mb-0">Don't have an account?
                            <a href="#" data-bs-target="#signUpModal" data-bs-toggle="modal">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up Modal -->
    <div class="modal" id="signUpModal" aria-labelledby="signUpModalLabel" tabindex="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5 w-100 text-center" id="signUpModalLabel">Create Account</h1>
                </div>
                <div class="modal-body">
                    <button type="button d-flex align-items-center gap-2" class="btn btn-outline-secondary w-100">
                        <img src="./svg/google-color-svgrepo-com.svg" alt="google" width="24" height="24">
                        <span>Sign Up with Google</span>
                    </button>
                    <form method="post" action="./server/request.php" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="username" class="form-label">user name</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="enter username" require>
                        </div>
                        <div class="mb-3">
                            <label for="signUpEmail" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="signUpEmail" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="signUpPassword" class="form-label">Create Password</label>
                            <input type="password" name="password" class="form-control" id="signUpPassword" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                            <label class="form-check-label" for="agreeTerms">I agree to the Terms and Privacy Policy</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" name="signup" type="submit">Create Account</button>

                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p class="mb-0">Already have an account?
                            <a href="#" data-bs-target="#signInModal" data-bs-toggle="modal">Sign In</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>