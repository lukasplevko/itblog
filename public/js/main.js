const titleArea = document.getElementById('title_area');
const remaining_charsText = document.getElementById('title_area_remaining_chars');
const MAX_CHARS_TITLE = 100;


titleArea.addEventListener('input', ()=>{
    const remaining = MAX_CHARS_TITLE - titleArea.value.length;
    const color = remaining < MAX_CHARS_TITLE * 0.1 ? 'red' : null;
    remaining_charsText.textContent = `Ostáva ${remaining} znakov`;
    remaining_charsText.style.color = color;
});



