import PopupMenu from './menu.js';

window.addEventListener('load', (event) => {
  const menu = document.getElementById('js-header-menu');
  const openBtn = document.getElementById('js-header-btn');
  const closeBtn = document.getElementById('js-header-closebtn');
  let header = new PopupMenu(
    menu,
    openBtn,
    closeBtn
  )
});