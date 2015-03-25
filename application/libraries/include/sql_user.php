<?php
/**
 * This file contains the User SQL class file.
 *
 * @author Laurence
 * @version  01/23/2013 
 */

define( 'MSQL_10',  "INSERT INTO submissions (id,user_id,form_data,form_id,pdf_file_name,date_created) VALUES (NULL,'%1\$u','%2\$s','%3\$s','%4\$s',UNIX_TIMESTAMP())" );

?>