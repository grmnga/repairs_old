
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title> My Blog</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
    <body>
        <div>
            <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                <select name="street" id="1">
                    
                </select>
                    Post Titel<br>
                    <input type="text" name="title" value="<?=$articles['title']?>" class="form-item" autofocus required>
                </label><br>
                <label>
                    Post Date<br>
                    <input type="date" name="date" value="<?=$articles['date']?>" class="form-item" required>
                </label><br>
                <label>
                    Post Content<br>
                    <textarea class="form-item" name="content" required><?=$articles['content']?></textarea>
                </label><br>
                <input type="submit" value="Save" class="btn">
            </form>
        </div>
    </body>
</html>