"use strict";

function watch() {
    return setTimeout(() => {
        fetch("/livereload/reload/livereload").then(response => {
            return response.json()
        }).then((command) => {
            if(window.location.href.indexOf("?debugMode") !== -1) {
                console.log(command);
            }
            if(command.reload) {
                setTimeout(() => {
                    window.location.reload()
                }, 50);
                return;
            }
            else if(command.paused) {
                return console.log("Live-reload was disabled via command line interface");
            }
            return watch();
        });
    }, 1000);
}

if(location.hostname.indexOf(".local") !== -1) {
    watch();
}