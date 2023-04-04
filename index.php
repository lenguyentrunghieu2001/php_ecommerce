
<?php
session_start();
require_once('./config/session.php');
require_once('./config/define.php');
require_once('./config/bootstraps.php');
require_once('./config/database.php');
require_once('./routes/web.php');
require_once('./controllers/Controller.php');
require_once('./models/Model.php');
require_once('./config/render.php');
require_once('./middleware/middleware.php');
$app = new App();

?>
