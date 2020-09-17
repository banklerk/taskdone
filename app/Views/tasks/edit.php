<?php $this->layout('layout'); ?>

<?php $this->insert('partials/navigation'); ?>

<div class="form-wrapper text-center">
    <form class="form-signin" action="/tasks/<?php echo $task['id']; ?>/update" method="post"
          enctype="multipart/form-data">
        <img class="mb-4" src="<?php echo ROOT_PATH . '/img/bootstrap-solid.svg'; ?>" alt="logo-image" width="72"
             height="72">
        <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>
        <?php echo flash(); ?>
        <label for="title" class="sr-only">Название</label>
        <input id="title" name="title" type="text" class="form-control" placeholder="Название"
               value="<?php echo $task['title']; ?>">
        <label for="content" class="sr-only">Описание</label>
        <textarea name="content" class="form-control" cols="30" rows="10"
                  placeholder="Описание"><?php echo $task['content']; ?></textarea>
        <input type="file" name="image">
        <img src="<?php echo getImage($task['image']); ?>" alt="task-image" width="300" class="mb-3">
        <div class="d-flex">
            <button class="btn btn-lg btn-success btn-block" type="submit">
                <span class="material-icons">save_alt</span>
                Отправить
            </button>
            <a class="btn btn-lg btn-secondary" href="<?php echo APP_PATH; ?>">
                <span class="material-icons">keyboard_return</span>
                Назад
            </a>
        </div>

        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
</div>
