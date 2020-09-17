<?php $this->layout('layout'); ?>

<?php $this->insert('partials/navigation'); ?>

<div class="form-wrapper text-center">
    <img class="mb-4" src="<?php echo ROOT_PATH.'/img/bootstrap-solid.svg'; ?>" alt="mainLogo" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>
    <?php echo flash(); ?>
    <form method="POST" action="/tasks/store" class="form-signin" enctype="multipart/form-data">
        <label for="title" class="sr-only">Название</label>
        <input class="form-control" type="text" id="title" name="title" placeholder="Название">
        <label for="content" class="sr-only">Описание</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Описание"></textarea>
        <input name="image" type="file">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
    </form>

    <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
</div>
