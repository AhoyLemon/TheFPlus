// meet.ts — The Meet page filter/toggle logic

export function initMeet(): void {
  const paths = ["/meet", "/meet/", "/thefplus/meet"];
  if (!paths.includes(window.location.pathname)) return;

  const meetPage = window.location.pathname.startsWith("/thefplus") ? "/thefplus/meet" : "/meet";

  let visiblePeople: string[] = [];

  if (!window.location.search) {
    visiblePeople.push("regular");
  }

  document.addEventListener("DOMContentLoaded", () => {
    // On page load, read the query string and show/hide people accordingly.
    if (window.location.search) {
      visiblePeople = window.location.search.replace("?", "").split(",");

      if (!visiblePeople.includes("regular")) {
        document.querySelectorAll<HTMLElement>(".regular").forEach((el) => el.classList.add("hidden"));
        document.querySelectorAll<HTMLElement>(`a[data-for="regular"]`).forEach((el) => el.classList.remove("active"));
      }

      visiblePeople.forEach((group) => {
        document.querySelectorAll<HTMLElement>(`.${group}`).forEach((el) => el.classList.remove("hidden"));
        document.querySelectorAll<HTMLElement>(`a[data-for="${group}"]`).forEach((el) => el.classList.add("active"));
      });
    }

    // Toggle visibility when clicking a filter button.
    document.querySelectorAll<HTMLAnchorElement>(".toggle a").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        e.preventDefault();
        btn.classList.toggle("active");
        const group = btn.dataset.for;
        if (!group) return;

        if (btn.classList.contains("active")) {
          visiblePeople.push(group);
          document.querySelectorAll<HTMLElement>(`.${group}`).forEach((el) => {
            el.classList.remove("hidden", "hide");
            el.classList.add("show");
          });
        } else {
          visiblePeople = visiblePeople.filter((p) => p !== group);
          document.querySelectorAll<HTMLElement>(`.${group}`).forEach((el) => {
            el.classList.remove("hidden", "show");
            el.classList.add("hide");
          });
          setTimeout(() => {
            document.querySelectorAll<HTMLElement>(`.${group}`).forEach((el) => el.classList.add("hidden"));
          }, 700);
        }

        if (visiblePeople.length > 0) {
          history.pushState(null, "", meetPage + "?" + visiblePeople.toString());
        } else {
          history.pushState(null, "", meetPage);
        }
      });
    });
  });
}
