<?php $this->layout('layout'); ?>

<?php $this->insert('partials/navigation'); ?>

<div class="form-wrapper text-center">
    <form class="form-signin" action="/password-recovery/change" method="POST">
        <input type="hidden" name="selector" value="<?= $data['selector'];?>">
        <input type="hidden" name="token" value="<?= $data['token'];?>">
        <img class="mb-4" src="<?php echo ROOT_PATH . '/img/bootstrap-solid.svg'; ?>" alt="mainLogo"
             width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Новый пароль</h1>
        <?php echo flash(); ?>
        <p class="signup-item">
            <label for="inputPassword" class="sr-only">Пароль</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль">
        </p>
        <p class="signup-item">
            <label for="inputRepeat" class="sr-only">Повторить пароль</label>
            <input id="inputRepeat" type="password" name="passRepeat" class="form-control" placeholder="Повторить пароль">
        </p>
        <div class="d-flex">
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                <span class="material-icons">mail</span>
                Отправить
            </button>
            <a class="btn btn-lg btn-link" href="/">
                <span class="material-icons">cancel</span>
                Отмена
            </a>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
</div>