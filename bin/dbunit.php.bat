@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/phpunit/dbunit/dbunit.php
php "%BIN_TARGET%" %*
