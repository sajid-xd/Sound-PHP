<?php
include "nav.php";


// Initialize variables for CRUD operations
$message = "";
$entity = '';

// Handle Create, Update, Delete requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form values
    $entity = $_POST['entity'];
    $name = @$_POST['name'];
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if (isset($_POST['create'])) {
        // Create new record
        $sql = "INSERT INTO $entity (name) VALUES ('$name')";
        if (mysqli_query($con, $sql)) {
            $message = "New record created successfully.";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    } elseif (isset($_POST['update'])) {
        // Update existing record
        $sql = "UPDATE $entity SET name='$name' WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            $message = "Record updated successfully.";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    } elseif (isset($_POST['delete'])) {
        // Delete record
        $sql = "DELETE FROM $entity WHERE id=$id";
        if (mysqli_query($con, $sql)) {
            $message = "Record deleted successfully.";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    }
}

// Fetch data for each entity
$artists = mysqli_query($con, "SELECT * FROM artist");
$albums = mysqli_query($con, "SELECT * FROM albums");
$users = mysqli_query($con, "SELECT * FROM users");
$years = mysqli_query($con, "SELECT * FROM years");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">CRUD Operations for Artists, Albums, Users, and Years</h4>
            </div>
        </div>
    </div>

    <?php if ($message): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <ul class="nav nav-tabs nav-bordered mb-3">
        <li class="nav-item">
            <a href="#artists" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">Artists</a>
        </li>
        <li class="nav-item">
            <a href="#albums" data-bs-toggle="tab" aria-expanded="true" class="nav-link">Albums</a>
        </li>
        <li class="nav-item">
            <a href="#users" data-bs-toggle="tab" aria-expanded="true" class="nav-link">Users</a>
        </li>
        <li class="nav-item">
            <a href="#years" data-bs-toggle="tab" aria-expanded="true" class="nav-link">Years</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane show active" id="artists">
            <h5>Artists</h5>
            <form method="POST" class="mb-3">
                <input type="hidden" name="entity" value="artist">
                <input type="hidden" name="id" id="artist_id" value="0">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Artist Name" required>
                    <button class="btn btn-primary" type="submit" name="create">Create</button>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($artist = mysqli_fetch_assoc($artists)): ?>
                        <tr>
                            <td><?php echo $artist['id']; ?></td>
                            <td><?php echo $artist['name']; ?></td>
                            <td>
                               <form method="POST" style="display:inline;">
                                    <input type="hidden" name="entity" value="artist">
                                    <input type="hidden" name="id" value="<?php echo $artist['id']; ?>">
                                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane" id="albums">
            <h5>Albums</h5>
            <form method="POST" class="mb-3">
                <input type="hidden" name="entity" value="albums">
                <input type="hidden" name="id" id="album_id" value="0">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Album Name" required>
                    <button class="btn btn-primary" type="submit" name="create">Create</button>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($album = mysqli_fetch_assoc($albums)): ?>
                        <tr>
                            <td><?php echo $album['id']; ?></td>
                            <td><?php echo $album['name']; ?></td>
                            <td>
                               <form method="POST" style="display:inline;">
                                    <input type="hidden" name="entity" value="albums">
                                    <input type="hidden" name="id" value="<?php echo $album['id']; ?>">
                                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane" id="users">
            <h5>Users</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = mysqli_fetch_assoc($users)): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td>
                               <form method="POST" style="display:inline;">
                                    <input type="hidden" name="entity" value="users">
                                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane" id="years">
            <h5>Years</h5>
            <form method="POST" class="mb-3">
                <input type="hidden" name="entity" value="years">
                <input type="hidden" name="id" id="year_id" value="0">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Year" required>
                    <button class="btn btn-primary" type="submit" name="create">Create</button>
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($year = mysqli_fetch_assoc($years)): ?>
                        <tr>
                            <td><?php echo $year['id']; ?></td>
                            <td><?php echo $year['name']; ?></td>
                            <td>
      
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="entity" value="years">
                                    <input type="hidden" name="id" value="<?php echo $year['id']; ?>">
                                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function editEntity(entity, id, name) {
        document.getElementById(entity + '_id').value = id;
        document.querySelector('input[name="name"]').value = name;
        document.querySelector('input[name="entity"]').value = entity;
    }

    function editUser(id, name, username) {
        document.getElementById('user_id').value = id;
        document.querySelector('input[name="name"]').value = name;
        document.querySelector('input[name="username"]').value = username;
        document.querySelector('input[name="entity"]').value = 'users';
    }
</script>
<?php include "foot.php";?>