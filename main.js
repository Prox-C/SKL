let nav = document.querySelector('nav');
        
window.addEventListener('scroll', ()=>{
    nav.classList.toggle('nav-scroll', window.scrollY > 0);
});

let AllNavLink = document.querySelectorAll('.nav-links li a');

AllNavLink.forEach(item=>{
    item.addEventListener('click', ()=>{
        resetLink();
        item.classList.add('active');
    })
})

const resetLink =()=> AllNavLink.forEach(itme=>{
    itme.classList.remove('active')
})

let menu = document.querySelector('nav button');
let navLinks = document.querySelector('.nav-links')
menu.addEventListener('click', ()=>{
    navLinks.classList.toggle('nav-link-block');
})

const titles = [
    "Technology ", 
    "Literature ",
    "News ", 
    "Finance ",
    "Fashion ",
    "Entertainment ",
    "Skibidi ",
    "Music ",
    "Lifestyle ",
    "Politics ",
    "Art ",
    "Gaming ",
    "Science ",
    "Photography "
]

const title = document.getElementById("title");
const cursorLMNT = document.getElementById("cursor");

let currentTitleIndex = 0;
let currentTitle = titles[currentTitleIndex];
let index = 0;

function typeNextCharachter () {
    title.textContent += currentTitle[index];
    index++;

    if (index < currentTitle.length) {
         setTimeout(typeNextCharachter, getRandomDelay(70, 100));
    }
    else {
        setTimeout(backspace, 1000);
    }
}

function backspace () {
    if (title.textContent.length > 0) {
        title.textContent = title.textContent.slice(0, -1);
        setTimeout(backspace, getRandomDelay(30, 50));
    }
    else {
        currentTitleIndex = (currentTitleIndex + 1) % titles.length;
        currentTitle = titles[currentTitleIndex];
        index = 0;
        setTimeout(typeNextCharachter, 0);
    }
}

function getRandomDelay(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function blinkCursor() {
    cursorLMNT.style.opacity = "0";
    setTimeout(()=>{
        cursorLMNT.style.opacity = "1";
        setTimeout(blinkCursor, 1000);
    }, 500);
}

typeNextCharachter();
blinkCursor();