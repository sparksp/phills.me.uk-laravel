<?php

echo View::make('layout.header')->render();
echo $content;
echo View::make('layout.footer')->render();
