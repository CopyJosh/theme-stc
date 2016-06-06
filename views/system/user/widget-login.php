<ul class="navbar account">

<?php if ($user->isAuthenticated()): ?>

            <li><?= __('Welcome, %username%', ['%username%' => $user->name]) ?></li>
            <li>|</li>
            <li><a href="@user/profile">Change Password</a></li>
            <li>|</li>
            <li><a href="<?= $view->url('@user/logout', ['redirect' => $redirect]) ?>"><?= __('Logout') ?></a></li>

<?php else: ?>

    <!-- This is an anchor toggling the modal -->
    <li><a href="#login-modal" data-uk-modal>Login</a></li>

<?php endif; ?>

</ul>


<!-- This is the modal -->
<div id="login-modal" class="uk-modal uk-width-1-1" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog">
        <button type="button" class="uk-modal-close uk-close"></button>

        <form class="uk-form uk-text-center" action="<?= $view->url('@user/authenticate') ?>" method="post">

            <div class="uk-modal-header">
                <h2>Account Login</h2>
            </div>

            <div class="uk-form-row">
                <input class="uk-width-1-2" type="text" name="credentials[username]" value="<?= $last_username ?>" placeholder="<?= __('username') ?>">
            </div>

            <div class="uk-form-row">
                <input class="uk-width-1-2" type="password" name="credentials[password]" value="" placeholder="<?= __('password') ?>">
            </div>

            <p>
                <label><input type="checkbox" name="remember_me"> <?= __('Remember Me') ?></label>
                <br><a href="<?= $view->url('@user/resetpassword') ?>"><?= __('Forgot Password?') ?></a>
                <?php if ($app->module('system/user')->config('registration') != 'admin'): ?>
                    <br><a href="<?= $view->url('@user/registration') ?>"><?= __('Sign up') ?></a>
                <?php endif ?>
            </p>

            <input type="hidden" name="redirect" value="<?= $redirect ?>">
            <?php $view->token()->get() ?>

            <div class="uk-modal-footer uk-text-right">
                <button type="button uk-modal-close" class="uk-button">Cancel</button>
                <button class="uk-button uk-button-primary" type="submit"><?= __('Login') ?></button>
            </div>

        </form>

    </div>
</div>