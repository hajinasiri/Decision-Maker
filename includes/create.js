$(document).ready(function(){
      var postURL = "completed.php";
      var i=1;

      $('#add').click(function(){
        let user_input = $(this).parent().siblings().children('[name="option[]"]').val();

        if (user_input !== ''){
          i++;
          let html = '<tr id="row'+i+'" class="dynamic-added"><td><input type="text" value='+'"'+user_input+'"'+' name="option[]" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>';
          $('#dynamic_field').append(html);
          $(this).parent().siblings().children('[name="option[]"]').val('');
        }

      });

      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
    });