<?php $this->layout('layout'); ?>

<?php $this->insert('partials/navigation'); ?>

<div class="form-wrapper text-center">
    <?php echo flash(); ?>
  <form class="form-signin" action="/login" method="post">
    <img class="mb-4" src="<?php echo ROOT_PATH.'/img/bootstrap-solid.svg'; ?>" alt="mainLogo"
      width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
    <p class="signin-item">
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email">
    </p>
    <p class="signin-item">
      <label for="inputPassword" class="sr-only">Пароль</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" name="password">
    </p>
    <p class="signin-item checkbox mb-3">
      <input id="remember" type="checkbox" name="remember">
      <label for="remember" class="checkbox">Запомнить меня</label>
    </p>
      <div class="d-flex">
          <button class="btn btn-lg btn-primary btn-block" type="submit">
              <span class="material-icons">login</span>
              Войти
          </button>
          <a class="btn btn-lg btn-secondary" href="/">
              <span class="material-icons">cancel</span>
              Отмена
          </a>
      </div>
      <a class="btn btn-lg btn-info btn-block" href="/register">
          <span class="material-icons">how_to_reg</span>
          Пройти регистрацию
      </a>
      <div class="recovery-group">
          <p class="recovery-btn">Забыли пароль? <b><a href="/password-recovery">Восстановление пароля</a></b></p>
          <p class="recovery-btn">Не пришло письмо подтверждения? <b><a href="/email-verification">Отправить повторно</a></b></p>
      </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
  </form>
</div>