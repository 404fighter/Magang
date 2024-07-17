<!-- 
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form class="user" method="post" action="<?= base_url(); ?>auth/registration">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Full Name" value="<?= set_value('nama'); ?>"/>
                                                <label for="inputEmail">Full Name</label>
                                                <?= form_error('nama', '<small class="text-danger ps-2">', '</small>'); ?>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" name="email" type="text" placeholder="name@example.com" value="<?= set_value('email'); ?>"/>
                                                <label for="inputEmail">Email address</label>
                                                <?= form_error('email', '<small class="text-danger ps-2">', '</small>'); ?>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password1" name="password1" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                        <?= form_error('password1', '<small class="text-danger ps-2">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password2" name="password2" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?= base_url(); ?>auth">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <br><br><br>
            </div>
        </div> -->
