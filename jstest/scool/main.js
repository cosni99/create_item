
$(function(){
  $("#send").on("click", function(){
    let id = $("#main").val();//入力した値
    let test = $("#atest").val();
    $.ajax({
      type: "POST",
      url: "techacademy.php",
      data: { "id" : id ,"school":test},
      dataType : "json"//戻り値が配列ならこれがいい
    }).done(function (data) {
      //通信が成功した場合
      $("#return").append('<p>'+data.id+' : '+data.school+' : '+data.skill+'</p>');
    }).fail(function (XMLHttpRequest, status, e) {
      //通信が失敗した場合
      alert(e);
    });
  });
});
