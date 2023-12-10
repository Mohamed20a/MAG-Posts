const text = document.querySelector(".intro");
const strText = text.textContent;
const splitText = strText.split("") //will split string at individual letters.
text.textContent = ""; //removes the h1 which is replaced by spans

console.log(splitText);

for(let i = 0; i < splitText.length; i++) {
	text.innerHTML += "<span> " + splitText[i] + " </span>";
}

let char =0;
let timer = setInterval(onTick, 150);

function onTick() {
	const span = text.querySelectorAll('span')[char];
	span.classList.add('fade');
	char++;

	if(char === splitText.length){
		complete();
		return;
	}
}

function complete() {
	clearInterval(timer);
	timer = null;
}
