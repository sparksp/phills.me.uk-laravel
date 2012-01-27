#!/usr/bin/env watchr

# Watch for changes to any LESS files and recompile the phills.less file
watch( 'public/lib/.*\.less' ) {|md|
	system("lessc public/lib/phills.less > public/css/phills.css")
	system("lessc public/lib/phills.less > public/css/phills.min.css --compress")
	puts Time.now.strftime("%H:%M:%S") + " Compiled phills.less"
}
