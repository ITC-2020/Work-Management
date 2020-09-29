const mata = document.querySelector(".eye")
const inputPass = document.querySelector("#exampleInputPassword1");

mata.addEventListener("click",() => { 
    mata.innerHTML = `<i class="fa fa-eye-slash" aria-hidden="true"></i>`;

    if(inputPass.type==="password"){
		inputPass.setAttribute("type","text")

	}
	else if(inputPass.type==="text"){
		inputPass.setAttribute("type","password")
		mata.innerHTML = `<i class="fa fa-eye" aria-hidden="true"></i>`;
	}
})