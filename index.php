<!DOCTYPE html>
<html>
<head>
    <title>Pole creator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <link rel="stylesheet" href="./styles/styles.css" type="text/css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./includes/create.js"></script>
</head>
<body>


<div class="container">
    <h2 >Create a pole</h2>
    <div >

         <form name="add_name" id="add_name" action="completed.php" method="post">
          <div><input class="email" id="emailForm" type="email" name="email" placeholder="Enter your email" class="email" /></div>
          <div>
            <textarea rows:"5" type="text" name="question" placeholder="Enter the pole's question" class="question" required=""></textarea></div>
            <div class="table">
                <table class="table" id="dynamic_field">
                    <tr>
                      <td><input type="text" name="option[]" placeholder="Enter an option" class="form-control name_list"/></td>
                      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>
         </form>
    </div>
</div>

</body>
</html>
