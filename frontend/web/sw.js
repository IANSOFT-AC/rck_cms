var CACHE_NAME = 'cms-rck-cache-v3';
var urlsToCache = [
  'site/login',
  '/court-cases/index',
  '/court-cases/create',
  '/court-cases',
  '/refugee',
  '/refugee/create',
  '/refugee/index',
  '/police-cases',
  '/police-cases/index',
  '/police-cases/create',
  '/intervention',
  '/intervention/index',
  '/intervention/create',
  '/settings',
  '/refugee/list'
];

self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache,{
          redirect: 'follow'
        });
      })
  );
});

self.addEventListener('activate', function(event) {
  // Perform some task
  console.log('[Service Worker] Activating Service Worker ....', event);
  event.waitUntil(
    caches.keys().then(function(keys){
        return Promise.all(keys.map(function(key, i){
            if(key !== CACHE_NAME){
                return caches.delete(keys[i]);
            }
        }))
    })
  )
  
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }

        return fetch(event.request).then(
          function(response) {
            // Check if we received a valid response
            // if(!response || response.status !== 200 || response.type !== 'basic') {
            //   console.log("Error in response")
            //   console.log(response)
            //   return response
            // }

            // IMPORTANT: Clone the response. A response is a stream
            // and because we want the browser to consume the response
            // as well as the cache consuming the response, we need
            // to clone it so we have two streams.
            var responseToCache = response.clone();

            caches.open(CACHE_NAME)
              .then(function(cache) {
                cache.put(event.request, responseToCache);
              });

            return response;
          }
        );
      })
    );
});