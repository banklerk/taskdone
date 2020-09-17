<?php $this->layout('layout'); ?>

<?php $this->insert('partials/navigation'); ?>

<div class="form-wrapper text-center">
    <form class="form-signin" action="/password-recovery" method="POST">
        <img class="mb-4" src="<?php echo ROOT_PATH . '/img/bootstrap-solid.svg'; ?>" alt="mainLogo"
             width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Восстановление пароля</h1>
        <?php echo flash(); ?>
        <p class="signin-item">
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email">
        </p>
        <div class="d-flex">
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                <span class="material-icons">mail</span>
                Отправить
            </button>
            <a class="btn btn-lg btn-secondary" href="/">
                <span class="material-icons">cancel</span>
                Отмена
            </a>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
</div>