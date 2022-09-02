document.querySelector('#imgInput').addEventListener('change', previewImage())

function previewImage(){

    const image = document.querySelector('#imgInput');
    const imgPreview = document.querySelector('#imgPreview');
    
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = (oFREvent) => imgPreview.src = oFREvent.target.result;
    imgPreview.classList.add('d-block');
    imgPreview.classList.add('mb-3');
    
}