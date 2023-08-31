let img = document.getElementById('img');
let input = document.getElementById('fotousu')

input.onchange = (e) => {
    if (input.files[0])
        img.src = URL.createObjectURL(input.files[0]);
};