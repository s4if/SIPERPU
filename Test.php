<!Doctype HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <title><?=$data['title'];?></title>
    <link href="<?=$data['baseUrl'];?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$data['baseUrl'];?>public/css/style.css" rel="stylesheet">
    <script src="<?=$data['baseUrl'];?>public/js/jquery-2.0.3.min.js"></script>
    <script src="<?=$data['baseUrl'];?>public/js/bootstrap.min.js"></script>
</head>
<body>
<?php

//Enable Error Reporting
error_reporting(-1);
ini_set('display_errors', 'On');
//End Of Enable Error Reporting

require_once 'vendor/autoload.php';
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

if(isset($_FILES['file'])){
    echo $_FILES["file"]["tmp_name"];

    $temperature = array();

    $config = new LexerConfig();
    $config->setDelimiter("\t");
    $lexer = new Lexer($config);

    $interpreter = new Interpreter();
    $interpreter->addObserver(function(array $row) use (&$temperature) {
        $temperature[] = array(
            'temperature' => $row[0],
            'city'        => $row[1],
        );
    });

    $lexer->parse($_FILES["file"]["tmp_name"], $interpreter);

    print_r($temperature);
    }
?>
    <form role="form" method="post" action="http://localhost/SAPu-SKANIDA/Test.php" enctype="multipart/form-data">
        <div class="form-group">
          <label>File input</label>
          <input type="file" id="file" name="file">
          <p class="help-block">Example block-level help text here.</p>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</body>
</html>