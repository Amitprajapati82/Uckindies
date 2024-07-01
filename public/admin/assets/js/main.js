$(function() {
    var names = [];
    $('body').on('change', '.picupload', function(event) {
        var getAttr = $(this).attr('click-type');
        var files = event.target.files;
        var output = document.getElementById("media-list");
        var z = 0
        if (getAttr == 'add') {

            $('#media-list').html('');
            $('#media-list').html('<li class="myupload"><span><i class="fa fa-plus" aria-hidden="true"></i><input type="file" click-type="type2" id="picupload" class="picupload" multiple></span></li>');
            $('#hint_brand').modal('show');

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                names.push($(this).get(0).files[i].name);
                if (file.type.match('image')) {
                    var picReader = new FileReader();
                    picReader.fileName = file.name
                    picReader.addEventListener("load", function(event) {
                        var picFile = event.target;

                        var div = document.createElement("li");


                        div.innerHTML = "<img src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                        $(".add-modal .medialist").prepend(div);


                    });
                } else {

                    var picReader = new FileReader();
                    picReader.fileName = file.name
                    picReader.addEventListener("load", function(event) {

                        var picFile = event.target;

                        var div = document.createElement("li");

                        div.innerHTML = "<video src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'></video><div id='" + z + "'  class='post-thumb'><div  class='inner-post-thumb'><a data-id='" + event.target.fileName + "' href='javascript:void(0);' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";
                        $("#media-list").prepend(div);

                    });

                }
                picReader.readAsDataURL(file);
            }
            console.log(names);
        } else if (getAttr == 'edit') {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                names.push($(this).get(0).files[i].name);
                if (file.type.match('image')) {

                    var picReader = new FileReader();
                    picReader.fileName = file.name
                    picReader.addEventListener("load", function(event) {

                        var picFile = event.target;

                        var div = document.createElement("li");

                        div.innerHTML = "<img src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                        $(".edit-modal .medialist").prepend(div);

                    });
                } else {
                    var picReader = new FileReader();
                    picReader.fileName = file.name
                    picReader.addEventListener("load", function(event) {

                        var picFile = event.target;

                        var div = document.createElement("li");

                        div.innerHTML = "<video src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'></video><div class='post-thumb'><div  class='inner-post-thumb'><a href='javascript:void(0);' data-id='" + event.target.fileName + "' class='remove-pic'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                        $("#media-list").prepend(div);

                    });
                }
                picReader.readAsDataURL(file);

            }
            // return array of file name
            console.log(names);
        }

    });

    $('body').on('click', '.remove-pic', function() {
        $(this).parent().parent().parent().remove();
        var removeItem = $(this).attr('data-id');
        var yet = names.indexOf(removeItem);

        if (yet != -1) {
            names.splice(yet, 1);
        }
        // return array of file name
        console.log(names);
    });
    $('#hint_brand').on('hidden.bs.modal', function(e) {
        names = [];
        z = 0;
    });
});

        $(document).ready(function() {
            $('.datatable').DataTable({

			});
			
            
        //     const inputElement = document.querySelector('.file_upload');

        //     FilePond.registerPlugin(FilePondPluginImagePreview);
        
        //     const pond = FilePond.create( inputElement, {
        //     allowMultiple: true,
        //     allowFileEncode: true,
        //   });
        
            //         // get a collection of elements with class filepond
            // const inputElements = document.querySelectorAll('input.file_upload');
            
            // // loop over input elements
            // Array.from(inputElements).forEach(inputElement => {
            
            //   // create a FilePond instance at the input element location
            //   FilePond.registerPlugin(FilePondPluginImagePreview);
        
            //     const pond = FilePond.create( inputElement, {
            //     allowMultiple: true,
            //     allowFileEncode: true,
            //   });
            
            // })
          
          

			tinymce.init({
				selector: ".editor",
				branding: false,
				resize: false,
				forced_root_block : "",
				plugins: [
					"advlist autolink lists link image charmap print preview anchor",
					"searchreplace visualblocks code fullscreen",
					"insertdatetime media table paste"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
			});
        });