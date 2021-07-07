<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Control Panel </title>

   <style>
   body {
     background-color:powderblue;
   }
      hr{
        background-color:white;
         height: 3px;
      }
      
      
      h1{
        text-align: center;
      }
      
      h2{
        text-align: center;
      }

      .center {
        margin: auto;
      
        padding: 10px;
      }

      .custom {
        text-align: center;
      }

    
   </style>
</head>

<script>
  window.watsonAssistantChatOptions = {
      integrationID: "d7f7e0b6-e821-4cbf-baa7-dac35bdf90ee", // The ID of this integration.
      region: "eu-gb", // The region your integration is hosted in.
      serviceInstanceID: "54e4f438-4054-4997-88e4-aca9176ff441", // The ID of your service instance.
      onLoad: function(instance) { instance.render(); }
    };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
    document.head.appendChild(t);
  });
</script>

<body >

<div class="center" >


  <h1 style="">
  Control Panel | لوحة التحكم
  </h>
    <hr></hr>
<h2 >Robot base | ربوت القاعدة </h2>
<form  action="index.php" method="post">

  <div class="custom">
  <input  type="submit" name="BtF"  value="forward">
    <input type="submit" name="BtB"  value="backward">

      <input type="submit" name="BtS"  value="stop">

        <input type="submit" name="BtL"  value="left">
          <input type="submit" name="BtR"  value="right">
          
          <?php
          
          $conn = new mysqli("127.0.0.1","root","","control_panel_db");
          if(isset($_POST["BtF"])){
              
              $stmt7=$conn->prepare("update direction set direction='Forward'");
              $stmt7->execute();
              echo "Done!";
          }
          if(isset($_POST["BtB"])){
              
              $stmt8=$conn->prepare("update direction set direction='Backward'");
              $stmt8->execute();
               echo "Done!";
          }
          if(isset($_POST["BtS"])){
              
              $stmt9=$conn->prepare("update direction set direction='Stop'");
              $stmt9->execute();
               echo "Done!";
          }
          if(isset($_POST["BtR"])){
              
              $stmt10=$conn->prepare("update direction set direction='Right'");
              $stmt10->execute();
               echo "Done!";
          }
          if(isset($_POST["BtL"])){
              
              $stmt11=$conn->prepare("update direction set direction='Left'");
              $stmt11->execute();
               echo "Done!";
          }
          
          
          ?>

</div>


</form>





<hr></hr>
    <h2>Robot Arm | ربوت الذراع</h2>
  <h3> motors | محركات</h3>
  <p>motor 1 </p>
    <form action="index.php" method="Post" >
      <input type="range" id="M1" name="rangeInput1" min="0" max="180" step="1" onchange="GetNumberM1(this.value);">
  <label id="la1" name="la1" ></label>

  <script>
  function GetNumberM1(val) {
document.getElementById('la1').innerHTML =val;      }
  </script>

  <p>motor 2 </p>
  <input type="range" name="rangeInput2" min="0" max="180" onchange="GetNumberM2(this.value);">
  <label id="la2" ></label>

  <script>
  function GetNumberM2(val) {
document.getElementById('la2').innerHTML =val;  }
  </script>

  <p>motor 3  </p>
  <input type="range" name="rangeInput3" min="0" max="180" onchange="GetNumberM3(this.value);">
  <label id="la3" ></label>

  <script>
  function GetNumberM3(val) {
document.getElementById('la3').innerHTML =val;  }
  </script>


  <p>motor 4 </p>
  <input type="range" name="rangeInput4" min="0" max="180" onchange="GetNumberM4(this.value);">
  <label id="la4" ></label>

  <script>
  function GetNumberM4(val) {
document.getElementById('la4').innerHTML =val;  }
  </script>

  <p>motor 5 </p>
  <input type="range" name="rangeInput5" min="0" max="180" onchange="GetNumberM5(this.value);">
  <label id="la5" ></label>

  <script>
  function GetNumberM5(val) {
document.getElementById('la5').innerHTML =val;  }
  </script>

  <p>motor 6 </p>
  <input type="range" name="rangeInput6" min="0" max="180" onchange="GetNumberM6(this.value);">
  <label id="la6" ></label>

  <script>
  function GetNumberM6(val) {
  document.getElementById('la6').innerHTML =val;  }
  </script>
  <p></p>


<div class="custom2">

     <input type="submit" name="BtSave"  value="Save">


      <?php

$connection = new mysqli("127.0.0.1","root","","control_panel_db");


        if(isset($_POST["BtSave"]))
            {
         $Num1= $_POST["rangeInput1"];
         $Num2= $_POST["rangeInput2"];
         $Num3= $_POST["rangeInput3"];
         $Num4= $_POST["rangeInput4"];
         $Num5= $_POST["rangeInput5"];
         $Num6= $_POST["rangeInput6"];

         $stmt=$connection->prepare("update motors_degree set Motor_Degree='$Num1' where Motor_Num='1' ");
         $stmt->execute();

         $stmt2=$connection->prepare("update motors_degree set Motor_Degree='$Num2' where Motor_Num='2' ");
         $stmt2->execute();

         $stmt3=$connection->prepare("update motors_degree set Motor_Degree='$Num3' where Motor_Num='3' ");
         $stmt3->execute();

         $stmt4=$connection->prepare("update motors_degree set Motor_Degree='$Num4' where Motor_Num='4' ");
         $stmt4->execute();

         $stmt5=$connection->prepare("update motors_degree set Motor_Degree='$Num5' where Motor_Num='5' ");
         $stmt5->execute();

         $stmt6=$connection->prepare("update motors_degree set Motor_Degree='$Num6' where Motor_Num='6' ");
         $stmt6->execute();

         echo 'Done!';
         }
?>
  <br></br>
  <input type="submit" name="BtRun"  value="run">

  <?php
  if(isset($_POST["BtRun"]))
      {
  $conn= new mysqli("127.0.0.1","root","","control_panel_db");
  $run=$conn->prepare("update run set status='on' ");
  $run->execute();
  echo 'Done!';
  }
  ?>

   <br></br>
  <input type="submit" name="BtOff"  value="Off">

  <?php
  if(isset($_POST["BtOff"]))
      {
  $conn1= new mysqli("127.0.0.1","root","","control_panel_db");
  $off=$conn1->prepare("update run set status='off' ");
  $off->execute();
  echo 'Done!';
  }
  ?>
</div>
  </form>

</div>


</body>

</html>
