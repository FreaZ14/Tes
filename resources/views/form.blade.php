<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
</head>
<body>
    <h1>Example Form</h1>
    <form action="/form/submit" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age">

        <label for="avatar">Upload Avatar:</label>
        <input type="file" id="avatar" name="avatar">

        <label for="subscribe">Subscribe:</label>
        <input type="checkbox" id="subscribe" name="subscribe" value="1">

        <label for="gender">Gender:</label>
        <label>
            <input type="radio" name="gender" value="male"> Male
        </label>
        <label>
            <input type="radio" name="gender" value="female"> Female
        </label>

        <label for="birth_date">Birth Date:</label>
        <input type="date" id="birth_date" name="birth_date">

        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments"></textarea>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
