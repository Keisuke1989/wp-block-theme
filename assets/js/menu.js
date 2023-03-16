export default class PopupMenu {
  constructor(menu,openIcon,closeIcon){
    this.menu = menu;
    this.openIcon = openIcon;
    this.closeIcon = closeIcon;

    console.log(this.openIcon)
    console.log(this.closeIcon)

    this.openIcon.addEventListener('click',(e)=>{
      this.openMenu()
    })

    this.closeIcon.addEventListener('click',(e)=>{
      this.closeMenu()
    })
  }

  openMenu() {
    if(!this.menu) return

    this.menu.classList.add('open')
    this.closeIcon.classList.add('open')
    this.openIcon.classList.remove('open')
  }
  closeMenu() {
    if(!this.menu) return

    this.menu.classList.remove('open')
    this.closeIcon.classList.remove('open')
    this.openIcon.classList.add('open')
  }
}