<?php $this->layout('layout'); ?>

<?php $this->insert('partials/navigation'); ?>

<div class="form-wrapper text-center bg-light">
    <img class="task-image" src="<?php echo getImage($task['image']); ?>" alt="task-image">
    <h2><?php echo $task['title']; ?></h2>
    <p><?php echo $task['content']; ?></p>
    <a class="btn btn-lg btn-secondary" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
        <span class="material-icons">keyboard_return</span>
        Назад
    </a>
</div>

<?php
$this->insert('partials/footer');
