<div id="modal">
        <div class="modal" id="notification" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="text-secondary">Tính năng này hiện đang trong giai đoạn phát triển</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="signin" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Đăng nhập</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInputSignin" placeholder="name@example.com">
                            <label for="floatingInputSignin">Địa chỉ email</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPasswordSignin" placeholder="Password">
                            <label for="floatingPasswordSignin">Mật khẩu</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-bs-toggle="modal" id="signin-btn">Đăng nhập</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#notification">Quên mật khẩu</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="signup" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Đăng ký</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInputSignup" placeholder="name@example.com">
                            <label for="floatingInputSignup">Địa chỉ email</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingNameSignup" placeholder="name">
                            <label for="floatingNameSignup">Tên</label>
                        </div>
                        <div class="form-floating">
                            <input type="date" class="form-control" id="floatingBirthSignup">
                            <label for="floatingBirthSignup">Ngày sinh</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPasswordSignup" placeholder="Password">
                            <label for="floatingPasswordSignup">Mật khẩu</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingReEnterPasswordSignup" placeholder="Password">
                            <label for="floatingReEnterPasswordSignup">Nhập lại mật khẩu</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-bs-toggle="modal" id="signup-btn">Đăng ký</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>

                </div>
            </div>
        </div>
    </div>