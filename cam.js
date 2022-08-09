$(document).ready(function () {
    Webcam.set({
        width:320,
        height:240,
        image_format:'jpeg',
        jpeg_quality:90
    });

    $('#accesscamera').on('click',function(){ 
        Webcam.reset();
        Webcam.on('error',function(){
            $('#exampleModal').modal('hide');
            swal({
                title: "Warning",
                text: "Please give permission to access your webcam",
                icon: "warning",
              });
        });

        Webcam.attach('#my_camera');
        
    });
    $('#takephoto').on('click',take_spanshot);
});

function take_spanshot(){
    Webcam.snap(function(data_uri){
        $('#results').html('<img src="' + data_uri + '"class="d-block mx-auto rounded"/>');

        var raw_image_data=data_uri.replace(/^data\:image\/\w+\;base64\,/,'');
       $('#photoStore').val(raw_image_data);

    });

    $('#my_camera').removeClass('d-block');
    $('#my_camera').addClass('d-none');


    $('#results').removeClass('d-none');

    $('#takephoto').removeClass('d-block');
    $('#takephoto').addClass('d-none');
   
}