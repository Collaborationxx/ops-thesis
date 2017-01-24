<?php
/** test input data for sql injections
 * @param $data mixed
 * @return mixed
 */
function test_input($data) {
  $data = trim($data); //remove whitespace (or other characters) from the beginning and end of a string
  $data = stripslashes($data);  //remove slashes
  $data = htmlspecialchars($data); //remove html special characters
  return $data;
}

?>