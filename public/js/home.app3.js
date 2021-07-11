
const optionBtn = () => {
	const navlist = document.querySelector(".navlist");
	const navlistBtn = document.querySelector(".navlistbtn");
	const arrow = document.querySelector(".navlistbtn i");
	const body = document.querySelector("body");
	navlistBtn.addEventListener('click', () => {
		navlist.classList.toggle("navlisttoggle");
		arrow.classList.toggle("iRotate");
	})
}

const buyingOption = () => {
	const btns = document.querySelectorAll(".itemBuyBtn");
	const blocker = document.querySelector(".blocker");
	const cancelBtn = document.querySelectorAll(".cancel");
	const body = document.querySelector("body");
	
	Array.from(btns).forEach(btn => {
		btn.addEventListener('click', e => {
			const parentElem = e.target.parentElement;
			parentElem.children[3].classList.toggle("blockertoggle");
		})
	})

	Array.from(cancelBtn).forEach(cancel => {
		cancel.addEventListener('click', e => {
			const parentElem = e.target.parentElement;
			const grandParentElem = parentElem.parentNode.parentNode.parentNode;
			grandParentElem.classList.toggle("blockertoggle");
		})
	})
}

const depositOption = () => {
	const depositBtn = document.querySelector('#depositbtn');
	const depositForm = document.querySelector('.deposit');
	const closeDeposit = document.querySelector('.deposit .close');
	const body = document.querySelector("body");

	depositBtn.addEventListener('click', () => {
		depositForm.classList.toggle('deposittoggle');
		closeDeposit.classList.toggle('closetoggle');
		body.style.overflow = 'hidden';
	})

	closeDeposit.addEventListener('click', () => {
		depositForm.classList.toggle('deposittoggle');
		closeDeposit.classList.toggle('closetoggle');
		body.style.overflow = 'auto';
	})

}

optionBtn();
buyingOption();
depositOption();