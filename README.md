Um den Live-reloader zum laufen zu bringen gibt es folgende 2 Wege:


1) Jedes mal den ganzen Pfad aufrufen und vorher ins Projekt Directory gehen: 

cd /var/www/PROJECT/www/html && ./app/code/Webvisum/LiveReload/watcher/watch



2) Einmalig einen Symlink erstellen und dann vom Project folder aus den watcher aufrufen.

ln -s vendor/webvisum/livereload/watcher/watch watch
./watch