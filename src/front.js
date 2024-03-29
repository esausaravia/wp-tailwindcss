import './style.css'
import Alpine from 'alpinejs'
import darkThemeToggler from './alpine-dark-theme-btn.js'

window.Alpine = Alpine

Alpine.data('darkThemeToggler', darkThemeToggler)

Alpine.start()

window.addEventListener("DOMContentLoaded", function(){
  console.log("DOMContentLoaded");

});