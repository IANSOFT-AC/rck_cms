var CACHE_NAME = 'cms-rck-cache-v2';
var urlsToCache = [
  '/site',
];

/*****
 *
 *
 * EVENTS FOR THE SERVICE WORKER AND THEIR FUNCTIONS
 *
 */
let csrfToken = null;

self.addEventListener('install', function(event) {
  // Perform install steps
  self.skipWaiting()
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
  // event.waitUntil(
  //   caches.keys().then(function(keys){
  //       return Promise.all(keys.map(function(key, i){
  //           if(key !== CACHE_NAME){
  //               return caches.delete(keys[i]);
  //           }
  //       }))
  //   })
  // )

});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    //do a fetch first and if there is an error fallback to cache

    fetch(event.request).then(
      function(response) {
        // Check if we received a valid response
        if(!response || response.status !== 200 || response.type !== 'basic') {
          console.log("Error in response")
          console.log(response)
          return response
        }

        // IMPORTANT: Clone the fresh response. A response is a stream
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
    )//the fall back
    .catch(() => caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }
      })
      )
    );
});

//EVENT LISTENER FOR SUBMITING DATA TO SERVER
self.addEventListener('sync', (event) => {
  console.log("sync event", event);
  if (event.tag == 'dataSyncToServer') {
    event.waitUntil(
      //displayNotification()
      fetchFromIndexedDB()
    );
  }
});

//EVENT LISTENER FOR RECEIVING A MESSAGE IN THIS CASE WE NEED THE PAGE CSRF TOKEN
// self.addEventListener('message', (event) =>{
//   let data = JSON.parse(event.data)
//   self.csrfToken = data.csrfToken
// })


//SENDING A NOTIFICATION
function displayNotification() {
  if (Notification.permission == 'granted') {
      navigator.serviceWorker.getRegistration().then(function(reg) {
          var options = {
              body: 'Here is a notification body!',
              icon: '/images/android/android-launchericon-48-48.png',
              vibrate: [100, 50, 100],
              data: {
                  dateOfArrival: Date.now(),
                  primaryKey: 1
                  }
              };
          reg.showNotification('Hello world!', options);
      });
  }
}

let fetchFromIndexedDB = () => {
  DBOpenRequest = indexedDB.open('RCK',4)
  DBOpenRequest.addEventListener('success', (ev) => {
      db = ev.target.result
      //console.log('success', db)

      //submit form data to indexeddb
      let tx = db.transaction('rckStore')
      tx.oncomplete = (ev) => {
          //console.log(ev);
      }
      tx.onerror = (err) => {
          console.warn(err)
      }

      let store = tx.objectStore('rckStore')

      let req = store.getAll()
      req.onsuccess = (ev) => {
        let data = ev.target.result
        //console.log("retrieved data", data)
        data.forEach(elem => {
          //console.log('Each data',elem)
          self.clients.matchAll().then(clients => {
            clients.forEach(client => client.postMessage({
              type: 'FORM_DATA',
              form: elem
            }));
          })
        });
        console.log("data retrived from indexeddb successfully")
      }
      req.onerror = (err) => {
          console.warn("Adding to store failed")
      }
  });
  DBOpenRequest.addEventListener('error', (err) => {
      console.warn(err)
  });
}

