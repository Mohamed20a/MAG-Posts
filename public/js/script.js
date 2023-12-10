// Text Animation
const text = document.querySelector(".intro");
const strText = text.textContent;
const splitText = strText.split("");
text.textContent = "";

console.log(splitText);

for(let i = 0; i < splitText.length; i++) {
	text.innerHTML += "<span> " + splitText[i] + " </span>";
}

let char =0;
let timer = setInterval(onTick, 100);

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



let prevScrollPos = window.pageYOffset;

window.onscroll = function () {
  const currentScrollPos = window.pageYOffset;

  if (prevScrollPos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
    document.getElementById("navbar").style.transition = ".3s all ease-in-out";
    document.getElementById("navbar").classList.add("fixed");
  } else {
    document.getElementById("navbar").style.top = "-85px"; // ارتفاع النافبار
    document.getElementById("navbar").style.transition = ".2s all ease-in-out";
    document.getElementById("navbar").classList.remove("fixed");
  }

  prevScrollPos = currentScrollPos;
};
