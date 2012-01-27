<?php

echo View::make('layout.header', array('title' => $title))->render();
echo $content;
echo View::make('layout.footer')->render();
