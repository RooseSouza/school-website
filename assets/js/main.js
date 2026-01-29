console.log("Gopalkrishna High School website loaded");

document.addEventListener("DOMContentLoaded", () => {
  const sections = document.querySelectorAll(".curriculum-section");

  function showSectionFromHash() {
    const hash = window.location.hash || "#preprimary";

    sections.forEach(section => {
      section.style.display =
        "#" + section.id === hash ? "block" : "none";
    });
  }

  showSectionFromHash();
  window.addEventListener("hashchange", showSectionFromHash);
});
