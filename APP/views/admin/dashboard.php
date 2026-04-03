<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>List Lessons</h2>
    <table border="1">
        <tr>
            <th>Tite</th>
            <th>Coach Name</th>
            <th>Date</th>
            <th>Price</th>
            <th>Level</th>
        </tr>

        <?php foreach($lessons as $lesson): ?>
            <tr>
                <td><?= $lesson['title']  ?></td>
                <td><?= $lesson['coach_name'] ?></td>
                <td><?= $lesson['date'] ?></td>
                <td><?= $lesson['price'] ?></td>
                <td><?= $lesson['level'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

        <h2>List Students</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Country</th>
            <th>Level</th>
        </tr>

        <?php foreach($students as $student): ?>
            <tr>
                <td><?= $student['name']  ?></td>
                <td><?= $student['country'] ?></td>
                <td><?= $student['level'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>