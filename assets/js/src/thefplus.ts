import { initMeet } from "./partials/meet";

// Matomo analytics global (injected server-side)
declare let _paq: string[][];

// ─── Modal markup ─────────────────────────────────────────────────────────────
const markupOpen = `
<div id="ImageModal" class="image-modal">
  <div class="image-modal-outer">
    <div class="image-modal-dropsheet" id="ImageModalDropsheet"></div>
    <div class="image-modal-inner">
      <button class="close-modal" id="CloseModal">
        <svg height="100" width="100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M16 17a1 1 0 01-.707-.293l-8-8a1 1 0 111.414-1.414l8 8A1 1 0 0116 17z"/>
          <path d="M8 17a1 1 0 01-.707-1.707l8-8a1 1 0 111.414 1.414l-8 8A1 1 0 018 17z"/>
        </svg>
      </button>`;

const markupClose = `
    </div>
  </div>
</div>`;

// ─── Analytics ────────────────────────────────────────────────────────────────
function trackEvent(c: string, a: string, l?: string, v?: string | number): void {
  if (typeof _paq === "undefined") return;
  if (v !== undefined && l !== undefined) {
    _paq.push(["trackEvent", c, a, l, String(v)]);
  } else if (l !== undefined) {
    _paq.push(["trackEvent", c, a, l]);
  } else {
    _paq.push(["trackEvent", c, a]);
  }
}

// ─── Page path (for analytics, handles random episode) ───────────────────────
let p = window.location.pathname;
if (p === "/episode/random") {
  const epEl = document.querySelector("h1 .episode-number");
  if (epEl) p = "/episode/" + epEl.textContent + " (RANDOM)";
}

// ─── Modal helpers ────────────────────────────────────────────────────────────
function buildFigCaption(
  artistName: string | null,
  artistPage: string | null,
  episodeTitle: string | null,
  episodeURL: string | null,
): string {
  let fig = "<figcaption>";
  if (artistPage) {
    fig += `<p>Artist: <a href="${artistPage}">${artistName}</a></p>`;
  } else if (artistName) {
    fig += `<p>Artist: <strong>${artistName}</strong></p>`;
  }
  if (episodeURL) {
    fig += `<p>Episode: <a href="${episodeURL}">${episodeTitle}</a></p>`;
  } else if (episodeTitle) {
    fig += `<p>Episode <strong>${episodeTitle}</strong></p>`;
  }
  fig += "</figcaption>";
  return fig;
}

function buildImgElement(src: string, alt: string, w: string | null, h: string | null): string {
  if (w && h) {
    return `<figure><img src="${src}" alt="${alt}" width="${w}" height="${h}" /></figure>`;
  }
  return `<figure><img src="${src}" alt="${alt}" /></figure>`;
}

function openModal(content: string): void {
  document.body.insertAdjacentHTML("beforeend", markupOpen + content + markupClose);
}

function closeModal(): void {
  document.getElementById("ImageModal")?.remove();
}

// ─── Init ─────────────────────────────────────────────────────────────────────
initMeet();

