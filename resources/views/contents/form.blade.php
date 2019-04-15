<html>
   <head>
      <title>Content | Add</title>
   </head>

   <body>
   <div class="form-group">
      <form
         @if ($edit)
             action="/{{$data->id}}/update"
         @else
             action="/create"
         @endif method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <table>
            <tr>
               <td>Title</td>
               <td>: <input type='text' name='title' 
                  @if ($edit) 
                     value="{{$data->title}}"
                  @endif
                  />
               </td>
            </tr>
            <tr>
               <td>Excerpt</td>
               <td>: <input type='text' name='excerpt'
               @if ($edit) 
                  value="{{$data->excerpt}}"
               @endif /></td>
            </tr>
            <tr>
               <td>Content</td>
               <td>: <input type='text' name='content' 
               @if ($edit) 
                  value="{{$data->content}}"
               @endif /></td>
            </tr>
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Add Content"/>
               </td>
            </tr>
         </table>
      </form>
   </div>
   </body>
</html>