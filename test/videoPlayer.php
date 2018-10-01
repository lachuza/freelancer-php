<html>
<head>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
</head>
<body>

<?php 
$url=$_GET["url"];
$script='youtube-dl -f best -g '.$url.' 2>&1';
$output = exec($script);
?>

<div id="player"></div>  
  <script>
    var player = new Clappr.Player({source: "<?php echo $output ?>", parentId: "#player"});
  </script>
</body>
</html>

