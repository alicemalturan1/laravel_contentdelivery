
<div style="display: none;">
    <div class="modal modal_default modal_login" id="modal-login">
        <div class="modal_wrap">
            <h2 class="title">Oturum Aç</h2>
            <form class="login_form" id="login_form">
                <div class="modal-form">
                    <div class="input-wrap white-label">
                        <input type="email" class="input" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-wrap white-label password-field">
                        <input type="password" class="input password-input" name="password" placeholder="Şifre" required>
                        <button class="show-password-btn" type="button"></button>
                    </div>
                    <div class="agreement">
                        <input type="checkbox" name="remember_me" class="agreement-checkbox" id="remember-1">
                        <label for="remember-1" class="agreement-label">
                            <span>
                                Beni Hatırla
                            </span>
                        </label>
                    </div>
                    <div class="error-message text-danger">

                    </div>
                    <button class="btn" type="submit">
                        <span>Giriş Yap</span>
                    </button>

                </div>
            </form>
            <div class="modal-info">
                <p><a href="#">Şifreni mi Unuttun?</a></p>
                <p>Hesabın Yok mu? <a data-href="#register_modal" class="getModal">Hemen Kayıt Ol</a></p>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>

<div style="display: none;">
    <div class="modal modal_default modal_registration" id="modal-registration">
        <div class="modal_wrap">
            <h2 class="title">Kayıt Ol</h2>
            <div class="modal-form">
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Email" name="email">
                </div>
                <div class="input-wrap white-label password-field">
                    <input type="password" class="input password-input" placeholder="Password">
                    <button class="show-password-btn"></button>
                </div>
                <div class="agreement">
                    <input type="checkbox" class="agreement-checkbox" id="agree-1">
                    <label for="agree-1" class="agreement-label">
                            <span>
                                I accept the conditions of transmitting information
                            </span>
                    </label>
                </div>
                <button class="btn submit-btn">
                    <span>Sign up</span>
                </button>
                <div class="authorization-socials">
                    <div class="authorization-socials-variants">
                        <div class="socials">
                            <div class="soc-link">
                                <img src="/assets/img/facebook-icon.svg" class="img-svg" alt="">
                            </div>
                            <div class="soc-link">
                                <img src="/assets/img/twitter-soc-icon.svg" class="img-svg" alt="">
                            </div>
                            <div class="soc-link">
                                <img src="/assets/img/behance-icon.svg" class="img-svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-info">
                <p>Have an account? <a href="#modal-login" class="getModal">Sign in your right now.</a></p>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>

<div style="display: none;">
    <div class="modal modal_default modal_reset" id="modal-reset-password">
        <div class="modal_wrap">
            <h2 class="title">Forgot password?</h2>
            <div class="subtitle">
                Use the e-mail and password that you specified when registering on the site
            </div>
            <div class="modal-form">
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Email">
                </div>
                <button class="btn submit-btn">
                    <span>Reset Password</span>
                </button>
            </div>
            <div class="modal-info">
                <p>Don’t have an account? <a data-href="#modal-registration" class="getModal">Create your own right now.</a></p>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>

<div style="display: none;">
    <div class="modal modal_default modal_success" id="modal-success">
        <div class="modal_wrap">
            <div style="display: flex;width: 100%;justify-content: center">
                <div class="success-icon "></div>

            </div>
            <div class="success_text">

            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>
<div style="display: none;">
    <div class="modal modal_default " id="modal-alert">
        <div class="modal_wrap">

            <h2 class="title">Dikkat</h2>
            <div class="subtitle">
                Your message was successfully sent. We will contact you shortly
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>
<div style="display: none;">
    <div class="modal modal_default modal_order" id="book-now">
        <div class="modal_wrap">
            <h2 class="title">Please fill in this quick form</h2>
            <div class="subtitle">
                Your personal travel expert will get back to you in a few hours to introduce themselves and start planning an exceptional holiday experience with you.
            </div>
            <div class="modal-form">
                <div class="input-wrap date-wrap white-label">
                    <input type="text" class="input js_calendar" placeholder="When would you like to travel?" readonly>
                </div>
                <div class="input-wrap date-wrap white-label">
                    <input type="text" class="input js_calendar" placeholder="When do you plan to come back?" readonly>
                </div>
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Name">
                </div>
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Surname">
                </div>
                <div class="input-wrap white-label">
                    <input type="tel" class="input js-tel" placeholder="Contact Number">
                </div>
                <div class="input-wrap white-label">
                    <input type="email" class="input" placeholder="Email Address">
                </div>
                <div class="input-wrap white-label fullwidth">
                    <textarea class="input textarea" placeholder="More details about your trip"></textarea>
                </div>
                <div class="agreement">
                    <input type="checkbox" class="agreement-checkbox" id="agree-1b">
                    <label for="agree-1b" class="agreement-label">
                            <span>
                                I accept the conditions of transmitting information
                            </span>
                    </label>
                </div>
                <button class="btn submit-btn">
                    <span>Submit</span>
                </button>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>

<div style="display: none;">
    <div class="modal modal_default modal_order" id="register_modal">
        <form id="register_form">
            <div class="modal_wrap">
                <h2 class="title">Kayıt Formu</h2>
                <div class="subtitle">
                    Lütfen hakkınızdaki bilgileri doğru girdiğinizden emin olunuz.
                </div>
                <div class="modal-form">
                    <div class="input-wrap white-label">
                        <input type="text" class="input" name="name" placeholder="Adınız" required>
                    </div>
                    <div class="input-wrap white-label">
                        <input type="text" class="input" name="surname" placeholder="Soyadınız" required>
                    </div>
                    <div class="input-wrap white-label">
                        <input type="email" class="input" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-wrap white-label">
                        <input type="password" class="input password-input" name="password" placeholder="Şifreniz">
                        <button class="show-password-btn"></button>
                    </div>
                    <div class="input-wrap white-label fullwidth">
                        <textarea  name="about" class="input textarea" placeholder="Kendinizi Tanıtın (Opsiyonel)"></textarea>
                    </div>
                    <div class="agreement">
                        <input type="checkbox" name="contract" class="agreement-checkbox" id="agree-1c" required>
                        <label for="agree-1c" class="agreement-label">
                            <span>
                               <a href="/privacy" target="_blank">Üyelik Sözleşmesi</a>ni Kabul Ediyorum
                            </span>
                        </label>
                    </div>
                    <button class="btn" type="submit">
                        <span>Kayıt Ol</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="modal_close"></div>
    </div>
</div>





<div class="bottom-message success-message" id="success-message">
        <span>
            Thanks! Your subscription <br>has been successfully issued
        </span>
</div>

<div class="bottom-message error-message" style="z-index: 999999999;" id="error-message">
        <span class="error-text">

        </span>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
