<?php
    session_start();
    if (!isset($_SESSION['username']))
    {
        echo '<script language="javascript">document.location="index.php?q=e718159c3d1a1c0fc06149a3350a16e4v8";</script>';
        exit;
    }
?>