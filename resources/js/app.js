import './bootstrap';


Echo.channel('product-updates')
    .listen('ProductPriceUpdated', (event) => {
        console.log('Message received:', event.message);
    })
    .error((error) => {
        console.error('Echo channel error:', error);
    });