<?php

require_once('../../config/config.php');

class DB_API
{

    /** TRUE if static variables have been initialized. FALSE otherwise
     */
    private static $init = FALSE;
    /** The mysqli connection object
     */
    public static $conn;

    /** initializes the static class variables. Only runs initialization once.
     * does not return anything.
     */


    public static function initialize()
    {


        if (self::$init === TRUE) return;
        self::$init = TRUE;
        self::$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
//        self::$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die('unable to connect to db');
    }


}