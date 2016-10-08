#!/usr/local/bin/gnuplot
#
# Plot bessel functions and highlight use of config files
#
# AUTHOR: Hagen Wierstorf
# gnuplot 4.6 patchlevel 6

reset

# wxt
# set terminal wxt size 700,524 enhanced font 'Verdana,16' persist
# png
set terminal pngcairo size 700,524 enhanced font 'Verdana,16'
set output 'config-snippets1.png'

# set path of config snippets
#set loadpath './config'
# load config snippets
load 'dark2.pal'
load 'xyborder.cfg'
load 'grid.cfg'
# load 'mathematics.cfg'

# set xrange [0:15]
# unset key
set title 'Hello, world' 
# set xlabel 'Time'
# set ylabel 'Visits'
# set key top right
set key box lc rgb "#e6e7e9"
set key horizontal
set key center bottom
set key bmargin 
# set key 0.01,100
set bmargin 4
set xtics rotate by 45 offset -3.0,-1.5

set key font ",14"
set tic font ',14'
set ylabel font ',14'
set title font ',18'

# set label 'J_0' at 1.4,0.90 center tc ls 1
# set label 'J_1' at 1.9,0.67 center tc ls 2
# set label 'J_2' at 3.2,0.57 center tc ls 3
# set label 'J_3' at 4.3,0.51 center tc ls 4
# set label 'J_4' at 5.4,0.48 center tc ls 5
# set label 'J_5' at 6.5,0.45 center tc ls 6
# set label 'J_6' at 7.6,0.43 center tc ls 7

# plot besj0(x) ls 1 lw 2, \
#      besj1(x) ls 2 lw 2, \
#      besj2(x) ls 3 lw 2, \
#      besj3(x) ls 4 lw 2, \
#      besj4(x) ls 5 lw 2, \
#      besj5(x) ls 6 lw 2, \
#      besj6(x) ls 7 lw 2
# set xdata time
# set autoscale x 
# set xrange ["1901-01-01 16:00":"2016-07-22 16:00"]

# set timefmt '%Y%m%d'
# set xdata time
# set format x '%Y%m%d'

# set multiplot layout 1,2

set label 1 "site.name" at graph 0.05, graph 0.9 font ",18" tc rgb "#969696"


$data <<EOF
0110 	6528 	3432
0120 	4198	5322
0130 	3243	5432
0210 	255	743
0220 	539	3567
0230 	1098	4467
0310 	920	4672
0629	523	7453
EOF

plot $data using 2:xtic(1) ls 1 lw 2 with lines title 'Visits', \
		'' using 3 ls 2 lw 2 with lines title 'Users'
# plot $data u 1:2, '' u 1:3
