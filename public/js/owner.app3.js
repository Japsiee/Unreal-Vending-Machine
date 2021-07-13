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

const optionTabs = () => {
	const tab = document.querySelector('.tabs');
	const lis = document.querySelectorAll('.tabs li');
	const panels = document.querySelectorAll('.panel');

	tab.addEventListener('click', e => {
		if (e.target.tagName == 'LI') {
			const targetPanel = document.querySelector(e.target.dataset.target);
			panels.forEach(panel => {
				if (panel == targetPanel) {
					panel.classList.add('active');
				} else {
					panel.classList.remove('active');
				}
			})
		}
	})
}

optionBtn();
optionTabs();