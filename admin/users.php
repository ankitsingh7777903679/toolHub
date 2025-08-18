<?php
// This file is included from admin.php, which is included from the root index.php
// The database connection is now expected to be included by the parent script (admin.php)

// Fetch all users from the database, newest first
$query = "SELECT id, username, email FROM users ORDER BY id DESC";
$result = $conn->query($query);
?>

<div class="container-fluid p-4">
    <h2 class="mb-4">User Management</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && $result->num_rows > 0) {
                            $count = 1;
                            // Using htmlspecialchars to prevent XSS vulnerabilities
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $count++; ?></th>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px; background-color: #e9ecef; color: #495057; border-radius: 50%;">
                                            <?php echo ucfirst(substr(htmlspecialchars($row['username']), 0, 1)); ?>
                                        </div>
                                    </td>
                                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5" class="text-center p-4">No users found.</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>