import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

// /**
//  * Testing Channels & Events & Connections
//  */
// window.Echo.channel("delivery").listen("PackageSent", (event) => {
//     console.log(event);
// });
// Echo.channel(`abn.${id.value}`)
window.Echo.channel(`post.fac0062d-0607-4b3d-98de-924b315fd68i`)
    .listen('CreatedPost', (event) => {
        alert('TEST HELLO POST')
        console.log('Nuevo post creado:', event.post);
    });
