
var inputFile = document.getElementById('Foto');
var imgLoaded = document.getElementById('FotoCargada');


document.addEventListener('change',()=>{
  const file = inputFile.files;
if(!file || !file.length){
  file.src = "";
  return;
}
//Si se ha seleccionado una imagen entonces
const archivo = file[0];//obtener la imagen en BLOB
const ruta = URL.createObjectURL(archivo);//transformar el blob a url
imgLoaded.src = ruta; //guardar la ruta en el src donde se quiere mostrar la img seleccionada


})