document.addEventListener("DOMContentLoaded", () => {
  // Merch count: show the badge unless you've visited merch this session.
  if (typeof Storage !== "undefined") {
    if (!sessionStorage.getItem("merchVisited")) {
      document.querySelectorAll<HTMLElement>(".main-link .count").forEach((el) => el.classList.add("visible"));
    }
    document.querySelectorAll<HTMLElement>(".merch-link").forEach((el) => {
      el.addEventListener("click", () => sessionStorage.setItem("merchVisited", "true"));
    });
  } else {
    document.querySelectorAll<HTMLElement>(".main-link .count").forEach((el) => el.classList.add("visible"));
  }

  // Mobile sidebar toggle (logo link)
  document.querySelectorAll<HTMLElement>(".logo-link").forEach((el) => {
    el.addEventListener("click", () => {
      el.classList.toggle("active");
      document.querySelectorAll<HTMLElement>(".sidebar-links").forEach((s) => s.classList.toggle("active"));
    });
  });

  // Flapjax (hamburger) toggle
  document.querySelectorAll<HTMLElement>("a.flapjax").forEach((el) => {
    el.addEventListener("click", () => {
      document.querySelectorAll<HTMLElement>("a.flapjax").forEach((f) => f.classList.toggle("active"));
      document.querySelectorAll<HTMLElement>(".sidebar").forEach((s) => s.classList.toggle("visible"));
      document.querySelectorAll<HTMLElement>("main").forEach((m) => m.classList.toggle("noscroll"));
    });
  });

  // Sidebar search — submit on Enter
  const sidebarSearch = document.getElementById("SidebarSearch") as HTMLInputElement | null;
  sidebarSearch?.addEventListener("keydown", (e: KeyboardEvent) => {
    if (e.key === "Enter") {
      const q = encodeURIComponent(sidebarSearch.value);
      window.location.href = `${window.location.origin}/search?q=${q}`;
      e.preventDefault();
    }
  });

  // ─── Fanart page: full-size image modal ────────────────────────────────────
  document.querySelectorAll<HTMLElement>(".full-fanart-link").forEach((link) => {
    link.addEventListener("click", () => {
      const src = link.getAttribute("full-size") ?? "";
      const artistName = link.getAttribute("artist");
      const artistPage = link.getAttribute("artist-page");
      const episodeTitle = link.getAttribute("episode-title");
      const episodeURL = link.getAttribute("episode-url");
      const fullWidth = link.getAttribute("full-width");
      const fullHeight = link.getAttribute("full-height");
      const altText = link.querySelector("img")?.getAttribute("alt") ?? "";

      const imgEl = buildImgElement(src, altText, fullWidth, fullHeight);
      const figcap = buildFigCaption(artistName, artistPage, episodeTitle, episodeURL);
      openModal(imgEl + figcap);
    });
  });

  // Zoom photo modal
  document.querySelectorAll<HTMLElement>(".zoom-photo").forEach((link) => {
    link.addEventListener("click", () => {
      const src = link.getAttribute("full-size") ?? "";
      const altText = link.querySelector("img")?.getAttribute("alt") ?? "";
      const fullWidth = link.getAttribute("full-width");
      const fullHeight = link.getAttribute("full-height");
      openModal(buildImgElement(src, altText, fullWidth, fullHeight));
    });
  });

  // ─── Social links (popup windows + analytics) ─────────────────────────────
  document.querySelectorAll<HTMLAnchorElement>("a.social").forEach((link) => {
    link.addEventListener("click", (e) => {
      if (link.classList.contains("contribute")) {
        trackEvent("Contribute", "page link", p);
      } else if (link.classList.contains("twitter")) {
        trackEvent("share", "Twitter", p);
        window.open(link.href, "popupWindow", "width=550,height=440");
        e.preventDefault();
      } else if (link.classList.contains("facebook")) {
        trackEvent("share", "Facebook", p);
        window.open(link.href, "popupWindow", "width=550,height=450");
        e.preventDefault();
      } else if (link.classList.contains("tumblr")) {
        trackEvent("share", "tumblr", p);
      } else if (link.classList.contains("reddit")) {
        trackEvent("share", "Reddit", p);
      } else if (link.classList.contains("github")) {
        trackEvent("outside link", "GitHub", p);
      } else if (link.classList.contains("googleplus")) {
        trackEvent("share", "Google+", p);
        window.open(link.href, "popupWindow", "width=550,height=650");
        e.preventDefault();
      }
    });
  });

  // Read document tracking
  document.querySelectorAll<HTMLAnchorElement>("a.action.read").forEach((link) => {
    link.addEventListener("click", () => trackEvent("read document", "document", p));
  });

  // Ballpit thread tracking
  document.querySelectorAll<HTMLAnchorElement>("a.action.ballpit").forEach((link) => {
    link.addEventListener("click", () => trackEvent("ballpit thread", "ballpit", p));
  });

  // Donate button tracking
  const donateBtn = document.getElementById("DonateButton");
  const donateAmount = document.getElementById("DonationAmount") as HTMLInputElement | null;
  if (donateBtn && donateAmount) {
    donateBtn.addEventListener("click", () => {
      const d = "$" + donateAmount.value;
      const v = parseFloat(donateAmount.value);
      trackEvent("donate", "PayPal", d, v);
    });
  }
});

// ─── Modal close (event delegation — modal is added dynamically) ──────────────
document.addEventListener("click", (e: MouseEvent) => {
  const target = e.target as HTMLElement;
  if (target.closest("#CloseModal") || target.id === "ImageModalDropsheet") {
    closeModal();
  }
});
