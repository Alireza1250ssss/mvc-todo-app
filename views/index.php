<section class=" my-3" style="background-color: #eee;">
    <div class="container py-5 ">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col col-lg-9 col-xl-7">

                <div class="card rounded-3">
                    <div class="card-body p-4">
                        <h3><?= "hello " . ($_SESSION['user']['full_name'] ?? 'welcome !') ?></h3>
                        <h4 class="text-center my-3 pb-3">To Do App</h4>
                        <?php if (!empty($_SESSION['user'])){
                        ?>
                        <form action="/tasks" method="post" enctype="multipart/form"
                                class=" flex-column row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                            <div class="col-12">
                                <div class="form-outline">
                                    <input type="text" name="title" class="form-control" />
                                    <label class="form-label" for="form1">Enter a task here</label>
                                </div>
                                <div class="form-outline">
                                    <input type="text" name="label" class="form-control" />
                                    <label class="form-label" for="form1">Enter a task Label</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-warning">Get tasks</button>
                            </div>
                        </form>
                        <?php } else {?>
                           <h5 class="text-info text-center"> Log in to create task</h5>
                        <?php } ?>
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Todo item</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Buy groceries for next week</td>
                                <td>In progress</td>
                                <td>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <button type="submit" class="btn btn-success ms-1">Finished</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Renew car insurance</td>
                                <td>In progress</td>
                                <td>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <button type="submit" class="btn btn-success ms-1">Finished</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Sign up for online course</td>
                                <td>In progress</td>
                                <td>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    <button type="submit" class="btn btn-success ms-1">Finished</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
