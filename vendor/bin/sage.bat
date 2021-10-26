@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../roots/sage-installer/bin/sage
php "%BIN_TARGET%" %*
