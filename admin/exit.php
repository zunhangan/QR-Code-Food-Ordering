<?php
setcookie("user","",time()-3600*8);
echo "<script>window.location.href='./login.html'</script>";
?>