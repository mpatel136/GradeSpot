<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <title>Create new session</title>
</head>

<body>
    <div class="container">

        <?php if (isset($data['error']))
            echo "<div class='alert alert-danger' role='alert'>$data[error]</div>";
        ?>
        <h1>Create a GradeSpot Session</h1>
        <form action="" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="university_id">University</label>
                <input type="text" class="form-control" name="university_id" id="university_id" />
                <select name="university" id="university">
                    <option value="concordia">Concordia</option>
                    <option value="harvard">Harvard</option>
                </select>
            </div>
            <div class="form-group">
                <label for="program_id">Program</label>
                <input type="text" class="form-control" name="program_id" id="program_id" />
            </div>
            <div class="form-group">
                <label for="subject_id">Subject</label>
                <input type="text" class="form-control" name="subject_id" id="subject_id" />
            </div>
            <div class="form-group">
                <label for="is_private">Private</label>
                <input type="checkbox" class="form-control" value="1" name="is_private" id="is_private" />
            </div>
            <div class="form-group">
                <label for="is_in_person">In person</label>
                <input type="checkbox" class="form-control" value="1" name="is_in_person" id="is_in_person" />
            </div>
            <div class="form-group">
                <input type="submit" name="create_session" value="Create" />
            </div>
        </form>
    </div>
</body>

</html>