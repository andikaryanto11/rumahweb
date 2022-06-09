#!/bin/bash
override=`cd app;
mkdir Override 2>/dev/null;
cd ..;
cp -n vendor/andikaryanto11/ci4common/override/Request.php app/Override/Request.php`
echo $override
