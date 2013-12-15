#!/bin/bash
coffee -j public/js/app.js -c coffee/*coffee
lessc --yui-compress less/app.less public/css/app.css

