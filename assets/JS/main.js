// // thanh tim kiem
// let search=document.querySelector('.search-box');

// document.querySelector('#search-icon').onclick = () => {
//   search.classList.toggle('active');
//   cart.classList.remove('active');
//   filter.classList.remove('active');
//   user.classList.remove('active');
// }

// // gio hang
// let cart=document.querySelector('.cart');

// document.querySelector('#cart-icon').onclick = () => {
//   cart.classList.toggle('active');
//   search.classList.remove('active');
//   filter.classList.remove('active');
//   user.classList.remove('active');
// }

// // loc san pham
// let filter=document.querySelector('.filter-container');

// document.querySelector('#filter-icon').onclick = () => {
//   filter.classList.toggle('active');
//   cart.classList.remove('active');
//   search.classList.remove('active');
//   user.classList.remove('active');
// }

// //USER
// let user=document.querySelector('.user');
//   document.querySelector('#user-icon').onclick = () => {
//   user.classList.toggle('active');
//   search.classList.remove('active');
//   filter.classList.remove('active');
//   cart.classList.remove('active');
// }

// //THANH NAVBAR
// let links=document.querySelectorAll('.header .nav-bar a');
// links.forEach(target => {
//   target.onclick = function(e){
//     e.preventDefault();
//     let href=target.getAttribute('href');
//     let offetTop = document.querySelector(href).offsetTop;

//     scroll({
//       top: offsetTop,
//       behavior: "smooth"
//     })
//   }
// })



/// new
// Function to hide other active elements
function hideOtherActiveElements(activeElement) {
  const activeElements = document.querySelectorAll('.active');
  activeElements.forEach(element => {
    if (element !== activeElement) {
      element.classList.remove('active');
    }
  });
}

// Thanh tim kiem
const search = document.querySelector('.search-box');

document.querySelector('#search-icon').onclick = () => {
  search.classList.toggle('active');
  hideOtherActiveElements(search);
}

// Gio hang
const cart = document.querySelector('.cart');

document.querySelector('#cart-icon').onclick = () => {
  cart.classList.toggle('active');
  hideOtherActiveElements(cart);
}

// Loc san pham
const filter = document.querySelector('.filter-container');

document.querySelector('#filter-icon').onclick = () => {
  filter.classList.toggle('active');
  hideOtherActiveElements(filter);
}

// USER
const user = document.querySelector('.user');

document.querySelector('#user-icon').onclick = () => {
  user.classList.toggle('active');
  hideOtherActiveElements(user);
}

// Thanh NAVBAR
const links = document.querySelectorAll('.header .nav-bar a');
links.forEach(target => {
  target.onclick = function(e) {
    e.preventDefault();
    const href = target.getAttribute('href');
    const offsetTop = document.querySelector(href).offsetTop;

    scroll({
      top: offsetTop,
      behavior: "smooth"
    });
  };
});
