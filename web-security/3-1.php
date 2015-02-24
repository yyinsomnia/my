<?php

$input = $_GET['param'];
echo "<div>".$input."</div>";


echo htmlspecialchars("<script>alert(/xss/)</script>");