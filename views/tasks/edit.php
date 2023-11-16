<div class="container ">
    <div class="row py-4">
        <h4 class="text-center">Task Edit</h4>
        <form action="/tasks/edit" method="post"
                class="col-8 mx-auto my-4">
            <div class="form-group my-2">
                <label >Title</label>
                <input type="text" class="form-control" name="title" value="<?= $task['title'] ?>" >
            </div>
            <div class="form-group my-2">
                <label >Label</label>
                <input type="text" class="form-control" name="label" value="<?= $task['label'] ?>" >
            </div>
            <div class="form-group my-2">
                <label >Status</label>
                <select class="form-control" name="is_done">
                    <option value="1">Done :)</option>
                    <option value="0" <?= $task['is_done'] ? : 'selected' ?>>Pending ...</option>

                </select>
            </div>
            <input name="task_id" value="<?= $task['id'] ?>" type="hidden">

            <button type="submit" class="btn btn-primary w-100 mt-2">Update</button>
        </form>
    </div>
</div>
