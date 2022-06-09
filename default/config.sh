#!/bin/bash
config=`cp vendor/andikaryanto11/ci4common/config/Routes.php app/Config/Routes.php 2>/dev/null;
cp -n vendor/andikaryanto11/ci4common/config/Kernel.php app/Config/Kernel.php 2>/dev/null;
cp -n vendor/andikaryanto11/ci4orm/config/Entity.php app/Config/Entity.php 2>/dev/null`
echo $config
