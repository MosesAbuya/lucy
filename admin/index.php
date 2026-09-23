<?php
require_once 'config.php';
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Hardcoded auth check
    if ($email === ADMIN_EMAIL && password_verify($password, ADMIN_PASSWORD_HASH)) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Lucy Mworia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="d-flex align-items-center py-4 bg-dark">
    <main class="form-signin w-100 m-auto" style="max-width: 400px; padding: 15px;">
        <form method="POST">
            <h1 class="h3 mb-3 fw-normal text-white text-center" style="font-family: var(--font-heading);">Admin Portal</h1>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput" style="color: #666;">Email address</label>
            </div>

            <div class="input-group mb-3">
                <div class="form-floating flex-grow-1">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" style="border-top-right-radius: 0; border-bottom-right-radius: 0;" required>
                    <label for="floatingPassword" style="color: #666;">Password</label>
                </div>
                <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-color: #dee2e6; background: #fff; color: #666; border-left: none;">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <button class="w-100 btn-gold-solid py-2" type="submit">Sign in</button>
        </form>
    </main>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#floatingPassword');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
