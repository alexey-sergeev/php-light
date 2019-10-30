<div class="container p-4 bg-light">

    <h4>Комментарии</h4>

    <hr>

        <?php show_comments(); ?>

    <hr>

    <div class="pt-3 pb-3">

    <h5 class="mb-4">Добавить комментарий</h5>

        <form method="post">

            <div class="form-group">
                <label for="name">Ваше имя:</label>
                <input type="text" class="form-control w-50" id="name" name="name">
            </div>

            <?php show_radio_avatars(); ?>

            <div class="form-group">
                <label for="comment">Текст комментария:</label>
                <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="new_comment" value="yes">Отправить</button>

        </form>

    </div>

</div>
