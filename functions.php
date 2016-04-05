<?php

require("config.php");

/**
 * Connects to database by provided credentials
 *
 * @return resource MySQL link
 */
function getDb() {
    global $cfg;

    return mysqli_connect($cfg["dbHost"], $cfg["dbUser"], $cfg["dbPass"], $cfg["dbBase"]);
}

/**
 * Translates string in language provided by GET parameter
 *
 * @param  string $word word to translate
 * @return string       translated string
 */
function __($word) {
    if (isset($_GET['lang'])) {
        include("langs/".$_GET['lang'].".php");
    }

    return isset($translations[$word]) ? $translations[$word] : $word;
}

/**
 * Translate wrapper with echo functionality
 *
 * @param  string $word word to translate
 * @return null         instead of return it echoes the result
 */
function _e($word) {
    echo __($word);
}


/**
 * Gets query for insert to database
 *
 * @param  string $table       name of table
 * @param  array  $insertArray array of values
 * @return string              query
 */
function getInsertQuery($table, $insertArray) {
    return  sprintf("INSERT INTO `%s`(`%s`) VALUES('%s')",
            $table,
            implode("`,`", array_keys($insertArray)),
            implode("','", $insertArray));
}

/**
 * Gets all authors from database
 *
 * @return void
 */

function getAuthors() {
    $db = getDb();
    $query = "SELECT firstname, lastname FROM authors";

    $result = mysqli_query($db, $query);

    if ($result = mysqli_query($db, $query)) {
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo'<option value="author'.$i.'">'.$row["firstname"]." ". $row["lastname"].'</option>';
            $i++;
        }
        //uvolni pamet
        mysqli_free_result($result);
    } else {
        echo $query.PHP_EOL;
        echo mysqli_error($db);
    }
    mysqli_close($db); 
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

//echo "error occurred";

function insertIntoDatabase(&$postParams, $table) {
    if (isset($postParams) && count($postParams)) {
        $db = getDb();
        validate($postParams, $db);

        $query = getInsertQuery($table, $postParams);
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

}