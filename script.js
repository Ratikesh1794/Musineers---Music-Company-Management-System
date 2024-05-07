document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.querySelector('.wrapper');
    const loginLink = document.querySelector('.login-link');
    // const register12 = document.querySelector('.register-sub-btn');
    const registerLink = document.querySelector('.register-link');
    const btnPopup = document.querySelector('.login_btn');
    const iconClose = document.querySelector('.icon-close');


    registerLink.addEventListener('click', () => {
      wrapper.classList.add('active');
    });
  
    loginLink.addEventListener('click', () => {
      wrapper.classList.remove('active');
    });

    // register12.addEventListener('click', () => {
    //   wrapper.classList.remove('active');
    // });
  
    btnPopup.addEventListener('click', () => {
      wrapper.classList.add('active-popup');
    });

    iconClose.addEventListener('click', () => {
        wrapper.classList.remove('active-popup');
      });
  });
  


// dashboard

const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})
