const navAction = () => {
	const hamburger = document.querySelector('.hamburger');
	const nav = document.querySelector('.nav-buttons');
	const navButtons = document.querySelectorAll('.nav-buttons li');
	
	
	hamburger.addEventListener('click', () => {
		
		//Toggle Hamburger Nav
		nav.classList.toggle('nav-active');
		
		//Button Animations
		navButtons.forEach((link, index) => {
			if(link.style.animation) 
			{
				link.style.animation = '';
			}
			else{
				link.style.animation = `navButtonsFade 0.2s ease forwards ${index / 10}s`
			}
		});
		
		//Hamburger Animations
		
		hamburger.classList.toggle('toggle');
		
	});

}

navAction();

