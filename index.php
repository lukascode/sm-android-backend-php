<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Android backend</title>
    </head>

    <body>
        <h2>Hello Android</h2>


         <h3>Nowy User</h3>
         <form method="post" id="user">
             Login:
             <input type="text" name="login" /> <br /><br />
             Password:
             <input type="password" name="password" /> <br /><br />
             nationality:
             <input type="text" name="nationality" /> <br /><br />
             Skills:
             <input type="text" name="skills" /> <br /><br />
             aboutme:
             <input type="text" name="aboutme" /> <br /><br />

             <input type="button" id="submit" value="add"/>
         </form>

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
         <script>

                function getFormData($form){
                      var unindexed_array = $form.serializeArray();
                      var indexed_array = {};
                      $.map(unindexed_array, function(n, i){
                          indexed_array[n['name']] = n['value'];
                      });
                      return indexed_array;
                }

                $('#submit').click(function() {
                        var user = getFormData($('#user'));
                        console.log(user);
                        $.post('users.php', JSON.stringify(user), function(data, status) {
                            console.log('data: ' + data);
                            console.log('status: ' + status);
                        });
                });



         </script>


    </body>

</html>
