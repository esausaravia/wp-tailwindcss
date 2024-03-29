export default() => ({
  init() {
    if ( document.documentElement.classList.contains('dark') )
    {
      if ( typeof this.$el.checked!=='undefined' )
      {
        this.$el.checked = true
      }

    }
  },
  toggle() {
    if ( document.documentElement.classList.contains('dark') )
    {
      localStorage.setItem('theme','light')
      document.documentElement.classList.remove('dark')
    }
    else {
      localStorage.setItem('theme','dark')
      document.documentElement.classList.add('dark')
    }
  }
})