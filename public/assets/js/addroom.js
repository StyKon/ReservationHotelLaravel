$(document).ready(function(){


    $('.sign-bttn').click(function(e) {

    if($('input[name="name[]"]').length < 18)
    {
      $('.text-boxes').prepend('<input min="0" max="4"  id="kids" style="width:40px;text-align:right;display: inline-block;"  type="number" name="kids[]" onclick="Count()" class="form-control"  value="0">');
      $('.text-boxes').prepend('<input min="1" max="4"  id="adult"  style="width:40px;text-align:right;display: inline-block;" type="number" name="adult[]" onclick="Count()" class="form-control"  value="1">');

    $('.text-boxes').prepend('<input min="0" max="4" id="name" style="width:40px;text-align:right;display: inline-block;" type="number" readonly name="name[]" onclick="Count()" class="form-control"  value='+ ($('input[name="name[]"]').length + 1) +'>');
    Count();
    }
    else
    {
        alert("reached 18 TextBoxes.............")


    }
    });


        });


