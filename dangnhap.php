<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/rose1.png" rel="icon">
  <title>The Rose Hotel - Đăng nhập</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>
<script>
    function submitformdn() {
        document.getElementById('xulydangnhap').submit();
    }

</script>
<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ĐĂNG NHẬP TÀI KHOẢN</h1>
                  </div>
                  <form class="user" action="xulydangnhap.php" method="post">
                    <div class="form-group">
                      <input type="text" name="user" id="user" class="form-control"  aria-describedby="emailHelp"
                        placeholder="Nhập tài khoản email">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" id="pass" class="form-control"  placeholder="Nhập mật khẩu của bạn">
                    </div>
                    <div class="form-group">
                      <!-- <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Nhớ lần đăng nhập</label>
                      </div> -->
                    </div>
                    <div class="form-group">
                      <!-- <a href="xulydangnhap.php" onclick='submitformdn()' class="btn btn-primary btn-block" style="background-color: #40679E;">Đăng nhập</a> -->
                      <button type="submit">Đăng nhập</button>
                    </div>
                    <!-- <hr>
                    <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" style="color: #D04848;" href="dangky.php">Đăng ký tài khoản</a>
                   
                  </div>
                  <div class="text-center">
                  <a class="font-weight-bold small" style="color: #D04848;" href="trangchu.php">Về trang chủ</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>
<style>
  .form-group{
    display: flex;
  }
  .form-group>button{
    width:100%;
    height: 40px;
    color: aliceblue;
    border: none;
    border-radius: 3px;
    font-size: larger;
    background-color: #40679E;
  }
</style>