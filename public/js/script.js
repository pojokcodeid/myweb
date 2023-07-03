
(() => {
  'use strict'

  const getStoredTheme = () => localStorage.getItem('theme')
  const setStoredTheme = theme => localStorage.setItem('theme', theme)

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  const setTheme = theme => {
    let logo=document.getElementById("logo");
    let logow=document.getElementById("logow");
    let codestyle=document.getElementById("codeStyle");
    if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      logo.style.display="none";
      logow.style.display="";
      codestyle.href="../hljs-onedark/onedark.css";
      document.documentElement.setAttribute('data-bs-theme', 'dark')
    } else {
      if(theme==="dark"){
        logo.style.display="none";
        logow.style.display="";
        codestyle.href="../hljs-onedark/onedark.css";
      }else{
        logo.style.display="";
        logow.style.display="none";
        codestyle.href="../hljs-onedark/one-light.css";
      }
      document.documentElement.setAttribute('data-bs-theme', theme);
    }
  }

  setTheme(getPreferredTheme())

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector('#bd-theme')


    let logo=document.getElementById("logo");
    let logow=document.getElementById("logow");
    let codestyle=document.getElementById("codeStyle");
    if(theme==="dark"){
        logo.style.display="none";
        logow.style.display="";
      codestyle.href="../hljs-onedark/onedark.css";
    }else if(theme==="light"){
      logo.style.display="";
      logow.style.display="none";
      codestyle.href="../hljs-onedark/one-light.css";
    }

    if (!themeSwitcher) {
      return
    }


    const themeSwitcherText = document.querySelector('#bd-theme-text')
    const activeThemeIcon = document.querySelector('.theme-icon-active use')
    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
    const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href')

    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
      element.classList.remove('active')
      element.setAttribute('aria-pressed', 'false')
    })

    btnToActive.classList.add('active')
    btnToActive.setAttribute('aria-pressed', 'true')
    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
    themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

    if (focus) {
      themeSwitcher.focus()
    }
  }

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const storedTheme = getStoredTheme()
    if (storedTheme !== 'light' && storedTheme !== 'dark') {
      setTheme(getPreferredTheme())
    }
  })

  window.addEventListener('DOMContentLoaded', () => {
    showActiveTheme(getPreferredTheme())

    document.querySelectorAll('[data-bs-theme-value]')
      .forEach(toggle => {
        toggle.addEventListener('click', () => {
          const theme = toggle.getAttribute('data-bs-theme-value')
          setStoredTheme(theme)
          setTheme(theme)
          showActiveTheme(theme, true)
        })
      })
  })
})()

function removeError(input){
  input.classList.remove("is-invalid");
}

function validInput(input){
  if(input.value==""){
    Swal.fire({
      title: 'Error!',
      text: 'Input Komentar Masih Kosong',
      icon: 'error',
      confirmButtonText: 'Ok'
    })
  }else{
    document.frmComment.submit();
  }
}