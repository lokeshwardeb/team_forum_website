
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            },
            toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
            // ckfinder:
            // {
            //     uploadUrl: "../../views/pages/fileupload.php"
            //     //  <img src="../../views/pages/fileupload.php"
            // }
        } )
        .then(editor => {
            console.log(editor)
        })
        .catch( error => {
            console.error( error );
        } );




    // ClassicEditor
    // .create(document.querySelector('#editor'), {
    //     extraPlugins: [ MyCustomUploadAdapterPlugin ],
    //     toolbar: [ 'imageUpload', '|', 'bold', 'italic', 'link' ],
    // })
    // .catch(error => {
    //     console.error(error);
    // });

// class MyCustomUploadAdapterPlugin {
//     constructor(editor) {
//         this.editor = editor;
//     }

//     uploadFile(file) {
//         return new Promise((resolve, reject) => {
//             const formData = new FormData();
//             formData.append('image', file);

//             // <img src="./../../views//pages/fileupload.php" alt="">

//             fetch('/assets/views/pages/fileupload.php', {
//                 method: 'POST',
//                 body: formData,
//             })
//             .then(response => response.json())
//             .then(result => {
//                 if (result.success) {
//                     resolve({ default: result.url });
//                 } else {
//                     reject(result.error.message);
//                 }
//             })
//             .catch(error => {
//                 reject('Upload failed');
//             });
//         });
//     }
// }