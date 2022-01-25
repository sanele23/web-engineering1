<?php
     // create a PHP object with the filename,filetype, and cwd properties.
     class fileN
     {
        public $fileName;
        public $fileType;
        public $cwd;
     }

     $cwd = getcwd();     // get path to the current working directory
     $folder = ".";       // Set the folder variable to specify the "current" directory    
     
     // create an array of filenames of files from the current directory
     $files = scandir($folder);
     $directory = Array();     // create a array object to store a list of objects.

     // Ajax request
     

     /*******************************************************************************
     *  Start your PHP code here!
     *
     * Add code to populate the "$directory" array with a list of "fileN" objects.
     * Use "new fileN()" to create a fileN object.    $directory[$i] = new fileN();
     * Set each fileN object property to the appropriate values.
     * You can get each file name from the "$files" array.
     * You can get each file type by calling the php function "filetype()" passing it the filename.
     * The "filetype()" function returns the file type. The returned file type is either "file" or "dir".  
     * The current working directory has been stored in $cwd.
     * To get the size of an array in php use the sizeof function:  $len = sizeof($files);
     *****************************************************************/


    $len = sizeof($files);
    for ($i = 0; $i < $len; $i++) {
        $directory[$i] = new fileN($files[$i], filetype($files[$i]), $cwd);
    }
    $str = json_encode($directory);
    print "\n $str \n"; 



     
     
     /*******************End of your Code *******************************************/

     // convert the PHP array of objects to a JSON string
     $str = json_encode($directory);
     print "\n $str \n";   //output the json string - The string is sent to the browser.      
 ?>

<?php
 
 // Adds pretty filesizes
 function pretty_filesize($file) {
   $size=filesize($file);
   if($size<1024){$size=$size." Bytes";}
   elseif(($size<1048576)&&($size>1023)){$size=round($size/1024, 1)." KB";}
   elseif(($size<1073741824)&&($size>1048575)){$size=round($size/1048576, 1)." MB";}
   else{$size=round($size/1073741824, 1)." GB";}
   return $size;
 }

  // Checks to see if veiwing hidden files is enabled
 if($_SERVER['QUERY_STRING']=="hidden")
 {$hide="";
  $ahref="./";
  $atext="Hide";}
 else
 {$hide=".";
  $ahref="./?hidden";
  $atext="Show";}

  // Opens directory
  $myDirectory=opendir(".");

 // Gets each entry
 while($entryName=readdir($myDirectory)) {
    $dirArray[]=$entryName;
 }

 // Closes directory
 closedir($myDirectory);

 // Counts elements in array
 $indexCount=count($dirArray);

 // Sorts files
 sort($dirArray);

 // Loops through the array of files
 for($index=0; $index < $indexCount; $index++) {

 // Decides if hidden files should be displayed, based on query above.
     if(substr("$dirArray[$index]", 0, 1)!=$hide) {

 // Resets Variables
   $favicon="";
   $class="file";

 // Gets File Names
   $name=$dirArray[$index];
   $namehref=$dirArray[$index];

 // Gets Date Modified
   $modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
   $timekey=date("YmdHis", filemtime($dirArray[$index]));


 // Separates directories, and performs operations on those directories
   if(is_dir($dirArray[$index]))
   {
       $extn="&lt;Directory&gt;";
       $size="&lt;Directory&gt;";
       $sizekey="0";
       $class="dir";


 // Output
  echo("
   <tr class='$class'>
     <td><a href='./$namehref'$favicon class='name'>$name</a></td>
     <td><a href='./$namehref'>$extn</a></td>
     <td sorttable_customkey='$sizekey'><a href='./$namehref'>$size</a></td>
     <td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
   </tr>");
    }
 }
 
 ?>