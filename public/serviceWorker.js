const CACHE_NAME = 'my-cache';
// Cache URLs when service worker has been installed
self.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open('my-cache')
        .then(function(cache) {
            return cache.addAll([]);
        }).then(function () {
            console.log("Here on earth");
            return self.skipWaiting();
        })
    )
});

/*
* Caches frequent requests made to the app & loads
* from cache when it's available.
*/
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
                        if(!response || response.status !== 200 || response.type !== 'basic') {
                            return response;
                        }

                        if(event.request.method === 'GET') {
                            // IMPORTANT: Clone the response. A response is a stream
                            // and because we want the browser to consume the response
                            // as well as the cache consuming the response, we need
                            // to clone it so we have two streams.
                            var responseToCache = response.clone();

                            caches.open(CACHE_NAME)
                                .then(function(cache) {
                                    console.log(`Caching ${event.request}`);
                                    cache.put(event.request, responseToCache);
                                });
                        } else if(event.request.method === "POST") {
                            console.log(event.request);
                        }

                        return response;
                    }
                );
            })
    );
});
