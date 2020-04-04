 <style>
     body{
         background-color:aqua;
     }
     p{
         font-family:Consolas, sans-serif;
         font-size:50px;
         font-weight: 900;
         text-align:center;
     }
     .center {
  height: 100%;
  position: relative;
}

.center p {
  margin: 0;
  position: absolute;
  display:block;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
 </style>
 <div class="center">
    <p class="">
        <?php echo $data["nice_user_name"]?><br>
        - <br>
     
    <?php echo $this->config->item("project_title")?>

    </p>
</div>