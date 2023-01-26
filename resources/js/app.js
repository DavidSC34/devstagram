// import './bootstrap';

import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage:'Sube aqui tu imagen',
    acceptedFiles:'.png,.jpg,.jpeg,.gif',
    addRemoveLinks:true,
    dictRemoveFile:'Borrar Archivo',
    maxFiles:1,
    uploadMultiple:false
});

dropzone.on('sending',function( file, xhr, formData){
  console.log(file)
})

dropzone.on('success',function(file, response){
    console.log(response);
})

//si esta bien en tu backend pero algo paso con esto puedes debugear

dropzone.on('error',function(file, message){
        console.log(message);
})

//para debugear en el caso de borrar la imagen

dropzone.on('removedfile',function(){
    console.log('Archivo eleiminado');
})