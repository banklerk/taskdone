<?php $this->layout('layout'); ?>

<?php $this->insert('partials/navigation'); ?>

<main role="main">

    <section class="jumbotron text-center bg-white">
        <div class="container">
            <h1 class="jumbotron-heading">Проект Task-done</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <?php if (auth()->isLoggedIn()) : ?>
                <p class="nav-group">
                    <a href="/tasks/create" class="btn btn-warning my-2">
                        <span class="material-icons">add_task</span>
                        <span>Добавить запись</span>
                    </a>
                    <a href="/tasks" class="btn btn-dark my-2">
                        <span class="material-icons">dashboard</span>
                        <span>Мои записи</span>
                    </a>
                </p>
            <?php endif; ?>
           <span><?php echo flash(); ?></span>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php foreach ($data as $task) : ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card mb-4 shadow-sm">
                            <figure class="img-wrapper tasks-image">
                                <a class="tasks-image__hover" href="/tasks/<?php echo $task['id']; ?>">
                                    <span class="material-icons">image_search</span><br>
                                    <span>смотреть описание</span>
                                </a>
                                <img class="card-img-top" alt="task-img" src="<?php echo getImage($task['image']); ?>">
                            </figure>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo $task['title']; ?>
                                </p>
                                <div class="d-flex flex-column justify-content-between">
                                    <p class="title is-4">Добавил: <?php echo $task['username']; ?> </p>
                                    <time datetime="1970-1-1">Запись добавлена: <?php echo uploadedDate($task['date']); ?></time>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</main>

<?php
$this->insert('partials/footer');
