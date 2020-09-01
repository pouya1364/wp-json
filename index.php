<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="component/css/json.css">
        <script src="component/js/json.js"></script>
    </head>
    <body>
    <div id='wrapper'>
        <a name="top" class="cd-top"></a>
        <!----content here---->
        <input type="text" id="myInput" onkeyup="searchFunc()" placeholder="Search for ID..">
        
        <?php 
            include 'component/Json.class.php';
            $newJson = new Json();
            $get_data = $newJson->callAPI('http://jsonplaceholder.typicode.com/users');
            $response = json_decode($get_data, true);
            print_r ($newJson->build_table($response));
        ?>
    </div>
    <div id='userDetail'></div>
    <a href="#top">Back to top</a>

    </body>
</html>