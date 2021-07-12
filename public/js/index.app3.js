const switchForm = () => {
	const switchFormButton = document.querySelector(".switchformbutton");
	const loginForm = document.querySelector(".loginform");
	const signupForm = document.querySelector(".signupform");
	const arrow = document.querySelector(".switchformbutton i");

	switchFormButton.addEventListener('click', () => {
		signupForm.classList.toggle("signupformtoggle");
		loginForm.classList.toggle("loginformtoggle");
		arrow.classList.toggle("iRotate");
	});
}

const switchAdmin = () => {
	const switchAdminButton = document.querySelector(".switchadminbutton");
	const adminForm = document.querySelector(".adminform");
	const arrow = document.querySelector(".switchadminbutton i");

	switchAdminButton.addEventListener('click', () => {
		adminForm.classList.toggle('adminformtoggle');
		arrow.classList.toggle("iRotate");
	})
}

switchForm();
switchAdmin();