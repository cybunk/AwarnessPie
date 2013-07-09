<!doctype html>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Awarenes screen </title>
    <link rel="stylesheet" media="screen" type="text/css" href="css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>    
    <script src="lib/jquery.animate-colors/jquery.animate-colors-min.js"></script> 
    <script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/eye.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>

    <style>
      #text{
        font: normal 1em georgia, sans-serif;
      }
      #form{
        width:300px;
      }
    </style>
 
    <?php
    /*
    $file = 'people.txt';
    // Open the file to get existing content
    $current = file_get_contents($file);
    // Append a new person to the file
    $current .= "John Smith\n";
    // Write the contents back to the file
    file_put_contents($file, $current);
    */
    ?>


    <script>
    
    $(function() {
      $( "#slider" ).slider();
    });

    $(function() {
      
      $( "input[type=submit], a, button" )
      .button()
      .click(function( event ) {
        event.preventDefault();
      });
      $( "#slider" ).slider();


      $('#colorSelectorBgd').ColorPicker({
        color: '#0000ff',
        onShow: function (colpkr) {
          $(colpkr).fadeIn(500);
          return false;
        },
        onHide: function (colpkr) {
          $(colpkr).fadeOut(500);
          return false;
        },
        onChange: function (hsb, hex, rgb) {
          $('#colorSelector div').css('backgroundColor', '#' + hex);
        }
      });

     });
    
    </script>

   </head>
   <body>
   		<div id="form">

        Sounds : 
        <select id="sound">
          <?php
          if ($handle = opendir('./sound')) {
             echo "Directory handle: $handle\n";
              echo "Entries:\n";

              /* This is the correct way to loop over the directory. */
              while (false !== ($entry = readdir($handle))) {
                  if($entry!=='.' && $entry!=='..'){
                    echo " <option value='".$entry."''>".$entry."</option>";
                  }
              }

              /* This is the WRONG way to loop over the directory. */
              while ($entry = readdir($handle)) {
                  echo "$entry\n";
              }
              closedir($handle);
          }
          ?>
        </select>
        
        <div>
        Font:
        <select id="font">
        </select>
        </div>

        <div>
        Message:
        <textarea rows="4" cols="50" id="message">
          test
        </textarea>
        </div>

        <div>
        background : <div id="colorSelectorBgd"></div>
        text : <div id="colorSelectorTxt"></div>
        </div>

        <div>
        Transition time :
        <div id="slider"></div>
        </div>
        <br/>
        <input type="submit" value="SEND THE MESSAGE" />
   		
      </div>
   </body>
</html>