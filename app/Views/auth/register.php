<?php $this->layout('layout'); ?>

<?php $this->insert('partials/navigation'); ?>

<div class="form-wrapper text-center">
  <?php echo flash(); ?>
  <form class="form-signin" action="/register" method="POST">
    <img class="mb-4" src="<?php echo ROOT_PATH.'/img/bootstrap-solid.svg'; ?>" alt=""
      width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
    <p class="signup-item">
      <label for="inputUsername" class="sr-only">Имя</label>
      <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Имя">
    </p>
    <p class="signup-item">
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email">
    </p>
    <p class="signup-item">
      <label for="inputPassword" class="sr-only">Пароль</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль">
    </p>
    <p class="signup-item">
      <label for="inputRepeat" class="sr-only">Повторить пароль</label>
      <input id="inputRepeat" type="password" name="passRepeat" class="form-control" placeholder="Повторить пароль">
    </p>
    <p class="sigup-item terms">
      <input id="terms" type="checkbox" name="terms">
      <label for="terms" class="checkbox">Я согласен с <a href="#">правилами сайта</a></label>
    </p>
    <button class="btn btn-lg btn-primary btn-block" type="submit">
        <span class="material-icons">how_to_reg</span>
        Зарегистрироваться
    </button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
  </form>
</div>