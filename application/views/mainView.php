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
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data['tasks'] as $task) {
                        echo sprintf(
                            '<tr>
                                <td>%s</td>
                                <td>%s</td>
                                <td>%s</td>
                                <td><img src="images/%s"></td>
                                <td>%s</td>
                            </tr>',
                            $task['username'],
                            $task['email'],
                            $task['description'],
                            $task['image'],
                            $task['status'] ? 'Done' : 'Inprogress'
                        );
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    if ($data['error']) {
        echo sprintf('<br>
            <div class="alert alert-danger">
                <strong>Task not saved!</strong> %s.
            </div>', $data['error']);
    }
?>

<h1>Create New</h1>

<form action="index.php?route=main/create" id="operation-form" method="post" enctype="multipart/form-data">
    <div id="username" class="col-md-3 col-sm-6 col-xs-12">
        <label>Username:</label>
        <input id="username-input" type="text" class="form-control" name="username">

        <label>Email:</label>
        <input id="email-input" type="text" class="form-control" name="email">

        <label>Description:</label>
        <textarea id="description-input" class="form-control" name="description"></textarea>

        <label>Image:</label>
        <input id="image-input" type="file" class="form-control" name="image">
        <br>
        <input id="button-save" type="submit" class="btn btn-primary" name="submit" value="Add" style="width: 30%">
        <button type="button" class="btn" onclick="showPopup()">Preview</button>
    </div>
</form>

<div class="popup" onclick="showPopup()">
    <table class="popuptext" id="myPopup">
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td id="preview-username"></td>
                <td id="preview-email"></td>
                <td id="preview-description"></td>
            </tr>
        </tbody>
    </table>
</div>

<script src="public/js/task.js"></script>
<link rel="stylesheet" href="public/css/task.css">

