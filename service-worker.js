'use strict';

const cacheName = 'v1.22';
const offlineUrl = '/offline.html';


self.addEventListener('install', e => {
  // once the SW is installed, go ahead and fetch the resources
  // to make this work offline
  e.waitUntil(
    caches.open(cacheName).then(cache => {
      return cache.addAll([
        '/',
        '/assets/css/thefplus.css',
        '/assets/js/thefplus.js',
      ]).then(() => self.skipWaiting());
    })
  );
});



/*

self.addEventListener('fetch', function(event) {
  if (event.request.url.includes('panel')) {
    event.respondWith(fetch(event.request));
    console.log('panel editing, stay away');
  } else if (event.request.url.includes('analytics')) {
    event.respondWith(fetch(event.request));
    console.log('In Piwik');
  } else if (event.request.url.includes('podcasts')) {
    event.respondWith(fetch(event.request));
  } else if (event.request.method !== 'GET') {
    // don't do nothing
  } else if (event.request.mode === 'navigate' || (event.request.method === 'GET' && event.request.headers.get('accept').includes('text/html'))) {
    event.respondWith(
      fetch(event.request.url).catch(error => {
        return caches.match(offlineUrl);
      })
    );
  } else {
    event.respondWith(caches.match(event.request).then(function (response) {
      return response || fetch(event.request);
      })
    );
  }
});

*/