// const logo = document.querySelectorAll('#logo path');
// for(let i = 0; i<logo.length; i++){
//     console.log(`Pismeno ${i} dlzka ${logo[i].getTotalLength()}`);
// }

let latest = document.querySelector('.latest');
let topContent = document.querySelector('.top-content');
let body = document.getElementsByTagName("body");
body.addEventListener('resize', function(){
    if(window.matchMedia('(max-width: 770px)')){
        latest.classList.toggle('col-5');
        topContent.classList.toggle('row');
    }else{
        console.log("hovienko");
    }

})



