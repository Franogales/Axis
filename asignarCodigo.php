<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Axis - Asignar Codigo</title>
  </head>
  <link rel="stylesheet" href="styleasignar.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
<script type="text/javascript">


function showResult(str) {
  console.log(str);
			  if (str.length==0) {
			    document.getElementById("in_nombre").innerHTML="";
			    return;
			  }
			  if (window.XMLHttpRequest) {
			    // code for IE7+, Firefox, Chrome, Opera, Safari
			    xmlhttp=new XMLHttpRequest();
			  } else {  // code for IE6, IE5
			    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function() {
			    if (this.readyState==4 && this.status==200) {
				    var txtReturned;
				    var data = this.responseText.split("\n");


				    for (i = 0; i < data.length; i++) {
					    var tmpData = data[i].split("=>");

					    if(tmpData.length > 1){

				    		txtReturned += "<option value='"+ tmpData[0] +"'>"+ tmpData[0] + "</option>";
                console.log(txtReturned);
					    }
				    }
			    }
				  document.getElementById("display").innerHTML=txtReturned;
			  }

			  xmlhttp.open("GET","livesearch.php?q="+str,true);
			  xmlhttp.send();
			}
  // $(document).ready(function(e){
  //   $("#in_nombre").keyup(function(){
  //
  //     $("#display").show();
  //     var x  = $(this).val();
  //     $.ajax({
  //       type:'GET',
  //       url: 'livesearch.php',
  //       data: 'q='+x,
  //       success:function(data){
  //
  //
  //
  //         $("#display").html(data);
  //       }
  //     });
  //   });
  // });

</script>
  <body>
    <?php session_start(); ?>
    <?php if (isset($_SESSION["mensaje"])) {?>
      <div class="alert alert-success center" id="mensaje">
        <h3 style="center"><?php echo $_SESSION['mensaje'] ?></h3>
      </div>
    <?php } ?>
    <div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Asignar Codigo</h2>

    <form class="login-container" action="class.registro.php" method="post" >
      <p><input type="text" placeholder="Nombre" list="display" name="in_nombre" id="in_nombre" onkeyup="showResult(this.value)" autocomplete="off" ></p>
      <datalist id="display" style=""></datalist>
      <p><input type="text" placeholder="Codigo" name="in_codigo"></p>
      <p><input type="submit" value="Asignar"></p>
    </form>
  </div>
  <?php unset($_SESSION["mensaje"]) ?>
  <script type="text/javascript">
  setTimeout(function() {
    $('#mensaje').fadeOut('fast');
}, 2000); // <-- time in milliseconds
  </script>
  </body>
</html>
