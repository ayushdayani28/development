<?php 
include("main-login/module.php");
include("main-login/module-design.php");
design_title('NSM');
design_icon('main-login/ico.png');
design_link();
design_style();
design_header($default);
echo('<br><div class="alert alert-success">
<h5><div class="alert alert-danger"><a href="NSM/bisection">1. Bisection</a></div></h5>
<h5><div class="alert alert-danger"><a href="NSM/regula-falsi">2. Regula-falsi</a></div></h5>
</div></br>');