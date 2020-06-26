require('./bootstrap');

var Turbolinks = require("turbolinks");
Turbolinks.start();

document.onreadystatechange = () => {
    if (document.readyState==='complete') {
        window.livewire.on('file_upload_start', function () {
            try {
                let file = event.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onloadend = () => {
                        window.livewire.emit('file_upload_end', {
                            data: reader.result,
                            filename: file.name
                        });
                    }
                    reader.readAsDataURL(file);
                }
            } catch (error) {
                console.error(error);
            }
        })
    }
}
