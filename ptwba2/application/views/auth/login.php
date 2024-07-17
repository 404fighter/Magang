
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Page</h3></div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="card-body">
                                        <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="text" placeholder="Enter email address" value="<?= set_value('email'); ?>"/>
                                                <label for="inputEmail">Email address</label>
                                                <?= form_error('email', '<small class="text-danger ps-2">', '</small>'); ?>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Type your password" />
                                                <label for="inputPassword">Password</label>
                                                <?= form_error('password', '<small class="text-danger ps-2">', '</small>'); ?>
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <button class="btn btn-primary ms-auto" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
