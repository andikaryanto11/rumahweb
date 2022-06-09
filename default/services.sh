#!/bin/bash
message=`mkdir services 2>/dev/null;
cp -n vendor/andikaryanto11/ci4common/services/controllers.php services/controllers.php 2>/dev/null;
cp -n vendor/andikaryanto11/ci4common/services/graphql.php services/graphql.php 2>/dev/null;
cp -n vendor/andikaryanto11/ci4common/services/repositories.php services/repositories.php 2>/dev/null;
cp -n vendor/andikaryanto11/ci4common/services/routes.php services/routes.php 2>/dev/null ;
cp -n vendor/andikaryanto11/ci4common/services/services.php services/services.php 2>/dev/null`
echo $message
