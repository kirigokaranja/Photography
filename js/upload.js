Dropzone.options.myDropzone = {

    // Prevents Dropzone from uploading dropped files immediately
    autoProcessQueue: false,
    addRemoveLinks:true,
    maxFiles:50,
    parallelUploads:50,
    acceptedFiles: "image/jpeg, image/jpg, image/png, image/gif",

    init: function() {
        var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

        submitButton.addEventListener("click", function() {
            myDropzone.processQueue(); // Tell Dropzone to process all queued files.
        });

        myDropzone.on('sending', function(file, xhr, formData){
            formData.append('userName', 'bob');
        });

        // You might want to show the submit button only when
        // files are dropped here:
        this.on("addedfile", function() {
            // Show submit button here and/or inform user to click it.
        });

        myDropzone.on("complete", function(file) {
            setTimeout(remove,3000);
            function remove () {
                myDropzone.removeFile(file);
            }
        });

    }
};