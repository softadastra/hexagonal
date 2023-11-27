<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Creer un article</h1>

        <form action="" method="post">
            <div class="form-group">
                <label for="">Titre :</label>
                <input type="text" name="title" placeholder="title" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="">Content : </label>
                <textarea name="content" class="form-control" placeholder="content"></textarea>
            </div><br>
            <div class="form-group">
                <label><input type="checkbox" name="published" class="form-check-input"> Article publier ?</label>
            </div><br>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>

</html>