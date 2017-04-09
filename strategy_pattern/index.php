<?php
/**
 * Simple example of PHP Strategy Design Pattern:
 * 
 * - Defines a FAMILY of ALGORITHMS: a task (algorithm ) that can be executed in
 * multiple ways. For instance, there can be various ways to log events,
 * such as to a file, database, etc.
 * 
 * - Encapsulate and make the classes INTERCHANGEABLE:
 * ** Multiple Ways to Execute a Particular Strategy **
 * We force the classes to be interchangeablew with the common interface.
 */

function autoloader($class) {
	require "src/" . $class . ".php";
}
spl_autoload_register("autoloader");


// Encapsulate and make the classes INTERCHANGEABLE:
interface Logger {
    
    public function log($data);
    
}

class LogToFile implements Logger {
    public function log($data) {
        var_dump('Log the data to a file');
    }
}

class LogToDatabase implements Logger {
    public function log($data) {
        var_dump('Log the data to the database');
    }   
}

class LogToXWebService implements Logger {
    public function log($data) {
        var_dump('Log the data to a SaaS online service');
    } 
}

////////////////////////////////////////////////////////

class App {
    
    public function log($data, Logger $logger = null) {
        
        // give some default if null only:
        $logger = $logger ?: new LogToFile;

        $logger->log($data);
        
    }
    
}

$app = new App;
$app->log('Some info here', new LogToXWebService); 
// The above can be swapped out for different logging method classes at run time!

// ie:
echo "<br />";
$app->log('more info to log', new LogToDatabase);