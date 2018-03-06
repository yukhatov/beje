<h1>Tasks</h1>
<br>
<div class="tab-feed">
    <div class="table-responsive">
        <table class="table" id="tasks">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data as $task) {
                        echo sprintf(
                            '<tr>
                                <form action="index.php?route=admin/edit" id="edit-form" method="post">
                                <input id="id-input" type="hidden" class="form-control" name="id" value="%s">
                                <td>%s</td>
                                <td>%s</td>
                                <td><p hidden>%s</p><input id="description-input" type="text" class="form-control" name="description" value="%s"></td>
                                <td><img src="images/%s"></td>
                                <td><p hidden>%s</p><input id="status-input" type="checkbox" class="form-check-input" name="status" %s></td>
                                <td><input id="button-save" type="submit" class="btn btn-primary" name="submit" value="Save"></td>
                                </form>
                            </tr>',
                            $task['id'],
                            $task['username'],
                            $task['email'],
                            $task['description'],
                            $task['description'],
                            $task['image'],
                            $task['status'],
                            $task['status'] ? 'checked' : ''
                        );
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="public/js/admin.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>

