function Remove() {
    var room = $("input[name='name[]']")
              .map(function(){return $(this).val();}).get();

    if (parseInt(room) ==1){

    }else{
        document.getElementById("adult").remove();
document.getElementById("kids").remove();
document.getElementById("name").remove();
Count();
    }

}




function Count() {

    var room = $("input[name='name[]']")
              .map(function(){return $(this).val();}).get();

              var count0 = 0;

    count0 = parseInt(room);


    var adult = $("input[name='adult[]']")
              .map(function(){return $(this).val();}).get();

              var count1 = 0;
for (var i = 0; i < adult.length; i++) {
    count1 += parseInt(adult[i]);
}
var kids = $("input[name='kids[]']")
              .map(function(){return $(this).val();}).get();

              var count2 = 0;
for (var i = 0; i < kids.length; i++) {
    count2 += parseInt(kids[i]);
}


document.getElementById("sum").innerHTML = count0 + " Room " + count1 + " Adult " + count2 + " Kids";




}



/* $(document).on('keyup mouseup', '#adult', function() {
    console.log(this.value);
});
$(document).on('keyup mouseup', '#kids', function() {
  console.log(this.value);
}); */
