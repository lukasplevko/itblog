const titleArea = document.getElementById('title_area');
const remaining_charsText = document.getElementById('title_area_remaining_chars');
const MAX_CHARS_TITLE = 100;

let iframe = document.querySelectorAll('iframe');
let iframeArr = Array.from(iframe);
for(let i = 0; i<iframeArr.length; i++){
    iframeArr[i].width = "100%";
}

function late() {
    document.querySelector(".late").style.visibility = "visible";
  }


  function later() {
    document.querySelector(".later").style.visibility = "visible";
  }
  setTimeout("late()", 21000); // after 5 secs
  setTimeout("later()", 35000);

titleArea.addEventListener('input', ()=>{
    const remaining = MAX_CHARS_TITLE - titleArea.value.length;
    const color = remaining < MAX_CHARS_TITLE * 0.1 ? 'red' : null;
    remaining_charsText.textContent = `Ostáva ${remaining} znakov`;
    remaining_charsText.style.color = color;
});




