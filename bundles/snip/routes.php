<?php

Route::any('(:bundle)', 'snip::home@index');
Route::get('(:bundle)/new', 'snip::home@new');
Route::any('(:bundle)/(:num)', 'snip::home@show'); // GET / PUT / DELETE
Route::get('(:bundle)/(:num)-(:any)', 'snip::home@detail');
Route::get('(:bundle)/(:num)/edit', 'snip::home@edit');
Route::get('(:bundle)/(:num)/delete', 'snip::home@delete');
