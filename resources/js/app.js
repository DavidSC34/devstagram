// import './bootstrap';

import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage:'Sube aqui tu imagen',
    acceptedFiles:'.png,.jpg,.jpeg,.gif',
    addRemoveLinks:true,
    dictRemoveFile:'Borrar Archivo',
    maxFiles:1,
    uploadMultiple:false,

    init:function(){
       if( document.querySelector('[name="imagen"]').value.trim() ){
            const imagenPublicada ={}//--> se creo por que es obligatorio que sea objeto con size y name
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);//--> se usa call para que se mande a llamar rm sutomativo
            this.options.thumbnail.call(this, imagenPublicada,`/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success','dz-complette');
       }
    }
});

// dropzone.on('sending',function( file, xhr, formData){
//   console.log(file)
// })

dropzone.on('success',function(file, response){
    // console.log(response);
    document.querySelector('[name="imagen"]').value = response.imagen
})

//si esta bien en tu backend pero algo paso con esto puedes debugear

dropzone.on('error',function(file, message){
        console.log(message);
})

//para debugear en el caso de borrar la imagen

dropzone.on('removedfile',function(){
    // console.log('Archivo eliminado');
    document.querySelector('[name="imagen"]').value = ''
})