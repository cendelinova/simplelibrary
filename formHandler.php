<?php

require("functions.php");



switch (isset($_POST)) {
    case isset($_POST['publication']):
        insertIntoDatabase($_POST['publication'], 'publications');
        break;
    case isset($_POST['author']):
        insertIntoDatabase($_POST['author'], 'authors');
        break;
    case isset($_POST['genre']):
        insertIntoDatabase($_POST['genre'], 'genres');
        break;
    case isset($_POST['publisher']):
        insertIntoDatabase($_POST['publisher'], 'publishers');
        break;
    case isset($_POST['agerange']):
        insertIntoDatabase($_POST['agerange'], 'agerange');
        break;
    default:
        echo 'default';
        break;
}



/*if (isset($_POST['publication']) && count($_POST['publication'])) {
    $db = getDb();
    validate($_POST['publication'], $db);

    $query = getInsertQuery("publications", $_POST['publication']);
    if (mysqli_query($db, $query)) {
        $location = $_SERVER["HTTP_REFERER"];
        $location.= (strpos($_SERVER["HTTP_REFERER"], "success=1") === false) ? "&success=1" : "";
        header("Location: $location");
        exit();
    } else {
        echo $query.PHP_EOL;
        echo mysqli_error($db);
    }
}

function validate(&$postParams, &$db) {
    foreach ($postParams as $field => &$value) {
        $value = mysqli_real_escape_string($db, $value);
        switch ($field) {
            case 'isbn':
            case 'title':
                if (filter_var($value, FILTER_SANITIZE_STRING) === false) {
                    $error = "$value musi byt string";
                    break 2;
                }
                break;
            case 'edition':
            case 'numpages':
                if (filter_var($value, FILTER_VALIDATE_INT) === false) {
                    $error = "$value musi byt int";
                    break 2;
                }
                break;
        }
    }

    if (isset($error)) {
        die($error);
    }
}

echo "error occurred";*/