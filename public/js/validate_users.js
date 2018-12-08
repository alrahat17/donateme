
$(document).ready(function(){
          $('#name').blur(function(){
          var error_name = '';
          var name = $('#name').val();
          if(name.length<5){
           $('#error_name').html('<label class="text-danger">Name must be atleast 5 characters long</label>');
           $('#name').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_name').html('');
             $('#name').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

          
         $('#email').blur(function(){
          var error_email = '';
          var email = $('#email').val();
          var _token = $('input[name="_token"]').val();
          var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(!filter.test(email))
          {    
           $('#error_email').html('<label class="text-danger">Invalid Email</label>');
           $('#email').addClass('has-error');
           $('#register').attr('disabled', 'disabled');
         }
         else
         {
           $.ajax({
            url:"{{ route('email_available.check') }}",
            method:"POST",
            data:{email:email, _token:_token},
            success:function(result)
            {
             if(result == 'unique')
             {
              $('#error_email').html('<label class="text-success">Email Available</label>');
              $('#email').removeClass('has-error');
              $('#register').attr('disabled', false);
            }
            else
            {
              $('#error_email').html('<label class="text-danger">Email already taken</label>');
              $('#email').addClass('has-error');
              $('#register').attr('disabled', 'disabled');
            }
          }
        })
         }
       });

         $('#photo').blur(function(){
          var error_photo = '';
          var file_size = $('#photo')[0].files[0].size;
          if(file_size>2097152){
           $('#error_photo').html('<label class="text-danger">Photo Size Exceeds</label>');
           $('#photo').addClass('has-error');
           $('#register').attr('disabled',false );
          }
          else{
             $('#error_photo').html('');
             $('#name').removeClass('has-error');
             $('#register').attr('disabled', 'disabled');
          }
          })

       });


        
