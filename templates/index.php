<?php require('../functions.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php _e("PUBLICATION_ADD_HTMLTITLE"); ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
</head>

<body>
    <div class="flags">
        <a href="index.php?lang=en"><img src="../resources/images/english.png" ></a>
        <a href="index.php?lang=cs"><img src="../resources/images/czech.png"></a>
    </div>
    <div class="container">
       <br>
       <a href="addAuthor.php"><?php _e("AUTHOR_ADD_HTMLTITLE"); ?></a> <br>
       <a href="addPublication.php"><?php _e("PUBLICATION_ADD_HTMLTITLE"); ?></a> <br>
       <a href="addGenre.php"><?php _e("GENRE_ADD_HTMLTITLE"); ?></a> <br>
       <a href="addAgeRange.php"><?php _e("AGERANGE_ADD_HTMLTITLE"); ?></a> <br>
       <a href="addPublisher.php"><?php _e("PUBLISHER_ADD_HTMLTITLE"); ?></a> <br>
    </div>
</body>
</html>
