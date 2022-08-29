const title = document.title.toLowerCase();
const links = document.querySelectorAll('.nav-item a.nav-link')

for (const l of links) if(l.innerText.toLowerCase().includes(title)) l.classList.add('active')