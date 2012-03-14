<?php

Route::any('(:bundle)', 'snip::home@index');
Route::get('(:bundle)/new', 'snip::home@new');
Route::any('(:bundle)/(:num)', 'snip::home@show'); // GET / PUT / DELETE
Route::get('(:bundle)/(:num)-(:any)', 'snip::home@detail');
Route::get('(:bundle)/(:num)/edit', 'snip::home@edit');
Route::get('(:bundle)/(:num)/delete', 'snip::home@delete');

// Backward compatibility
Route::get('(:bundle)/snip-(:num)', 'snip::home@show');
Route::get('(:bundle)/snip-(:num)-(:any)?', 'snip::home@show');
