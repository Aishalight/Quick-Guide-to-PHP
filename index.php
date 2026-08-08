<?php

include "database.php";

// ADD
if (isset($_POST["add"])) {

    $name = $_POST["name"];
    $grade = $_POST["grade"];

    $sql = "INSERT INTO students (name, grade)
            VALUES ('$name', '$grade')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit();
}


// DELETE
if (isset($_GET["delete"])) {

    $id = $_GET["delete"];

    $sql = "DELETE FROM students WHERE id = $id";

    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit();
}


// UPDATE
if (isset($_POST["update"])) {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $grade = $_POST["grade"];

    $sql = "UPDATE students
            SET name = '$name', grade = '$grade'
            WHERE id = $id";

    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Student CRUD</title>
</head>

<body>

    <h1>Student Management</h1>

    <!-- ADD FORM -->

    <h2>Add Student</h2>

    <form method="POST">

        <input
            type="text"
            name="name"
            placeholder="Student name"
            required
        >

        <input
            type="text"
            name="grade"
            placeholder="Grade"
            required
        >

        <button type="submit" name="add">
            Add Student
        </button>

    </form>


    <hr>


    <!-- STUDENT LIST -->

    <h2>Students</h2>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Grade</th>
            <th>Actions</th>
        </tr>

        <?php

        $result = mysqli_query(
            $conn,
            "SELECT * FROM students"
        );

        while ($student = mysqli_fetch_assoc($result)) {

        ?>

        <tr>

            <td>
                <?php echo $student["id"]; ?>
            </td>

            <td>
                <?php echo $student["name"]; ?>
            </td>

            <td>
                <?php echo $student["grade"]; ?>
            </td>

            <td>

                <!-- DELETE -->

                <a href="index.php?delete=<?php echo $student["id"]; ?>">
                    Delete
                </a>

                |

                <!-- UPDATE -->

                <a href="index.php?edit=<?php echo $student["id"]; ?>">
                    Edit
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>


    <?php

    // SHOW EDIT FORM

    if (isset($_GET["edit"])) {

        $id = $_GET["edit"];

        $result = mysqli_query(
            $conn,
            "SELECT * FROM students WHERE id = $id"
        );

        $student = mysqli_fetch_assoc($result);

    ?>

        <hr>

        <h2>Update Student</h2>

        <form method="POST">

            <input
                type="hidden"
                name="id"
                value="<?php echo $student["id"]; ?>"
            >

            <input
                type="text"
                name="name"
                value="<?php echo $student["name"]; ?>"
                required
            >

            <input
                type="text"
                name="grade"
                value="<?php echo $student["grade"]; ?>"
                required
            >

            <button type="submit" name="update">
                Update Student
            </button>

        </form>

    <?php } ?>

</body>

</html>