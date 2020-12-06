<?php
    ##....School Configuration File For Database Connection



    return $config = ["database"=>[
                                  "host" => "localhost",
                                  "dname" => "business",
                                  "chars" => "utf8",
                                  "uname" => "accademic",
                                  "passwd" => "179@shalafa2010",
                                  "option" => [
                           PDO::ATTR_ERRMODE => 
                                   PDO::ERRMODE_EXCEPTION,
                           PDO::ATTR_DEFAULT_FETCH_MODE =>
                                   PDO::FETCH_ASSOC
                               ]
                           ]
                       ];
?>