<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>        <?= Flasher::flash() ?>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="<?= BASEURL ?>/users/login_prosess"
                                    method="post" class="user">
                                        <div class="form-group">
                                            <input type="email"
                                            class="form-control
                                            form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email
                                                Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                            class="form-control
                                            form-control-user" name="password"
                                                id="exampleInputPassword"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox"
                                                name="checkbox"
                                                class="custom-control-input"
                                                id="customCheck">
                                                <label
                                                class="custom-control-label"
                                                for="customCheck" required>Remember
                                                    Me</label>
                                            </div>
                     <input type="hidden" name="users" value="member">                   </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user
                                        btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= BASEURL ?>/users/forgot_password">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small"
                                        href="<?= BASEURL ?>/users/register">Create an
                                        Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
