<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background: none;
        }
        .background-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.95);
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-custom {
            background-color: #764ba2;
            color: #fff;
            border-radius: 10px;
        }
        .btn-custom:hover {
            background-color: #5a3d88;
        }
    </style>
</head>
<body>
    <img src="https://theperfume.vn/wp-content/uploads/2013/12/banner-nuoc-hoa-chanel.jpg" alt="Background" class="background-img">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="text-center">
                        <h3 class="mb-3">Đăng Ký</h3>
                    </div>
                    <form action="?act=register" method="POST">
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger text-center">
                                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success text-center">
                                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-custom w-100">Đăng Ký</button>
                        <p class="text-center mt-3">Đăng Ký Với</p>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="me-3"><i class="fab fa-facebook-f fa-2x"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-google fa-2x"></i></a>
                            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Bạn Đã Có Tài Khoản? <a href="?act=login" class="text-decoration-none">Đăng Nhập</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>