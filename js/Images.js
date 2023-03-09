
const uploadImage = () => {

    

    let images = document.getElementById("inputImage").files;
    const imagesDisplay = document.getElementById("images")

    let imagesDisplayPrevious = imagesDisplay.innerHTML

    imagesDisplay.innerHTML = ""

    if( images.length === 0 ){

        alert("please upload images")

    }else if( images.length > 5 ){

        alert("You are only allowed to upload 5 images")

        imagesDisplay.innerHTML = imagesDisplayPrevious

    }else{

        console.log(images.length)

        
        

        for( let i = 0 ; i < 5 ; i++){

            let imageFile = document.createElement( "IMG" );
            
            imageFile.src = URL.createObjectURL( images[i] );

            imageFile.className = "singleImageFile"

            let x = document.createElement("div")

            x.className = "singleImage"

            x.appendChild(imageFile)

            imagesDisplay.appendChild(x)


        }

        

    }

    

}