<!DOCTYPE html>
<html>
<head>
    <title>Pole creator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./includes/create.js"></script>
</head>
<body>


<div class="container">
    <h2 align="center">Create a pole here</h2>
    <div class="form-group">

         <form name="add_name" id="add_name">
          <div><input id="emailForm" type="email" name="email" placeholder="Enter your email" class="email" /></div>
          <div><input type="text" name="event" placeholder="Enter the event's name" class="event" /></div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="text" name="name[]" placeholder="Enter your Name" id="input" class="form-control name_list" required="" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>
         </form>
    </div>
</div>


<!-- <script type="text/javascript">
    $(document).ready(function(){
      var postURL = "/addmore.php";
      var i=1;

      $('#add').click(function(){
        let user_input = $(this).parent().siblings().children('#input').val();
        user_input = String(user_input);
        if (user_input !== ''){
          i++;
          $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" value='+user_input+' name="name[]" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
          $(this).parent().siblings().children('#input').val('');
        }

      });

      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });


      $('#submit').click(function(){

        console.log($('#add_name').serialize())
           $.ajax({
                url:postURL,
                method:"POST",
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)
                {
                    i=1;
                    $('.dynamic-added').remove();
                    $('#add_name')[0].reset();
                    alert('Record Inserted Successfully.');
                }
           });
      });


    });
</script>
 --></body>
</html>