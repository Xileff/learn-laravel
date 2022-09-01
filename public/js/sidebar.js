let url = document.title.split(' | ')
for (const link of document.querySelectorAll('a.nav-link')) if(link.innerText.toLowerCase() === url[url.length-1].toLowerCase()) link.classList.add('active')