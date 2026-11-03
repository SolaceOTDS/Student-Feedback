<?php
include 'db.php';

$result = $conn->query("SELECT * FROM feedback ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Feedback System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2 class="text-center">Student Feedback System</h2>

        <form action="submit.php" method="POST" id="feedbackForm">

            <label class="mt-3">Student Name</label>
            <input type="text" name="name" class="form-control" required>

            <label class="mt-3">Email</label>
            <input type="email" name="email" class="form-control" required>

            <label class="mt-3">Subject</label>

            <select name="subject" class="form-control" required>
                <option value="">Select Subject</option>
                <option>HTML</option>
                <option>CSS</option>
                <option>JavaScript</option>
                <option>PHP</option>
                <option>MySQL</option>
            </select>

            <label class="mt-3">Feedback</label>
            <textarea name="message" class="form-control" required></textarea>

            <button class="btn btn-primary mt-3 w-100">
                Submit Feedback
            </button>

        </form>

    </div>

    <div class="card p-4 shadow mt-4">

        <h3>Submitted Feedback</h3>

        <table class="table table-bordered mt-3">

            <tr class="table-primary">
                <th>Name</th>
                <th>Subject</th>
                <th>Feedback</th>
            </tr>

            <?php while($row = $result->fetch_assoc()) { ?>

            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['subject']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
            </tr>

            <?php } ?>

        </table>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>