(() => {
  "use strict";

  const getStoredTheme = () => localStorage.getItem("theme");
  const setStoredTheme = (theme) => localStorage.setItem("theme", theme);

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme();
    if (storedTheme) {
      return storedTheme;
    }

    return window.matchMedia("(prefers-color-scheme: dark)").matches
      ? "dark"
      : "light";
  };

  const setTheme = (theme) => {
    let logo = document.getElementById("logo");
    let logow = document.getElementById("logow");
    let codestyle = document.getElementById("codeStyle");
    if (
      theme === "auto" &&
      window.matchMedia("(prefers-color-scheme: dark)").matches
    ) {
      logo.style.display = "none";
      logow.style.display = "";
      codestyle.href = "../hljs-onedark/onedark.css";
      document.documentElement.setAttribute("data-bs-theme", "dark");
    } else {
      if (theme === "dark") {
        logo.style.display = "none";
        logow.style.display = "";
        codestyle.href = "../hljs-onedark/onedark.css";
      } else {
        logo.style.display = "";
        logow.style.display = "none";
        codestyle.href = "../hljs-onedark/one-light.css";
      }
      document.documentElement.setAttribute("data-bs-theme", theme);
    }
  };

  setTheme(getPreferredTheme());

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector("#bd-theme");

    let logo = document.getElementById("logo");
    let logow = document.getElementById("logow");
    let codestyle = document.getElementById("codeStyle");
    if (theme === "dark") {
      logo.style.display = "none";
      logow.style.display = "";
      codestyle.href = "../hljs-onedark/onedark.css";
    } else if (theme === "light") {
      logo.style.display = "";
      logow.style.display = "none";
      codestyle.href = "../hljs-onedark/one-light.css";
    }

    if (!themeSwitcher) {
      return;
    }

    const themeSwitcherText = document.querySelector("#bd-theme-text");
    const activeThemeIcon = document.querySelector(".theme-icon-active use");
    const btnToActive = document.querySelector(
      `[data-bs-theme-value="${theme}"]`
    );
    const svgOfActiveBtn = btnToActive
      .querySelector("svg use")
      .getAttribute("href");

    document.querySelectorAll("[data-bs-theme-value]").forEach((element) => {
      element.classList.remove("active");
      element.setAttribute("aria-pressed", "false");
    });

    btnToActive.classList.add("active");
    btnToActive.setAttribute("aria-pressed", "true");
    activeThemeIcon.setAttribute("href", svgOfActiveBtn);
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;
    themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);

    if (focus) {
      themeSwitcher.focus();
    }
  };

  window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", () => {
      const storedTheme = getStoredTheme();
      if (storedTheme !== "light" && storedTheme !== "dark") {
        setTheme(getPreferredTheme());
      }
    });

  window.addEventListener("DOMContentLoaded", () => {
    showActiveTheme(getPreferredTheme());

    document.querySelectorAll("[data-bs-theme-value]").forEach((toggle) => {
      toggle.addEventListener("click", () => {
        const theme = toggle.getAttribute("data-bs-theme-value");
        setStoredTheme(theme);
        setTheme(theme);
        showActiveTheme(theme, true);
      });
    });
  });
})();

function removeError(input) {
  input.classList.remove("is-invalid");
}

function validInput(input) {
  if (input.txtComment.value == "") {
    Swal.fire({
      title: "Error!",
      text: "Input Komentar Masih Kosong",
      icon: "error",
      confirmButtonText: "Ok",
    });
  } else {
    input.submit();
  }
}

// untuk comment postingan
function editMode(id) {
  let text = document.getElementById("txtComment" + id);
  const end = text.value.length;
  text.classList.remove("form-control-plaintext");
  text.classList.add("form-control");
  text.disabled = false;
  text.setSelectionRange(end, end);
  text.style.border = "none";
  text.style.boxShadow = "none";
  text.focus();
  let bSubmit = document.getElementById("bSubmit" + id);
  bSubmit.classList.remove("visually-hidden");
}

function reset2(id) {
  let text = document.getElementById("txtComment" + id);
  let temp = document.getElementById("temp" + id);
  text.classList.remove("form-control");
  text.classList.add("form-control-plaintext");
  text.disabled = true;
  text.innerText = temp.value;
  let bSubmit = document.getElementById("bSubmit" + id);
  bSubmit.classList.add("visually-hidden");
}

function submitFrm(id) {
  var text = $("#txtComment" + id).val();
  if (text == "") {
    Swal.fire({
      title: "Error!",
      text: "Input Komentar Masih Kosong",
      icon: "error",
      confirmButtonText: "Ok",
    });
    return false;
  }
  // ambil url
  let targetUrl = $("#targetUrl" + id).val();
  let key = $("#comid" + id).val();
  $.ajax({
    type: "POST",
    url: targetUrl,
    data: {
      txtComment: text,
      comid: key,
    },
    cache: false,
    success: function (data) {
      reset2(id);
      $("#txtComment" + id).val(data);
      let temp = document.getElementById("temp" + id);
      temp.value = data;
    },
    error: function (xhr, status, error) {
      console.error(xhr, status, error);
    },
  });
}

function delCom(target, parent = 0) {
  $.get(target, function (data, status) {
    if (status) {
      // hilangkan record
      $("#container" + data).html("");
      $("#container" + data).removeClass(
        "card-body bg-body-tertiary mb-2 rounded ms-3 d-flex flex-start mt-2 p-2 shadow-sm"
      );
      $("#container" + data).css("display", "none");
      // update count parent
      $("#count" + parent).html(parseInt($("#count" + parent).text()) - 1);
    }
  });
}
