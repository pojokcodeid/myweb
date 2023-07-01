
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


// validasi register
const usernameEl = document.querySelector("#nama");
const emailEl = document.querySelector("#email");
const passwordEl = document.querySelector("#password1");
const confirmPasswordEl = document.querySelector("#password2");
const chkConfirm = document.querySelector("#chkConfirm");

const form = document.querySelector("#signup");

const checkUsername = () => {
  let valid = false;

  const username = usernameEl.value.trim();

  if (!isRequired(username)) {
    showError(usernameEl, "Nama tidak boleh kosong");
  }else {
    showSuccess(usernameEl);
    valid = true;
  }
  return valid;
};

const checkEmail = () => {
  let valid = false;
  const email = emailEl.value.trim();
  if (!isRequired(email)) {
    showError(emailEl, "Email tidak boleh kosong.");
  } else if (!isEmailValid(email)) {
    showError(emailEl, "Email tidak valid.");
  } else {
    showSuccess(emailEl);
    valid = true;
  }
  return valid;
};

const checkPassword = () => {
  let valid = false;

  const password = passwordEl.value.trim();

  if (!isRequired(password)) {
    showError(passwordEl, "Password tidak boleh kosong.");
  } else if (!isPasswordSecure(password)) {
    showError(
      passwordEl,
      "Minimal 8 karakter, kombinasi Huruf besar dan kecil dan karakter khusus (!@#$%^&*)"
    );
  } else {
    showSuccess(passwordEl);
    valid = true;
  }

  return valid;
};

const checkConfirmPassword = () => {
  let valid = false;
  // check confirm password
  const confirmPassword = confirmPasswordEl.value.trim();
  const password = passwordEl.value.trim();

  if (!isRequired(confirmPassword)) {
    showError(confirmPasswordEl, "Silahkan masukan password kembali");
  } else if (password !== confirmPassword) {
    showError(confirmPasswordEl, "Password tidak sama");
  } else {
    showSuccess(confirmPasswordEl);
    valid = true;
  }

  return valid;
};

const checkConfirm = ()=>{
  let valid = false;
  const confirm=chkConfirm.checked;
  if(! confirm){
    showError(chkConfirm, "Ceklis persetujuan harus dipilih");
  }else{
    showSuccess(chkConfirm);
    valid=true;
  }

  return valid;
}

const isRequired = (value) => (value === "" ? false : true);

const showError = (input, message) => {
  // get the form-field element
  const formField = input.parentElement;
  // add the error class
  formField.classList.remove("success");
  formField.classList.add("error");

  // show the error message
  const error = formField.querySelector("small");
  error.textContent = message;
};

const showSuccess = (input) => {
  // get the form-field element
  const formField = input.parentElement;

  // remove the error class
  formField.classList.remove("error");
  formField.classList.add("success");

  // hide the error message
  const error = formField.querySelector("small");
  error.textContent = "";
};

const isEmailValid = (email) => {
  const re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
};

const isPasswordSecure = (password) => {
  const re = new RegExp(
    "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})"
  );
  return re.test(password);
};

form.addEventListener("submit", function (e) {
  // prevent the form from submitting
  e.preventDefault();
  let isUsernameValid = checkUsername()
  let isEmailValid = checkEmail()
  let isPasswordValid= checkPassword()
  let isConfirmValid= checkConfirmPassword()
  let isConfirm=checkConfirm();

  let isFormValid = isUsernameValid && isEmailValid && isPasswordValid && isConfirmValid && isConfirm

  // submit to the server if the form is valid
  if (isFormValid) {
    // kirim data ke server
    form.submit();
  }
});

const debounce = (fn, delay = 500) => {
  let timeoutId;
  return (...args) => {
    // cancel the previous timer
    if (timeoutId) {
      clearTimeout(timeoutId);
    }
    // setup a new timer
    timeoutId = setTimeout(() => {
      fn.apply(null, args);
    }, delay);
  };
};

form.addEventListener(
  "input",
  debounce(function (e) {
    switch (e.target.id) {
      case "nama":
        checkUsername();
        break;
      case "email":
        checkEmail();
        break;
      case "password1":
        checkPassword();
        break;
      case "password2":
        checkConfirmPassword();
        break;
      case "chkConfirm":
        checkConfirm();
        break;
    }
  })
);
